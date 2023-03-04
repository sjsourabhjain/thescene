@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">Add Event Type</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Event Type</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-4 mb-4">
                    <form class="box bg-white" method="POST" id="addTickettypeForm" action="{{ route('admin.store_tickettype') }}">
                    @csrf
                        <div class="box-row flex-wrap">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Event Type Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control chkAlphabets" name="event_type" autocomplete="off" value="{{ old('event_type') }}" placeholder="Event Type" required>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Parent tickettype</label>
                                    <div class="input-group">
                                        <select name="parent_id" class="form-control">
                                            <option hidden="" value="0">--Select--</option>
                                            @if(!$tickettypes->isEmpty())
                                                @foreach($tickettypes as $tickettype)
                                                    <option
                                                    @if($tickettype->id==old('parent_id'))
                                                        selected
                                                    @endif
                                                    value="{{ $tickettype->id }}">{{ $tickettype->event_type }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-12 mb-3 text-center">
                                <a href="{{ route('admin.list_tickettype') }}" class="btn light">Cancel</a>
                                <button type="submit" class="btn light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
@push('current-page-js')
<script type="text/javascript">
$("#addTickettypeForm").validate({
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