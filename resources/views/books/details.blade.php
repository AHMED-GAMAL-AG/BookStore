@extends('layouts.main')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">تفاصيل عرض الكتاب</div>

                    <div class="card-body">

                        <table class="table table-stribed">
                            <tr>
                                <th>العنوان</th>
                                <td class="lead"> <b>{{ $book->title }}</b> </td>
                            </tr>

                            @if ($book->isbn)
                                <tr>
                                    <th>الرقم التسلسلي</th>
                                    <td>{{ $book->isbn }}</td>
                                </tr>
                            @endif

                            <tr>
                                <th>صورة الغلاف</th>
                                <td><img class="img-fluid img-thumbnail" src="{{ asset('storage/' . $book->cover_image) }}"
                                        alt="{{ $book->title }}"></td>
                            </tr>

                            @if ($book->category)
                                <tr>
                                    <th>التصنيف</th>
                                    <td>{{ $book->category->name }}</td>
                                </tr>
                            @endif

                            @if ($book->authors->count() > 0)
                                <tr>
                                    <th>المؤلفون</th>
                                    <td>
                                        @foreach ($book->authors as $author)
                                            {{ $loop->first ? '' : 'و' }}
                                            {{ $author->name }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endif

                            @if ($book->publisher)
                                <tr>
                                    <th>الناشر</th>
                                    <td>{{ $book->publisher->name }}</td>
                                </tr>
                            @endif

                            @if ($book->description)
                                <tr>
                                    <th>الوصف</th>
                                    <td>{{ $book->description }}</td>
                                </tr>
                            @endif

                            @if ($book->publish_year)
                                <tr>
                                    <th>سنة النشر</th>
                                    <td>{{ $book->publish_year }}</td>
                                </tr>
                            @endif

                            <tr>
                                <th>عدد الصفحات</th>
                                <td>{{ $book->number_of_pages }}</td>
                            </tr>

                            <tr>
                                <th>عدد النسخ</th>
                                <td>{{ $book->number_of_copies }}</td>
                            </tr>

                            <tr>
                                <th>السعر</th>
                                <td>{{ $book->price }} $</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
