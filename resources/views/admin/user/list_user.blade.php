@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">Users</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <div class="box bg-white">
                        <div class="box-row">
                            <div class="box-content">
                                <table id="dataTable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            {{-- <th scope="col">Mobile No.</th> --}}
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($users))
                                            @foreach($users as $user)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $user->full_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    {{-- <td>{{ $user->mob_no }}</td> --}}
                                                    <td>
                                                        @if($user->role_id==2)
                                                            <span class="badge badge-warning">Organiser</span>
                                                        @elseif($user->role_id==3)
                                                            <span class="badge badge-success">User</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.update_user_status',$user->id) }}" class="">
                                                            @if($user->status==0)
                                                                <span class="badge badge-warning">Inactive</span>
                                                            @elseif($user->status==1)
                                                                <span class="badge badge-success">Active</span>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <!-- <td class="action"> -->

                                                    <!-- </td> -->
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('current-page-js')
<script type="text/javascript">
    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.list_user') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'full_name', name: 'full_name'},
            {data: 'email', name: 'email'},
            //{data: 'mob_no', name: 'mob_no'},
            {data: 'role_id', name: 'role_id'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', className: 'action', orderable: false, searchable: false},
        ]
    });
</script>
@endpush