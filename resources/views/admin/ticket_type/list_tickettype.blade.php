@extends('layouts.admin')
@section('content')
<div class="page-title col-sm-12">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3 m-0">Event Type</h1>
        </div>
        <div class="col-md-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Event Type</li>
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
                                    <th scope="col">Event Type Name</th>
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col" class="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($tickettypes))
                                    @foreach($tickettypes as $tickettype)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $tickettype->event_type }}</td>
                                            <!-- <td>{{ $tickettype->status }}</td> -->
                                            <td class="action">
                                                <a href="{{ route('admin.edit_category',$tickettype->id) }}">
                                                    <button type="button" class="icon-btn edit">
                                                        <i class="fal fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin.delete_category',$tickettype->id) }}">
                                                    <button type="button" class="icon-btn delete">
                                                        <i class="fal fa-trash"></i>
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
        ajax: "{{ route('admin.list_tickettype') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'event_type', name: 'event_type'},
            {data: 'action', name: 'action', className: 'action', orderable: false, searchable: false},
        ]
    });
</script>
@endpush