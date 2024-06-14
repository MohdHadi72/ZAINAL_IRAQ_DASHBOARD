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
                                            <li class="breadcrumb-item active"><a href="{{ route('project') }}">Back</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit Project</h4>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Project Info</h4>
                                    @if (session('status'))
                                        <div class="alert alert-primary mb-1 mt-1">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('project.update',$project->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                            class="col-sm-4 col-form-label">Project Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="name" placeholder="Project Name" 
                                                            value="{{ $project->name }}" id="example-text-input" required>
                                                        @error('name')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Location<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="location" placeholder="Location"
                                                            value="{{ $project->location }}" id="example-text-input" required>
                                                        @error('location')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Contact Number<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone" maxlength="12" type="text"
                                                            name="phone" placeholder="Contact Number" value="{{ $project->phone }}"
                                                            id="example-text-input" required>
                                                        @error('phone')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Email<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control txtOnly"
                                                            type="email" name="email" placeholder="Email" value="{{ $project->email }}"
                                                            id="example-text-input" required>
                                                        @error('email')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Select Add-On</label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select select" name="addOn[]"
                                                        value="old('addOn')" multiple selected>
                                                        @foreach($addOn as $addOn)
                                                        <option value="{{$addOn->id}}">{{$addOn->name}}</option>
                                                        @endforeach
                                                    </select>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <center>
                                            <div>
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are You Sure To Update This Project?')">Updated</button>
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
{{-- 
<script type="text/javascript">
    $("#rowAdder").click(function () {
        newRowAdd =
            '<div id="row"> <div class="input-group m-3">' +
            '<div class="input-group-prepend">' +
            '<button class="btn btn-danger" id="DeleteRow" type="button">' +
            '<i class="bi bi-trash"></i> Delete</button> </div>' +
            '<input type="text" class="form-control col-md-8" name="zone[]"> </div> </div>';

        $('#newinput').append(newRowAdd);
    });
    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    })
</script> --}}