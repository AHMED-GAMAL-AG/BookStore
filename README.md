## BookStore
an e-commerce platform with all essential functionalities with strong administration capabilities, using PayPal and Stripe as payment gateways

You can find an installation guide bellow.

## Screenshoots

Show all books on the home page :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/ee9bcac3-dcef-4c77-b781-2facb88fb5a0)
![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/10e5b153-98e2-4cbe-85d2-43f4f978c2a4)

the user can search for a book :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/ae2f2d6a-55f8-4659-a3c2-c42860debb94)

View book details :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/f4b63b3a-bee9-4ecb-a324-d3da2c0b2756)
![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/254aa206-78cf-4dc2-9ac9-fcee90f330d7)

Rate a book if purchased it before or change the previous rating :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/9c786bf3-babc-442b-b2ee-1c93bdef9259)

add a book to the cart :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/c0b3885b-92ba-4098-ac16-2210f0be1a22)

The user can remove a book, empty the card pay with any card type using Stripe or PayPal :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/ae8d64db-f42c-4814-aae8-3db48f9b41c0)

Paying with visa card using stripe :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/a5bd96cd-ce93-480b-a4e9-34fef1da3f2b)
![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/75161e91-5e18-4bf3-b5e8-18df9bd5a3cf)

Paying with PayPal :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/de17edf9-17e2-498f-9669-20c3bff12284)
![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/81d07338-09d0-4531-afe6-7a208e97c4bc)

get a confirmation email after purchase :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/2e5ffdc7-be90-475a-801c-e04f0070b65b)

The user can see previous orders :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/05467010-8286-4957-a008-209ee391cd99)

The user can search through categories, authors, and publishers : 

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/f0c0f012-848a-4d71-afdc-fcf83bde69f3)
![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/98355fad-e74d-4e5f-9ee2-ac0c163bac2e)

The admin can see the store statistics:

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/f34e4690-7b3c-4bbd-93ea-892dc50e3244)

The admins can view all books add/edit/delete/search for a book :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/a32e10b2-7c40-4aaf-8a43-b54a7b1dfa1a)

The admins can view all categories add/edit/delete/search a category :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/ff1cfdb1-9d8f-4363-93e4-c96943782b4c)

The admins can view all authors add/edit/delete/search an author :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/f960036d-c8b0-46ac-988c-76f7702ce688)

The admins can view all publishers add/edit/delete/search a publisher :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/6dba2872-2017-4b08-becb-fe5435ae23d0)

only super admins can view all users add/edit/delete/search a user :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/7023511e-656c-4601-aa9a-ca706cc7582e)
![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/607246fc-f585-4de1-9916-65f80f7d8b74)

The admin can view all purchases on the website :

![image](https://github.com/AHMED-GAMAL-AG/BookStore/assets/76778937/d5a286fc-f429-4734-b074-c7d5318a1a75)


## installation

<ul>
<li><code>git clone https://github.com/AHMED-GAMAL-AG/BookStore.git</code></li>
<li><code>Create a .env file and configure the database.</code></li>
<li><code>composer install</code></li>
<li><code>npm install</code></li>
<li><code>php artisan key:generate</code></li>
<li><code>php artisan migrate --seed</code></li>
<li><code>php artisan storage:link</code></li>
</ul>
