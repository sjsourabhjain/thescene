@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">Edit Category</h1>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-4 mb-4">
                    <form class="box bg-white" method="POST" id="editCategoryForm" action="{{ route('admin.update_category') }}">
                    @csrf
                    <input type="hidden" name="update_id" value="{{ $category_details->id }}">
                        <div class="box-row flex-wrap">

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Event Type</label>
                                    <div class="input-group">
                                        <select name="parent_id" class="form-control">
                                            <option hidden="" value="">--Select--</option>
                                            @if(!$event_types->isEmpty())
                                                @foreach($event_types as $event_type)
                                                    <option
                                                        @if($event_type->id == $category_details->parent_id)
                                                            selected
                                                        @endif
                                                        value="{{ $event_type->id }}">{{ $event_type->event_type }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control chkAlphabets" name="category_name" autocomplete="off" value="{{ $category_details->category_name }}" placeholder="Category  Name">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3 text-center">
                                <a type="submit" href="{{ route('admin.list_category') }}" class="btn light">Cancel</a>
                                <button type="submit" class="btn light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
@push('current-page-js')
<script type="text/javascript">
$("#editCategoryForm").validate({
    rules: {
        category_name: {
            required: true,
        },
        parent_id: {
            required: true,
        }
    },
    messages:{
        category_name:{
            required: 'Category Name is required.'
        },
        parent_id: {
            required: 'Event Name is required.'
        }
    }
});
</script>
@endpush