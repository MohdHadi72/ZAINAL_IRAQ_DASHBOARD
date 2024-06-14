@include('common.header')
@include('common.leftSideBar')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    function auditor(id) {
        $.ajax({
            type: "get",
            url: "{{ url('getdataAudit') }}/" + id,
            cache: false,
            success: function(data) {
                $('#zone').val(data.zone);
            }
        });
    }
</script>

<script>
    function product(id) {
        $.ajax({
            type: "get",
            url: "{{ url('getdataproduct') }}/" + id,
            cache: false,
            success: function(data) {
                $('#category').val(data.category);
                $('#landsize').val(data.landSize);   
                $('#area').val(data.area); 
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
                                                href="{{ route('auditor.index') }}">Back</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit Auditor</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Auditor  Info Edit</h4>
                                    @if (session('status'))
                                        <div class="alert alert-primary mb-1 mt-1">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('auditor.update',$data->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">First Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="fname" placeholder="First Name" value="{{$data->fname}}"
                                                            id="example-text-input" required>
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
                                                            name="mname" placeholder="Middle Name" value="{{$data->mname}}"
                                                            id="example-text-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Last
                                                        Name<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="lname" placeholder="Last Name" value="{{$data->lname}}"
                                                            id="example-text-input" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Address<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="address" placeholder="Address" value="{{$data->address}}" id="example-text-input"
                                                            required>
                                                        @error('address')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Phone<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" maxlength="12" name="phone"
                                                            placeholder="Phone" value="{{$data->phone}}" id="example-text-input" required>
                                                        @error('phone')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Occupation</label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="occupation" placeholder="Occupation" value="{{$data->occupation}}"
                                                            id="example-text-input">
                                                    </div>
                                                </div>



                                                <div class="form-group row">

                                                    <label class="col-sm-4 col-form-label">Project Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="projectName"
                                                            value="old('projectName')" onchange="auditor(this.value);"
                                                            required>
                                                            <option value="">Project Name</option>

                                                            @foreach ($project as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
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
                                                        class="col-sm-4 col-form-label">Zone</label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="zone" placeholder="Zone"
                                                            id="zone">
                                                            
                                                            @error('zone')-->
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                    

                                                <div class="form-group row">

                                                    <label class="col-sm-4 col-form-label">House Number<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="houseNumber_id"
                                                            value="old('houseNumber_id')" onclick="auditor(this.value);"
                                                            required>
                                                            <option value="">House Number</option>

                                                            @foreach ($product as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->houseNumber }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('houseNumber_id')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Category</label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="category" placeholder="Category"
                                                            id="category" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <label class="col-sm-4 col-form-label">Add-On</label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="addOn"
                                                            value="old('addOn')">
                                                            <option>Add-On</option>
                                                            @foreach ($addOn as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Land Size</label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="landSize" placeholder="Land Size" 
                                                            id="landsize" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Generate Uiid<span
                                                        style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="uiid" placeholder="Generate Uiid"  value="{{$data->uiid}}"
                                                            id="uiid" readonly required>
                                                    </div>
                                                </div>



                                                {{-- <div class="row">
                                                    <div class="col-xl-6">
                                                      <div class="card">
                                                        <div class="card-body">
                                                          <h4 class="mt-0 header-title">File Upload 1</h4>
                                                          <p class="text-muted mb-4 font-13">
                                                            Your so fresh input file — Default version
                                                          </p>
                                                          <input type="file" id="input-file-now" class="dropify" />
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div> --}}


                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Build-up-Area</label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="area" placeholder="Build-up-Area"
                                                            id="area" readonly>
                                                      
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">House Price<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="housePrice" value="{{$data->housePrice}}"
                                                            placeholder="House Price" id="example-text-input"
                                                            required>
                                                        @error('housePrice')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Total Price<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="totalPrice"
                                                            placeholder="Total Price" value="{{$data->totalPrice}}" id="total"
                                                            required>
                                                        @error('totalPrice')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Down Payment</label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="downPayment"  
                                                            placeholder="Down Payment" value="{{$data->downPayment}}" id="downpayment">
                                                      
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Number Of Installment</label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="installment" placeholder="Number Of Installment" value="{{$data->installment}}"
                                                            id="installment" onchange="Emi();">
                                                      
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Emi</label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="emi" placeholder="Emi" 
                                                            id="output" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">
                                                        File Creation<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="date"
                                                            name="fileCreation" placeholder="File Creation" value="{{$data->fileCreation}}"
                                                            id="example-text-input" required>
                                                        @error('fileCreation')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                               

                                                <div class="form-group row">

                                                    <label class="col-sm-4 col-form-label">Id Type<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="idType"
                                                            value="old('idType')" required>
                                                            <option value="{{$data->idType}}" selected>{{$data->idType}}</option>
                                                            @if($data->idType=="pan")
                                                            <option value="identity">Identity Card</option>
                                                            <option value="passport">PassPort</option>
                                                            @elseif($data->idType=="identity")
                                                            <option value="pan">Pan Card</option>
                                                            <option value="identity">PassPort</option>
                                                            @elseif($data->idType=="passport")
                                                            <option value="identity">Identity Card</option>
                                                            <option value="pan">Pan Card</option>
                                                          @endif
                                                        </select>
                                                        @error('idType')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Id
                                                        Number<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="idNumber" placeholder="Id Number" value="{{$data->idNumber}}"
                                                            id="example-text-input" required>
                                                        @error('idNumber')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Id
                                                        Date Issue<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="date"
                                                            name="issueDate" placeholder="ID Date Issue" value="{{$data->issueDate}}"
                                                            id="example-text-input" required>
                                                        @error('issueDate')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Alternative Phone</label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" maxlength="12" name="alternaticePhone" value="{{$data->alternaticePhone}}"
                                                            placeholder="Alternative Phone" id="example-text-input">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="mt-0 header-title">Upload Document<span style="color: red">*</span></h4>
                                                                {{-- <input type="file" id="input-file-now" value="{{$data->docs}}"
                                                                    class="dropify" name="docs" required/> --}}
                                                                    @if($data->docs)
    <p>Current Document: {{$data->docs}}</p>
@endif
<input type="file" id="input-file-now" class="dropify" name="docs" @if(!$data->docs) required @endif />
                                                                    @error('docs')
                                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <center>
                                            <div>
                                                <button type="submit" class="btn btn-primary">Update</button>
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
<script src="/assets/js/emiCalculator.js"></script>
@include('common.footer')

