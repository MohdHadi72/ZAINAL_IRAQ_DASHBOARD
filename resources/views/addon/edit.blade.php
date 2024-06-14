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
                                        <li class="breadcrumb-item active"><a href="{{ route('addOn') }}">Back</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Create New Add-On</h4>
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
                                    <form method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Add-On Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="name" placeholder="Add-On Name" value="{{$data->name}}" oninput="capitalizeFirstLetter(this)"
                                                            id="example-text-input" required>
                                                        @error('name')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Add-On Desciption</strong>
                                                        <textarea class="form-control" style="height:150px" name="detail" oninput="capitalizeFirstLetter(this)" placeholder="Add-On Description">{{$data->detail}}</textarea>
                                                    </div>
                                                </div> 


                                            </div>
                                            <div class="col-xl-6">
                                            
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Add-On Price<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone" type="text"
                                                            name="price" placeholder="Add-On Price" value="{{$data->price}}"
                                                            id="example-text-input" required>
                                                        @error('price')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Select Project<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="projectName"
                                                            value="old('projectName')" required>
                                                            <option selected value="{{$data->id}}" >{{$data->project->name}}</option>
                                                            @foreach($project as $project)
                                                            <option value="{{$project->id}}">{{$project->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('projectName')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <center>
                                            <div>
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure To Update This AddOn?');">Update</button>
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
