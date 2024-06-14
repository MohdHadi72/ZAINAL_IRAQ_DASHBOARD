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
                                                href="{{ route('products.index') }}">Back</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Create New Property</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Property Info</h4>
                                    @if (session('status'))
                                        <div class="alert alert-primary mb-1 mt-1">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('products.update',$product->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Select Project Name<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control select2" name="projectName_id"
                                                        value="old('projectName')" id="project" onchange="project(this.value)">
                                                        <option value="{{$product->id}}" selected>{{$product->project->name}}</option>
                                                        @foreach($project as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
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
                                                        <option selected value="{{$product->zone}}" >{{$product->getZone->zone}}</option>
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
                                                    <div class="col-sm-10"><input class="form-control" type="text" value="{{$product->category}}"
                                                            name="category" placeholder="Category" 
                                                            id="example-text-input" required>
                                                        @error('category')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">House Number<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="houseNumber" placeholder="House Number" value="{{$product->houseNumber}}"
                                                            id="example-text-input" required>
                                                        @error('houseNumber')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Down Payment<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                            name="downPayment" placeholder="Down Payment" value="{{$product->downPayment}}"
                                                            id="example-text-input" required>
                                                        @error('downPayment')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Add
                                                        Price<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control phone"
                                                            type="text" name="price" placeholder="Add Price"  value="{{$product->price}}"
                                                            id="example-text-input" required>
                                                        @error('price')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Land
                                                        Size<span style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control txtOnly"
                                                            type="text" name="landSize" placeholder="Land Size"  value="{{$product->landSize}}"
                                                            id="example-text-input" required>
                                                        @error('landSize')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-4 col-form-label">Total Area Built<span
                                                            style="color: red">*</span></label>
                                                    <div class="col-sm-10"><input class="form-control txtOnly"
                                                            type="text" name="area" value="{{$product->area}}"
                                                            placeholder="Total Area Built" id="example-text-input"
                                                            required>
                                                        @error('area')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div id="emi" style="display: block;">
                                                    <div class="card-body bootstrap-select-1">
                                                        <h4 class="mt-0 header-title">Add EMI</h4>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h6 class="input-title mb-2 mt-0">EMI Amount</h6>
                                                                <div class="asColorPicker-wrap"><input type="text" value="{{$product->totalAmount}}"
                                                                        placeholder="Total Amount" id="amount" onchange="Calculate()"
                                                                        class="colorpicker form-control mt-0 asColorPicker-input phone"
                                                                        name="totalAmount">
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="col-md-4">
                                                                <h6 class="input-title mb-2 mt-2 mt-lg-0">Max EMI Month
                                                                </h6>
                                                                <div class="asColorPicker-wrap"><input type="text" value="{{$product->monthTime}}"
                                                                        class="complex-colorpicker form-control asColorPicker-input phone"
                                                                        placeholder="Month Time" name="monthTime" id="time" onchange="Calculate()">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h6 class="input-title mb-2 mt-2 mt-lg-3">Total Payment</h6>
                                                                <div class="asColorPicker-wrap"><input type="text" value="{{$product->totalPayment}}"
                                                                    class="complex-colorpicker form-control asColorPicker-input phone"
                                                                    placeholder="Total Payment" name="totalPayment" id="output" onchange="Calculate()">
                                                            </div>
                                                            </div>   
                                                        </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <center>
                                            <div>
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are You Sure To Update This Property?')">Update</button>
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
        $("#project").change(function() {
            var project_id = $(this).val();
            // alert(project_id);
            if (project_id == "") {
                var project_id = 0;
            }
            $.ajax({
                url: '{{ url('/getproject') }}/' + project_id,
                type: 'get',
                success: function(response) {
                    $('#zone').html(response.output);


                }
            });
        });
    });
</script>

