<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Billable;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl() // override default profile photo
    {
        return 'https://api.dicebear.com/6.x/bottts/svg?seed=' . urlencode($this->name);
    }

    public function isAdmin()
    {
        return $this->administration_level > 0 ? true : false; // 0 normal user , 1 admin , 2 super admin
    }
    public function isSuperAdmin()
    {
        return $this->administration_level > 1 ? true : false; // 0 normal user , 1 admin , 2 super admin
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function rated(Book $book) // check if a book is rated
    {
        return $this->ratings->where('book_id', $book->id)->isNotEmpty();
    }

    public function bookRating(Book $book) // get a user rating on a book
    {
        return $this->rated($book) ? $this->ratings->where('book_id', $book->id)->first() : null;
    }

    public function booksInCart()
    {
        //  user_id, book_id these are the columns that link the users and books tables in the pivot table
        return $this->belongsToMany(Book::class)->withPivot('number_of_copies', 'bought', 'price')->wherePivot('bought', false); // the relation between tha tables is happens when the user didn't buy if bought is true the cart will be cleared
    }

    public function ratedPurchases() // validate if user bought the book before rating
    {
        return $this->belongsToMany(Book::class)->withPivot(['bought'])->wherePivot('bought', true);
    }

    public function purchasedProduct() // return purchased products by the user
    {
        return $this->belongsToMany(Book::class)->withPivot(['number_of_copies', 'bought', 'price', 'created_at'])->orderBy('pivot_created_at', 'desc')->wherePivot('bought', true); // pivot_created_at to get the column from the pivot table
    }
}
