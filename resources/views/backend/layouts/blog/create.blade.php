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
                                <div class="example">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="defaultconfig" class="form-label">Title</label>
                                            <input type="text" class="form-control" maxlength="25" id="defaultconfig">
                                        </div>
                                        <div class="form-group">
                                            <label for="thresholdConfig" class="form-label">Sub-title</label>
                                            <input type="text" class="form-control" maxlength="25" id="thresholdConfig">
                                        </div>
                                        <div class="form-group">
                                            <label for="alloptions" class="form-label">Description</label>
                                            <textarea class="form-control" maxlength="225" id="textarea" rows="3"></textarea>

                                        </div>

                                        <div class="form-group">
                                            <label for="alloptions" class="form-label">Sub Description</label>
                                            <textarea class="form-control" maxlength="225" id="textarea" rows="3"></textarea>

                                        </div>
                                </div>
                                </form>
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
