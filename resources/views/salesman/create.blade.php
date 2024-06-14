        @include('common.header')
@include('common.leftSideBar')

<script>
    function Salesman(id) {
        $.ajax({
            type: "get",
            url: "{{ url('get-data') }}/" + id,
            cache: false,
            success: function(data) {
                console.log(data);
                $('#category').val(data.category);
                $('#monthTime').val(data.monthTime);
                $('#landSize').val(data.landSize);
                $('#area').val(data.area);
                $('#housePrice').val(data.price);
                $('#totalAmount').val(data.totalAmount);
                $('#downPayment').val(data.downPayment);
            }
        });
    }
</script>
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
                                                href="{{ route('salesman.index') }}">Back</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">House Assign</h4>
                            </div>
                        </div>
                    </div>

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
                                    <form action="{{ url('/store-salesman') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">First Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="fname" placeholder="First Name"
                                                            value="{{ $enquiry->fname }}" id="example-text-input"
                                                            required readonly>
                                                        @error('fname')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Middle Name</label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="mname" placeholder="Middle Name"
                                                            value="{{ $enquiry->mname }}" id="example-text-input"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Last
                                                        Name<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="lname" placeholder="Last Name"
                                                            value="{{ $enquiry->lname }}" id="example-text-input"
                                                            required readonly>
                                                        @error('lname')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Proviens<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="proviens" placeholder="Proviens" oninput="capitalizeFirstLetter(this)"
                                                            id="example-text-input" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Address<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="address" placeholder="Address" id="example-text-input"
                                                            value="{{ $enquiry->address }}" required readonly>
                                                        @error('address')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Phone<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" maxlength="12" name="phone"
                                                            value="{{ $enquiry->phone }}" placeholder="Phone"
                                                            id="example-text-input" required readonly>
                                                        @error('phone')
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
                                                            value="{{ $enquiry->occupation }}" name="occupation"
                                                            placeholder="Occupation" readonly id="occupation">
                                                        @error('occupation')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Id
                                                        Number<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="idNumber"
                                                            value="{{ old('idNumber') }}" placeholder="Id Number" oninput="capitalizeFirstLetter(this)"
                                                            id="example-text-input" required />
                                                        @error('idNumber')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Date Issue<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="date" name="issueDate"
                                                            placeholder="ID Date Issue"
                                                            value="{{ old('issueDate') }}" id="example-text-input"
                                                            required>
                                                        @error('issueDate')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Generate Uiid<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="uiid"
                                                            placeholder="Generate Uiid" value="{{ $uiid }}"
                                                            id="uiid" readonly required />
                                                        @error('uiid')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">House Info</h4>
                                    <div class="row">
                                        <div class="col-xl-6">

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Select Project Name<span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="projectName_id"
                                                        value="old('projectName')" id="project"
                                                        onchange="project(this.value)">
                                                        <option>Select Project Name</option>
                                                        @foreach ($project as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('projectName_id')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Select Zone<span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="custom-select" id="zone" name="zone"
                                                        value="old('zone')">
                                                        <option>Select Zone</option>
                                                    </select>
                                                    @error('zone')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-4 col-form-label">Category<span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-10"><input class="form-control" type="text"
                                                        name="category" placeholder="Category" id="category"
                                                        required readonly>
                                                    @error('category')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">House Number<span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="custom-select" name="houseNumber_id" id="house"
                                                        value="old('houseNumber_id')" onchange="Salesman(this.value);"
                                                        required>
                                                        <option>select House Number</option>
                                                      
                                                    </select>
                                                    @error('houseNumber_id')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                     {{--  <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Select Add-On</label>
                                                <div class="col-sm-10">
                                                    <select class="custom-select select" name="addOn[]" multiple id="addOnSelect">
                                                        <option value="" selected disabled>Select an add-on</option>
                                                        
                                                       @foreach ($data as $addOn)
                                                            <option value="{{ $addOn->id }}" data-price="{{ $addOn->price }}">{{ $addOn->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>--}}
                                             <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Select Add-On<span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="custom-select select" id="addOnSelect" name="addOn[]"
                                                        multiple>
                                                        <option >Select AddOn</option>
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-10"><input class="form-control" type="text"
                                                        name="addOn" placeholder="Add-On" id="addOnInput" readonly>
                                                </div>
                                            </div>


                                        </div>
                                      
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">EMI
                                                    Month</label>
                                                <div class="col-sm-10"><input class="form-control" type="text"
                                                        name="emi" placeholder="Emi Month" id="monthTime"
                                                        readonly>
                                                    @error('emi')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Land
                                                    Size<span style="color: red">*</span></label>
                                                <div class="col-sm-10"><input class="form-control txtOnly"
                                                        type="text" name="landSize" placeholder="Land Size"
                                                        id="landSize" required readonly>
                                                    @error('landSize')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-4 col-form-label">Build-up Area<span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-10"><input class="form-control" type="text"
                                                        name="area" placeholder="Build Up Area" id="area"
                                                        required readonly>
                                                    @error('area')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">House
                                                    Price<span style="color: red">*</span></label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="price"
                                                        placeholder="House Price" id="housePrice" required readonly>
                                                    @error('price')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Add-On Price</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="addOnPrice"
                                                        placeholder="Add-On Price" id="addOnPrice" required readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">EMI
                                                    Amount</label>
                                                <div class="col-sm-10"><input class="form-control" type="text"
                                                        name="emiAmount" placeholder="EMI Amount" id="totalAmount"
                                                        readonly>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Down
                                                    Payment<span style="color: red">*</span></label>
                                                <div class="col-sm-10"><input class="form-control" type="text"
                                                        name="downPayment" placeholder="Down Payment"
                                                        id="downPayment" readonly required>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Select Auditor<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="AuditorData" required>
                                                            <option selected>Select Auditor</option>
                                                            @foreach ($user as $key => $user)
                                                            @if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $v)
                                                            @if($v=='Auditor')
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
                </div>
            </div>
        </div>
    </div>
</div>
@include('common.footer')

<script>
    
    var select = document.getElementById("addOnSelect");
    var input = document.getElementById("addOnInput");
    select.addEventListener("change", function() {
        var selectedOptions = Array.from(this.selectedOptions).map(option => option.textContent);
       
        input.value = selectedOptions.join(', '); 
    });
</script>
<!-- Include jQuery from a CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
   $(document).ready(function() {
    $("#project").change(function() {
        var project_id = $(this).val();
        if (project_id == "") {
            project_id = 0;
        }
        $.ajax({
            url: '{{ url('/getproject') }}/' + project_id,
            type: 'get',
            success: function(response) {
                $('#zone').html(response.output);
                 $('#addOnSelect').html(response.addon);
                // Clear house options when project changes
                $('#house').html('<option value="">Select House</option>');
            }
        });
    });

    $("#zone").change(function() {
        var zone_id = $(this).val();
        if (zone_id == "") {
            zone_id = 0;
        }
        $.ajax({
            url: '{{ url('/gethouses') }}/' + zone_id,
            type: 'get',
            success: function(response) {
                $('#house').html(response.house);
            }
        });
    });
});

</script>


<script>
    $(document).ready(function() {
        $('#addOnSelect').on('change', function() {
            var totalPrice = 0;
            $('#addOnSelect option:selected').each(function() {
                totalPrice += parseFloat($(this).data('price'));
            });
            $('#addOnPrice').val(totalPrice.toFixed(0));
        });
    });
</script>

