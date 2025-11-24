@extends('backend.app')
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid mt-5">
				{{-- add category button --}}
				<div>
					<a href="{{ route('dashboard.blog.category.create') }}" class="btn btn-primary mb-3">Add Blog Category</a>
				</div>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
