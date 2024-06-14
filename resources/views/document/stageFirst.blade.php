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
                                <form method="POST">
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
                                                       <option value="{{ $item->id }}">{{@$item->product->houseNumber}}</option>
                                                       @endforeach
                                                      
                                                    </select>
                                                    @error('houseNumber')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Buyer
                                                    Name<span style="color: red">*</span></label>
                                                <div class="col-sm-10"><input class="form-control" type="text"
                                                        name="buyerName" placeholder="Buyer Name" id="buyer"
                                                        value="{{old('buyerName')}}" readonly required>
                                                    @error('buyerName')
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
                                                        value="{{old('dateIssue')}}" id="DOI" readonly required>
                                                    @error('dateIssue')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                    </div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Amount
                                                    In Number<span style="color: red">*</span></label>
                                                <div class="col-sm-10"><input class="phone form-control" type="text"
                                                        name="amountNumber" placeholder="Amount Number"
                                                        value="{{old('zone')}}" id="price" readonly required>
                                                    @error('amountNumber')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                    </div>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Amount
                                                    In Words<span style="color: red">*</span></label>
                                                <div class="col-sm-10"><input class="form-control" type="text"  
                                                        name="amountWords" placeholder="Amount Words"
                                                        value="{{old('zone')}}" id="textInput" required>
                                                    @error('amountWords')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                    </div>
                                                    @enderror

                                                </div>
                                            </div>
                                                <input class="form-control phone" type="text" name="product_id" placeholder="product Id"
                                                            value="{{ old('product_id') }}" id="product_id" hidden readonly>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Select Role<span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="custom-select" name="role" value="old('role')"
                                                        required>
                                                        <option value="">Select Role</option>
                                                        @foreach($data as $item)
                                                        <option value="{{$item}}">{{$item}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('role')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>    
                                    </div>    
                                            <center>
                                            <div>
                                                <button type="submit" class="btn btn-primary mx-auto d-block">Add
                                                    Document</button>
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
                url: '{{ url('/house-num') }}/' + house_id,
                type: 'get',
                 cache: false,
                success: function(response) {
                    // console.log(response.fname)
                    $('#buyer').val(response.fname + ' ' + response.lname);
                    $('#DOI').val(response.issueDate);
                    $('#price').val(response.price);
                    $('#product_id').val(response.houseNumber_id);

                    



                }
            });
        });
    });
</script>

