@include('common.header')
@include('common.leftSideBar')
<style>
    .border-bottom {
        border: none;
        border-bottom: 2px solid black !important;
        margin: 10px;
    }
</style>
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
                                        <li class="breadcrumb-item active"><a href="{{ url('/docs-add') }}">Back</a>
                                        </li>
                                    </ol>
                                </div>
                                <form action="#" method="POST">
                                        @csrf
                                <h4 class="page-title">Create New Stage-<span><input type="text" name="title"
                                                Placeholder="Title" class="border-bottom" required></span><span
                                            class="text-danger">*</span></h4>
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
                                    
                                        <div class="row">
                                            <div class="col-xl-6">
                                                
                                                <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">House Number<span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="custom-select" name="houseNumber" value="old('houseNumber')" id="house" 
                                                        required>
                                                        <option>select House Number</option>
                                                       @foreach($house as $item)
                                                       <option value="{{ $item->id }}">{{@$item->project->houseNumber}}</option>
                                                       @endforeach
                                                      
                                                    </select>
                                                    @error('houseNumber')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Work
                                                        Place<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="workPlace" placeholder="Work Place"
                                                            value="{{ old('workPlace') }}" id="example-text-input"
                                                            required>
                                                        @error('workPlace ')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Buyer Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="buyerName" placeholder="Buyer Name"
                                                            value="{{ old('buyerName') }}" id="buyer" readonly
                                                            required>
                                                        @error('buyerName')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Alternate Number</label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="alternatePhone"
                                                            placeholder="Alternate Number" value="{{ old('alternatePhone') }}"
                                                            id="example-text-input">

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Phone Number<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="phone" placeholder="Phone Number"
                                                            value="{{ old('phone') }}" id="phone" readonly
                                                            required>
                                                        @error('phone')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Address<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="address" placeholder="Address"
                                                            value="{{ old('address') }}" id="address" readonly
                                                            required>
                                                        @error('address')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Price After Add-On</label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="priceAddOn" placeholder="Price After Add-on"
                                                            value="{{ old('priceAddOn') }}" id="addonprice" readonly>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Emi Period</label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="emiPeriod" placeholder="Emi Period"
                                                            value="{{ old('emiPeriod') }}" id="emiperiod" readonly>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">First Installment<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="firstInstallment" placeholder="First Installment"
                                                            value="{{ old('firstInstallment') }}" id="firstinstallment" readonly
                                                            required>
                                                        @error('firstInstallment')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Select Role<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="role" value="old('role')" required>
                                                            <option value="">Select Role</option>
                                                            @foreach($data as $item)
                                                                <option value="{{$item}}">{{$item}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('projectName')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Buyer Sign<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="buyersign"
                                                            placeholder="Buyer Sign" value="{{ old('buyersign') }}"
                                                            id="example-text-input" required>
                                                        @error('buyersign')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Date Issue File<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="date"
                                                            name="dateIssueFile" placeholder="Date Issue File"
                                                            value="{{ old('dateIssueFile') }}" id="example-text-input"
                                                            required>
                                                        @error('dateIssueFile')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">
                                                        Id Number<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="idNumber" placeholder="Id Number"
                                                            value="{{ old('idNumber') }}" id="idnumber" readonly
                                                            required>
                                                        @error('idNumber')
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
                                                            name="occupation" placeholder="Occupation"
                                                            value="{{ old('occupation') }}" id="occupation" readonly
                                                            required>
                                                        @error('occupation')
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
                                                            name="category" placeholder="Category"
                                                            value="{{ old('category') }}" id="category" readonly
                                                            required>
                                                        @error('category')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Date
                                                        Issue<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="date"
                                                            name="dateIssue" placeholder="Date Issue"
                                                            value="{{ old('dateIssue') }}" id="dateissue" readonly
                                                            required>
                                                        @error('dateIssue')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">House Price<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="housePrice"
                                                            placeholder="House Price" value="{{ old('housePrice') }}"
                                                            id="houseprice" readonly required>
                                                        @error('housePrice')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Build Area<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="buildArea" placeholder="Build Area"
                                                            value="{{ old('buildArea') }}" id="area" readonly
                                                            required>
                                                        @error('buildArea')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Land Area<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="landArea" placeholder="Land Area"
                                                            value="{{ old('landArea') }}" id="landsize" readonly
                                                            required>
                                                        @error('landArea')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Agent/Salesman Sign<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file" name="agentsign"
                                                            placeholder="Agent/Salasman Sign"
                                                            value="{{ old('agentsign') }}" id="example-text-input"
                                                            required>
                                                        @error('agentsign')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Accountant Sign<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="file"
                                                            name="accountantsign" placeholder="Accountant Sign"
                                                            value="{{ old('accountantsign') }}" id="example-text-input"
                                                            required>
                                                        @error('accountantsign')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                 <input class="form-control phone" type="text" name="product_id" placeholder="product Id"
                                                            value="{{ old('product_id') }}" id="product_id" hidden  readonly>

                                            </div>

                                        </div>
                                        <center>
                                            <div>
                                                <button type="submit" class="btn btn-primary mx-auto d-block">Add Document
                                                    </button>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $("#house").change(function() {
            var house_id = $(this).val();
            // alert(house_id);
            if (house_id == "") {
                var house_id = 0;
            }
            $.ajax({
                url: '{{ url('/fetch-mid') }}/' + house_id,
                type: 'get',
                 cache: false,
                success: function(response) {
                    console.log(response.id)
                    $('#buyer').val(response.buyerName);
                    $('#phone').val(response.salesman.phone);
                    $('#address').val(response.salesman.address);
                    $('#idnumber').val(response.salesman.idNumber);
                    $('#occupation').val(response.salesman.occupation);
                    $('#category').val(response.salesman.category);
                    $('#dateissue').val(response.salesman.issueDate);
                    $('#houseprice').val(response.salesman.price);
                    $('#area').val(response.salesman.area);
                    $('#landsize').val(response.salesman.landSize);
                    $('#firstinstallment').val(response.salesman.downPayment)
                    $('#emiperiod').val(response.salesman.emi)
                    $('#addonprice').val(response.salesman.addOnPrice)
                    $('#product_id').val(response.product_id)
                }
            });
        });
    });
</script>
