@extends('admin-theme.default')

{{-- for css --}}
@section('head')
    <link href={{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.css') }} rel="stylesheet">
@endsection
{{-- the @yield('heading') on admin-theme.header --}}
@section('heading')
    {{ __('عرض التصنيفات') }}
@endsection

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary"><i
            class="fas fa-plus">{{ __('أضف تصنيفاً جديداً') }}</i></a>
    <hr>
    <div class="row">
        <table id="categories-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>{{ __('الاسم') }}</th>
                    <th>{{ __('الوصف') }}</th>
                    <th>{{ __('خيارات') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category) }}"><i class="fa fa-edit"></i>
                                {{ __('Edit') }}</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline-block">
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
            $('#categories-table').DataTable({
                'language': {
                    'url': '//cdn.datatables.net/plug-ins/1.13.3/i18n/ar.json'
                }
            });
        });
    </script>
@endsection
