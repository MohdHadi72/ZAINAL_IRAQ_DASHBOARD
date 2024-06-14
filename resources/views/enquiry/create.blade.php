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
                                <h4 class="page-title">Add Enquiry</h4>
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
                                    <form action="{{ url('/store-enquiry') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">


                                               <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">First Name
                                                        <span style="color: red">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input class="form-control txtOnly" type="text" name="fname" placeholder="First Name" value="{{old('fname')}}"
                                                id="example-text-input" oninput="capitalizeFirstLetter(this)" pattern="[A- Za-z]+" title="Please enter letters only" required>
                                                  @error('fname')
                                                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                      @enderror
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Middle Name</label>
                                                    <div class="col-sm-10"><input class="form-control txtOnly"
                                                            type="text" name="mname" placeholder="Middle Name" value="{{old('mname')}}" oninput="capitalizeFirstLetter(this)" id="example-text-input">
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
                                                            type="text" name="lname" placeholder="Last Name" value="{{old('lname')}}" oninput="capitalizeFirstLetter(this)"
                                                            id="example-text-input" pattern="[A- Za-z]+" title="Please enter letters only" required>
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
                                                            type="text" name="phone" placeholder="Phone Number" value="{{old('phone')}}"
                                                            minlength="10" maxlength="12" id="example-text-input" required>
                                                        @error('phone')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Select SalesMan</label>
                                                <div class="col-sm-10">
                                                 <select class="custom-select" name="salesman" id="salesmanDropdown" onchange="checkSalesman(this)">
    <option value="">Select Salesman</option>
    @php $salesmanFound = false; @endphp
    @foreach ($data as $key => $user)
        @if (!empty($user->getRoleNames()))
            @foreach ($user->getRoleNames() as $v)
                @if($v == 'Salesman')
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @php $salesmanFound = true; @endphp
                @endif
            @endforeach
        @endif
    @endforeach
</select>

<script>
function checkSalesman(selectElement) {
    var selectedValue = selectElement.value;
    
    if (selectedValue) {
        alert('Salesman selected: ' + selectedValue);
    } else {
        alert('No salesman selected');
    }
}
</script>


<span id="no-salesman" style="display: none; color: red;">No salesman Added</span>

<script>
    function checkSalesman(select) {
        var noSalesmanMessage = document.getElementById('no-salesman');
        if (select.value === "") {
            noSalesmanMessage.style.display = 'inline';
        } else {
            noSalesmanMessage.style.display = 'none';
        }
    }

    // Initial check in case the select box is rendered with no selection
    document.addEventListener('DOMContentLoaded', function () {
        var select = document.querySelector('select[name="salesman"]');
        checkSalesman(select);
    });
</script>

                                                </div>
                                            </div>

                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Address<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control txtOnly"  type="text" name="address" placeholder="Address" value="{{old('address')}}"
                                                            id="example-text-input" onkeypress="checkForSpecialCharacter(event)" required>
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
                                                    <div class="col-sm-10"><input class="form-control" type="text"  name="occupation" placeholder="Occupation" value="{{old('occupation')}}" oninput="capitalizeFirstLetter(this)"
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
                                                            value="old('projectName')">
                                                            <option value="">Select Project</option>
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
                                                        <textarea class="form-control" style="height:150px" name="desc" placeholder="Detail" value="{{old('desc')}}" oninput="capitalizeFirstLetter(this)" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="display:none">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Assinged<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name="Assigned"  value="{{ auth()->user()->email }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="display:none">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Status<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                          @php
                                                             $roles = auth()->user()->getRoleNames()->implode(',');
                                                         @endphp
                                                         <input type="text" name="Status" class="form-control" value="{{ $roles }}" readonly>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <center>
                                            <div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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

<script>
function capitalizeFirstLetter(input) {
    // Capitalize the first letter
    input.value = input.value.charAt(0).toUpperCase() + input.value.slice(1);
}
</script>
<script>
function validatePhoneNumber(input) {
    // Remove any non-numeric characters
    input.value = input.value.replace(/\D/g, '');
}
</script>