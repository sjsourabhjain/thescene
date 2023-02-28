@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">Contact Us</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ContactUs</li>
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
                                <span class="text-muted">{{ $contact->name }}</span>
                            </div>
                            <div class="d-flex">
                                <label>Email</label>
                                <span class="text-muted">{{ $contact->email }}</span>
                            </div>
                            <div class="d-flex">
                                <label>Subject</label>
                                <span class="text-muted">{{ $contact->subject }}</span>
                            </div>
                            <div class="d-flex">
                                <label>Description</label>
                                <span class="text-muted">{{ $contact->description }}</span>
                            </div>
                            <div class="d-flex">
                                <label>Send At</label>
                                <span class="text-muted">{{ $contact->created_at->format('d-F-Y H:i A') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection