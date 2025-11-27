@extends('backend.app')
@push('styles')
    <!-- DataTable Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
@endpush
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid mt-5 card">
				{{-- add category button --}}
				<div class="mt-5">
					<a href="{{ route('dashboard.blog.category.create') }}" class="btn btn-primary mb-3">Add Blog Category</a>
				</div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>


            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
@push('scripts')
    <!-- Include DataTable scripts -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endpush
