@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">Edit Event Type</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Event Type</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-4 mb-4">
                    <form class="box bg-white" method="POST" id="editTickettypeForm" action="{{ route('admin.update_tickettype') }}">
                    @csrf
                    <input type="hidden" name="update_id" value="{{ $tickettypes->id }}">
                        <div class="box-row flex-wrap">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Event Type Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control chkAlphabets" name="event_type" autocomplete="off" value="{{ $tickettypes->event_type }}" placeholder="Event Type  Name">
                                    </div>
                                </div>
                            </div>
                            {{-- <!-- <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="image_name">
                                    </div>
                                </div>
                            </div> --> --}}
                            <div class="col-md-12 mb-3 text-center">
                                <a type="submit" href="{{ route('admin.list_tickettype') }}" class="btn light">Cancel</a>
                                <button type="submit" class="btn light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
@push('current-page-js')

<script type="text/javascript">
$("#editTickettypeForm").validate({
    rules: {
        ticket_type: {
            required: true,
        },
    },
    messages:{
        ticket_type:{
            required: 'Event Type is required.'
        },
    }
});
</script>
@endpush