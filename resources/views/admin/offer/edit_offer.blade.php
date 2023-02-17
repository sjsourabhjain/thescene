@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">Edit Offer</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Offer</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-4 mb-4">
                    <form class="box bg-white" method="POST" id="editOfferForm" enctype="multipart/form-data" action="{{ route('admin.update_offer') }}">
                    @csrf
                    <input type="hidden" name="update_id" value="{{ $offer_details->id }}">
                        <div class="box-row flex-wrap">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Coupon Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control chkAlphabets" name="coupon_code" autocomplete="off" placeholder="Coupon Code" value="{{ $offer_details->coupon_code }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Discount Type</label>
                                <div class="input-group">
                                    <select name="discount_type" class="form-control">
                                        <option value="1" {{ $offer_details->discount_type==1 ? "selected='selected'" : '' }}>Fixed</option>
                                        <option value="2" {{ $offer_details->discount_type==2 ? "selected='selected'" : '' }}>Percentage</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Discount value</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control chkAlphabets" name="discount_value" autocomplete="off" placeholder="Discount Value" value="{{ $offer_details->discount_value }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control chkAlphabets" name="expiry_date" autocomplete="off" placeholder="Expiry Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 text-center">
                                <a type="submit" href="{{ route('admin.list_offer') }}" class="btn light">Cancel</a>
                                <button type="submit" class="btn light">Submit</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
@push('current-page-js')
<script type="text/javascript">
$("#editOfferForm").validate({
    rules: {
        title: {
            required: true,
        },
        url: {
            required: true,
        },
    },
    messages:{
        title:{
            required: 'Title is required.'
        },
        url:{
            required: 'URL is required.'
        },
    }
});
</script>
@endpush