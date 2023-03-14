@extends('admin-theme.default')

{{-- for css --}}
@section('head')
    <link href={{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.css') }} rel="stylesheet">
@endsection
{{-- the @yield('heading') on admin-theme.header --}}
@section('heading')
    {{ __('عرض الناشرين') }}
@endsection

@section('content')
    <a href="{{ route('publishers.create') }}" class="btn btn-primary"><i
            class="fas fa-plus">{{ __('أضف ناشراً جديداً') }}</i></a>
    <hr>
    <div class="row">
        <table id="publishers-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>{{ __('الاسم') }}</th>
                    <th>{{ __('العنوان') }}</th>
                    <th>{{ __('خيارات') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->address }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('publishers.edit', $publisher) }}"><i class="fa fa-edit"></i>
                                {{ __('Edit') }}</a>
                            <form action="{{ route('publishers.destroy', $publisher) }}" method="post" class="d-inline-block">
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
            $('#publishers-table').DataTable({
                'language': {
                    'url': '//cdn.datatables.net/plug-ins/1.13.3/i18n/ar.json'
                }
            });
        });
    </script>
@endsection
