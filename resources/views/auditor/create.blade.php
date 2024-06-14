@include('common.header')
@include('common.leftSideBar')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
                                <h4 class="page-title">Create New Auditor</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Auditor Info</h4>
                                    @if (session('status'))
                                        <div class="alert alert-primary mb-1 mt-1">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="{{ url('/store-auditor') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">First Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="fname" placeholder="First Name" value=""
                                                            id="example-text-input" required readonly>
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
                                                            id="example-text-input" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Last
                                                        Name<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="lname" placeholder="Last Name"
                                                            id="example-text-input" required readonly>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Proviens<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="proviens" placeholder="Proviens"
                                                            id="example-text-input" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Address<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="address" placeholder="Address" id="example-text-input"
                                                            required readonly>
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
                                                            placeholder="Phone" id="example-text-input" required readonly>
                                                        @error('phone')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Occupation<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="occupation" placeholder="Occupation" readonly
                                                            id="occupation">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Id Number<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="idNumber" placeholder="Id Number" id="example-text-input" required readonly />
                                                        @error('idNumber')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label" >Date Issue<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                         <input class="form-control" type="date" name="issueDate" placeholder="ID Date Issue" id="example-text-input" required readonly>
                                                         @error('issueDate')
                                                         <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
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
                                    <h4 class="mt-0 header-title">House Detail</h4>
                                   
                                        <div class="row">
                                            <div class="col-xl-6">
                                                
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label" >House Number<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="houseNumber_id" value="old('houseNumber_id')" onclick="product(this.value);" required>
                                                            <option value="">House Number</option>
                                                            @foreach ($product as $item)
                                                            <option value="{{ $item->id }}">{{ $item->houseNumber }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('houseNumber_id')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Category</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="category" placeholder="Category" id="category" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Zone</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="zone" placeholder="Zone" id="zone" />
                                                        @error('zone')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label" >House Price<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control phone" type="text" name="housePrice" placeholder="House Price" id="example-text-input" required readonly/>
                                                        @error('housePrice')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                               <div class="form-group row">
                                                   <label for="example-text-input" class="col-sm-4 col-form-label" >Build-up-Area</label>
                                                   <div class="col-sm-10">
                                                       <input class="form-control" type="text" name="area" placeholder="Build-up-Area" id="area" readonly />
                                                       </div>
                                                    </div>
                                                </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Add-On</label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="addOn" value="old('addOn')" >
                                                            <option>Add-On</option>
                                                            @foreach ($addOn as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label" >Land Size</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="landSize" placeholder="Land Size" id="landsize" readonly />
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label" >Down Payment</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control phone" type="text" name="downPayment" placeholder="Down Payment" id="downpayment" readonly/>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Emi Period</label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" maxlength="12" name="emi"
                                                            placeholder="Emi Period" id="example-text-input" required readonly>
                                                        @error('emi')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label" >Generate Uiid<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="uiid" placeholder="Generate Uiid" value="{{$uiid}}" id="uiid" readonly required/>
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
<script>
   function Emi(){
        let total = parseFloat(document.getElementById('total').value);
        let downPayment = parseFloat(document.getElementById('downpayment').value);
        let installment = parseFloat(document.getElementById('installment').value);

        let emi = (total - downPayment) / installment;
        emi = emi.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        document.getElementById("output").value = emi;
    }   
    
</script>


@include('common.footer')

