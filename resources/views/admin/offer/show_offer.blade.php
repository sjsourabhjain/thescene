@extends('layouts.admin')
@section('content')
    <div class="page-title col-sm-12">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3 m-0">Offer</h1>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Offer</li>
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
                        <h5>Offer Details</h5>
                    </div>
                    <div class="box-row flex-wrap user-contact">
                        <div class="d-flex">
                            <label>Coupon Code</label>
                            <span class="text-muted">{{ $offer_details->coupon_code }}</span>
                        </div>
                        <div class="d-flex">
                            <label>Discount Type</label>
                            <span class="text-muted">{{ $offer_details->discount_type==1 ? 'Fixed' : 'Percentage' }}</span>
                        </div>
                        <div class="d-flex">
                            <label>Discount Value</label>
                            <span class="text-muted">{{ $offer_details->discount_value }}</span>
                        </div>
                        <div class="d-flex">
                            <label>Expiry Date</label>
                            <span class="text-muted">{{ date('d-m-Y',strtotime($offer_details->expiry_date)) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection