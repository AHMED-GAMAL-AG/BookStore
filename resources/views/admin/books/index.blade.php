@extends('admin-theme.default')

{{-- for css --}}
@section('head')
    <link href={{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.css') }} rel="stylesheet">
@endsection
{{-- the @yield('heading') on admin-theme.header --}}
@section('heading')
    عرض الكتب
@endsection

@section('content')
    <a href="{{ route('books.create') }}" class="btn btn-primary"><i class="fas fa-plus">أضف كتاباً جديداً</i></a>
    <hr>
    <div class="row">
        <table id="books-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>الرقم التسلسلي</th>
                    <th>التصنيف</th>
                    <th>المؤلفون</th>
                    <th>الناشر</th>
                    <th>السعر</th>
                    <th>خيارات</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->category != null ? $book->category->name : 'لا يوجد تصنيف' }}</td>
                        <td>
                            @if ($book->authors()->count() > 0)
                                {{-- check if the book has mor than one author --}}
                                @foreach ($book->authors as $author)
                                    {{ $loop->first ? '' : 'و' }}
                                    {{ $author->name }}
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $book->publisher != null ? $book->publisher->name : 'لا يوجد ناشر' }}</td>
                        <td>{{ $book->price }} $</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('books.edit', $book) }}"><i
                                    class="fa fa-edit"></i> تعديل</a>
                            <form action="{{ route('books.destroy', $book) }}" method="post" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('{{ __('Are you sure?') }}')"> <i class="fa fa-trash"></i>
                                    {{ __('Delete') }} </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src={{ asset('admin-theme/vendor/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.js') }}></script>
    <script>
        $(document).ready(function() {
            $('#books-table').DataTable({
                'language': {
                    'url': '//cdn.datatables.net/plug-ins/1.13.3/i18n/ar.json'
                }
            });
        });
    </script>
@endsection
