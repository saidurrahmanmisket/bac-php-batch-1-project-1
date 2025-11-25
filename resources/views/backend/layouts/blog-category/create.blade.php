@extends('backend.app')
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid mt-5">
                {{-- add category button --}}

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Add Blog Category</h3>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('dashboard.blog.category.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="defaultconfig" class="form-label">Name:</label>
                                            <input name="name" type="text" class="form-control" maxlength="25"
                                                id="defaultconfig">
                                            @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="dropify-wrapper" style="height: 212px;">
                                            <div class="dropify-message"><span class="file-icon">
                                                    <p>Drag and drop a file here or click</p>
                                                </span>
                                                <p class="dropify-error">Ooops, something wrong appended.</p>
                                            </div>
                                            <div class="dropify-loader"></div>
                                            <div class="dropify-errors-container">
                                                <ul></ul>
                                            </div><input name="image" type="file" class="dropify"
                                                data-height="200"><button type="button"
                                                class="dropify-clear">Remove</button>
                                            <div class="dropify-preview"><span class="dropify-render"></span>
                                                <div class="dropify-infos">
                                                    <div class="dropify-infos-inner">
                                                        <p class="dropify-filename"><span
                                                                class="dropify-filename-inner"></span></p>
                                                        <p class="dropify-infos-message">Drag and drop or click to replace
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        <button type="submit" class="btn btn-primary mt-5">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
