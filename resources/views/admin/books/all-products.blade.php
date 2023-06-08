@extends('admin-theme.default')

@section('head')
    <link href="{{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{ __('جميع المشتريات') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>المشتري</th>
                        <th>الكتاب</th>
                        <th>السعر</th>
                        <th>عدد النسخ</th>
                        <th>السعر الإجمالي</th>
                        <th>تاريخ الشراء</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($all_books as $product)
                        <tr>
                            <td>{{ $product->user::find($product->user_id)->name }}</td>
                            <td><a href="{{ route('book.details', $product->book_id) }}">{{ $product->book::find($product->book_id)->title }}</a>
                            </td>
                            <td>{{ $product->price }}$</td>
                            <td>{{ $product->number_of_copies }}</td>
                            <td>{{ $product->price * $product->number_of_copies }}$</td>
                            <td>{{ $product->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('admin-theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#books-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
                },
                "initComplete": function() {
                    var table = this.api();
                    $(table.table().container()).find('.dataTables_filter input').addClass('mr-1'); // add margin to search box
                }
            });
        });
    </script>
@endsection
