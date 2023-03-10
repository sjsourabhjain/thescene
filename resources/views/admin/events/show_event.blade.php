@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">Event</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Event</li>
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
                            <h5>Details</h5>
                        </div>
                        <div class="box-row flex-wrap user-contact">
                            <div class="d-flex">
                                <label>Name</label>
                                <span class="text-muted">{{ $event_details->title }}</span>
                            </div>
                        </div>
                        <div class="box-row flex-wrap user-contact">
                            <div class="d-flex">
                                <label>Categories</label>
                                <span class="text-muted">
                                    <ul>
                                        <li>{{ $event_details->categories['category_name'] }}</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                        <div class="box-row flex-wrap user-contact">
                            <div class="d-flex">
                                <label>image</label>
                                <span class="text-muted">
                                    <ul>
                                        <li><img src="/uploads/{{ $event_details->image }}"></li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                        <div class="box-row flex-wrap user-contact">
                            <div class="d-flex">
                                <label>location</label>
                                <span class="text-muted">
                                    <ul>
                                        <li>{{ $event_details->location }}</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                        <div class="box-row flex-wrap user-contact">
                            <div class="d-flex">
                                <label>start_datetime</label>
                                <span class="text-muted">
                                    <ul>
                                        <li>{{ $event_details->start_datetime }}</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                        <div class="box-row flex-wrap user-contact">
                            <div class="d-flex">
                                <label>end_datetime</label>
                                <span class="text-muted">
                                    <ul>
                                        <li>{{ $event_details->end_datetime }}</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                        <div class="box-row flex-wrap user-contact">
                            <div class="d-flex">
                                <label>vip_seat</label>
                                <span class="text-muted">
                                    <ul>
                                        <li>{{ $event_details->vip_seat }}</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection