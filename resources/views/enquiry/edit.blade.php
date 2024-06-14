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
                                        <li class="breadcrumb-item active"><a
                                                href="{{ route('enquiry.index') }}">Enquiry</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit Enquiry</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <!-- start Basic info  -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Enquiry Info</h4>
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
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">First Name
                                                        <span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control txtOnly"
                                                            type="text" name="fname" placeholder="First Name" value="{{$enquiry->fname}}"
                                                            id="example-text-input" oninput="capitalizeFirstLetter(this)" required>
                                                        @error('fname')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Middle Name</label>
                                                    <div class="col-sm-10"><input class="form-control txtOnly"
                                                            type="text" name="mname" placeholder="Middle Name"  value="{{$enquiry->mname}}" oninput="capitalizeFirstLetter(this)"
                                                            id="example-text-input">
                                                        @error('mname')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Last
                                                        Name
                                                        <span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control txtOnly"
                                                            type="text" name="lname" placeholder="Last Name"  value="{{$enquiry->lname}}" oninput="capitalizeFirstLetter(this)"
                                                            id="example-text-input" required>
                                                        @error('lname')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Phone Number<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="phone" placeholder="Phone Number"  value="{{$enquiry->phone}}"
                                                            maxlength="10" id="example-text-input" required>
                                                        @error('phone')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                  @if(Auth::check() && Auth::user()->roles->contains('name', 'Salesman') )
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Salesman Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control"
                                                            type="text" name="salesman" placeholder="Salesman"  value="{{$enquiry->salesman}}"
                                                             id="example-text-input" required readonly>
                                                        @error('salesman')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                </div>
                                            @else 
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Select SalesMan<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="salesman"
                                                            value="old('salesman')" required>
                                                            <option selected>{{$enquiry->salesman}}</option>
                                                             @foreach ($data as $key => $user)
                                                            @if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $v)
                                                            @if($v=='Salesman')
                                                            <option value="{{$user->name}}">{{$user->name}} </option>
                                                             @endif
                                                            @endforeach
                                                        @endif
                                                        @endforeach

                                                          
                                                        </select>
                                                        @error('salesman')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Address<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control txtOnly"
                                                            type="text" name="address" placeholder="Address" onkeypress="checkForSpecialCharacter(event)" value="{{$enquiry->address}}"
                                                            id="example-text-input" required>
                                                        @error('address')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Occupation<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="occupation" placeholder="Occupation"  value="{{$enquiry->occupation}}" oninput="capitalizeFirstLetter(this)"
                                                            id="example-text-input" required>
                                                        @error('occupation')
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
                                                            <option selected>{{$enquiry->projectName}}</option>
                                                            <!--<option selected>{{$enquiry->name}}</option>-->
                                                            @foreach($project as $project)
                                                            <option value="{{$project->name}}">{{$project->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('projectName')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>   
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Description<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" style="height:150px" oninput="capitalizeFirstLetter(this)"  name="desc" placeholder="Detail" required>{{$enquiry->desc}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Process<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" style="height:150px" oninput="capitalizeFirstLetter(this)"  name="desc" placeholder="Detail" required>{{$enquiry->desc}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <center>
                                            <div>
                                            @if(Auth::check() && Auth::user()->roles->contains('name', 'Salesman') )
                                                <a href="{{url('salesman/create/'.$enquiry->id)}}"><button type="button" class="btn btn-primary">Proceed</button></a>
                                            @elseif(Auth::check() && Auth::user()->roles->contains('name', 'Receptionist') )
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            @elseif (Auth::check() && Auth::user()->roles->contains('name', 'Admin') )
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure To Update This Enquiry?');">Update</button>
                                                <a href="{{url('salesman/create/'.$enquiry->id)}}"><button type="button" class="btn btn-primary">Proceed</button></a>
                                            @endif
                                            </div>
                                        </center>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Basic info -->
                </div>

            </div><!-- Page content Wrapper -->

        </div><!-- content -->
    </div>
</div>
@include('common.footer')

