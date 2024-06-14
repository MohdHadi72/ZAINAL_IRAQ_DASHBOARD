@include('common.header')
@include('common.leftSideBar')
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>
<!-- Begin page -->
<div id="wrapper">

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            @include('common.topbar')
            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="btn-group float-right">
                                    <ol class="breadcrumb hide-phone p-0 m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                                        <li class="breadcrumb-item active"><a href="{{ route('addZone') }}">Back</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Create New Add-Zone</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Add-On Info</h4>
                                    @if (session('status'))
                                        <div class="alert alert-primary mb-1 mt-1">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form  method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Select Project Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="projectName_id"
                                                        value="old('projectName')"  onchange="project(this.value)">
                                                        <option selected hidden value="{{$data->projectName_id}}">{{@$data->getproject->name}}</option>
                                                        @foreach($project as $item)
                                                        <option value="{{$item->id}}">{{@$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                        @error('projectName_id')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                


                                            </div>
                                            <div class="col-xl-6">
                                            
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Add Zone<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="zone" placeholder="Add Zone" value="{{@$data->zone}}"
                                                            id="example-text-input" required>
                                                        @error('zone')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <center>
                                            <div>
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are You Sure To Update This Zone')">Update Zone</button>
                                            </div>
                                        </center>
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
@include('common.footer')
