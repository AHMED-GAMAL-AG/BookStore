@extends('layouts.main')


{{-- for css --}}
@section('head')
    <style>
        .card .card-body .card-title {
            height: 40px;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row" >
            <form action="{{ route('search') }}" method="get">
                <div class="row d-flex justify-content-center">
                    <input type="text" class="col-3 mx-sm-3 mb-2" name="term" placeholder="ابحث عن كتاب...">
                    <button type="submit" class="col-1 btn btn-secondary bg-secondary mb-2">ابحث</button>
                </div>
            </form>
        </div>
        <hr>

        <h3 class="my-3">{{ $title }}</h3>

        <div class="mt-50 mb-50">
            <div class="row">
                @if ($books->count())
                    @foreach ($books as $book)
                        @if ($book->number_of_copies > 0)
                            <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                                <div class="card mb-3">
                                    <div>
                                        <div class="card-img-actions">
                                            <img src="{{ asset('storage/' . $book->cover_image) }}"
                                                class="card-img img-fluid" width="96" height="350"
                                                alt="{{ $book->title }}">
                                        </div>
                                    </div>
                                    <div class="card-body bg-light text-center">
                                        <div class="mb-2">
                                            <h6 class="font-weight-semibold card-title mb-2">
                                                <a href="#" class="text-default mb-0" data-abc="true">
                                                    {{ $book->title }} </a>
                                            </h6>
                                            <a href="#" class="text-muted" data-abc="true">
                                                @if ($book->category != null)
                                                    {{ $book->category->name }}
                                                @endif
                                            </a>
                                        </div>
                                        <h3 class="mb-0 font-weight-semibold">{{ $book->price }} $</h3>
                                        <div>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                        </div>
                                        <div class="text-muted mb-3">34 reviews</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="alert alert-info" role="alert">
                        لا نتائج
                    </div>
                @endif
            </div>
        </div>
        {{ $books->links() }}
    </div>
@endsection
