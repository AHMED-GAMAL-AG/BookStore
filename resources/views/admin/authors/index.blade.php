@extends('admin-theme.default')

@section('head')
    <link href="{{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{ __('عرض المؤلفين') }}
@endsection

@section('content')
    <a class="btn btn-primary" href="{{ route('authors.create') }}"><i class="fas fa-plus"></i>
        {{ __('أضف مؤلفًا جديدًا') }}</a>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="authors-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('خيارات') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->description }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('authors.edit', $author) }}"><i
                                        class="fa fa-edit"></i> تعديل</a>
                                <form method="POST" action="{{ route('authors.destroy', $author) }}"
                                    class="d-inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i>{{ __('Delete') }}</button>
                                </form>
                            </td>
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
            $('#authors-table').DataTable({
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
