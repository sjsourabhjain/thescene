@extends('layouts.admin')
@section('content')
        <div class="page-title col-sm-12">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3 m-0">Events</h1>
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
                <div class="col-sm-12 mb-4">
                    <div class="box bg-white">
                        <div class="box-row">
                            <div class="box-content">
                                <table id="dataTable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($products))
                                            @foreach($products as $product)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->category }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.update_user_status',$user->id) }}" class="">
                                                            @if($product->status==0)
                                                                <span class="badge badge-warning">Inactive</span>
                                                            @elseif($product->status==1)
                                                                <span class="badge badge-success">Active</span>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class="action">
                                                        <a href="{{ route('admin.show_product',$product->id) }}">
                                                            <button type="button" class="icon-btn preview">
                                                                <i class="fal fa-eye"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('admin.manage_variants',$product->id) }}">
                                                            <button type="button" class="icon-btn preview">
                                                                <i class="fal fa-box"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('admin.edit_product',$product->id) }}">
                                                            <button type="button" class="icon-btn edit">
                                                                <i class="fal fa-edit"></i>
                                                            </button>
                                                        </a>
                                                    </td>
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
        ajax: "{{ route('admin.list_events') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'category', name: 'category'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', className: 'action', orderable: false, searchable: false},
        ]
    });
</script>
@endpush