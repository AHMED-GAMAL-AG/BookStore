@extends('admin-theme.default')

@section('head')
    <link href="{{ asset('admin-theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{ __('عرض المستخدمين') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="users-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ __('الاسم') }}</th>
                        <th>{{ __('البريد الإلكتروني') }}</th>
                        <th>{{ __('نوع المستخدم') }}</th>
                        <th>{{ __('خيارات') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->isSuperAdmin() ? __('Super admin') : ($user->isAdmin() ? __('Admin') : __('User')) }}
                            </td>
                            <td>
                                <form class="ml-4 form-inline" method="POST" action="{{ route('users.update', $user) }}"
                                    style="display:inline-block">
                                    @method('patch')
                                    @csrf
                                    <select class="form-control form-control-sm" name="administration_level" required>
                                        <option selected disabled>{{ __('اختر نوعًا') }}</option>
                                        <option value="0">{{ __('User') }}</option>
                                        <option value="1">{{ __('Admin') }}</option>
                                        <option value="2">{{ __('Super admin') }}</option>
                                    </select>

                                    <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                        {{ __('Edit') }}</button>
                                </form>

                                <form method="POST" action="{{ route('users.destroy', $user) }}"
                                    style="display:inline-block">
                                    @method('delete')
                                    @csrf
                                    {{-- the super admin cant delete himself show the button disabled for him --}}
                                    @if (auth()->user() != $user)
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i>
                                            {{ __('Delete') }}</button>
                                    @else
                                        <div class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>
                                            {{ __('Delete') }} </div>
                                    @endif
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
            $('#users-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
                }
            });
        });
    </script>
@endsection
