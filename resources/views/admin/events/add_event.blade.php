@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">Add Event</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Event</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-4 mb-4">
                    <form class="box bg-white" method="POST" enctype="multipart/form-data" id="" action="{{ route('admin.store_event') }}">
                    @csrf
                        <div class="box-row flex-wrap">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control chkAlphabets" name="event_name" autocomplete="off" value="{{ old('event_name') }}" placeholder="Event Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Location</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control chkAlphabets" name="location" autocomplete="off" value="{{ old('location') }}" placeholder="Location">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Category</label>
                                    <div class="input-group">
                                        <select name="category_id" class="selectpicker form-control">
                                            <option hidden="" value="">--Select--</option>
                                            @if(!$categories->isEmpty())
                                                @foreach($categories as $category)
                                                    <option
                                                    @if($category->id==old('category_id'))
                                                        selected
                                                    @endif
                                                    value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Type</label>
                                    <div class="input-group">
                                        <select name="type" class="selectpicker form-control">
                                            <option hidden="" value="">--Select--</option>
                                            <option value="1">Conference</option>
                                            <option value="2">Party</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>VIP Seat</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control chkAlphabets" name="vip_seat" autocomplete="off" value="{{ old('location') }}" placeholder="Location">  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>General Seat</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control chkAlphabets" name="general_seat" autocomplete="off" value="{{ old('location') }}" placeholder="Location">  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>VIP Seat Price</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control chkAlphabets" name="vip_seat_price" autocomplete="off" value="{{ old('location') }}" placeholder="Location">  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>General Seat Price</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control chkAlphabets" name="general_seat_price" autocomplete="off" value="{{ old('location') }}" placeholder="Location">  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 text-center">
                                <a href="{{ route('admin.list_events') }}" class="btn light">Cancel</a>
                                <button type="submit" class="btn light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
@push('current-page-js')
<script type="text/javascript">
$("#addEventForm").validate({
    rules: {
        event_name: {
            required: true,
        },
        price: {
            required: true,
        },
        description: {
            required: true,
        },
    },
    messages:{
        event_name:{
            required: 'Event Name is required.'
        },
        price:{
            required: 'Price is required.'
        },
        description:{
            required: 'Description is required.'
        },
    }
});
</script>
@endpush