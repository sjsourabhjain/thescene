@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">User</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-4 mb-4">
                    <div class="box bg-white">
                        <div class="box-title pb-0">
                            <h5>User Details</h5>
                        </div>
                        <div class="box-row flex-wrap user-contact">
                            <div class="d-flex">
                                <label>Name</label>
                                <span class="text-muted">{{ $user_details->full_name }}</span>
                            </div>
                            <div class="d-flex">
                                <label>Email</label>
                                <span class="text-muted">{{ $user_details->email }}</span>
                            </div>
                            {{-- <div class="d-flex">
                                <label>Mobile No.</label>
                                <span class="text-muted">{{ $user_details->mob_no }}</span>
                            </div> --}}
                            <div class="d-flex">
                                <label>User Role</label>
                                <span class="text-muted">
                                    @if($user_details->role_id == 2)
                                        Event Organiser
                                    @elseif($user_details->role_id == 3)
                                        User
                                    @endif
                                </span>
                            </div>
                            <div class="d-flex">
                                <label>Status</label>
                                <span class="text-muted">
                                    @if($user_details->status == 0)
                                        Inactive
                                    @elseif($user_details->status == 1)
                                        Active
                                    @endif
                                </span>
                            </div>
                            <div class="d-flex">
                                <label>Joined At</label>
                                <span class="text-muted">{{ $user_details->created_at->format('d-F-Y H:i A') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection