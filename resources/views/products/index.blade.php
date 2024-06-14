
@include('common.header')
@include('common.leftSideBar')
<script>
    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
        toastr.success("{{ session('success') }}")
    @endif
</script>
<script>
    @if (Session::has('update'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
        toastr.success("{{ session('update') }}")
    @endif
</script>
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div><!-- Begin page -->
<div id="wrapper">
    <div class="content-page"><!-- Start content -->
        <div class="content">
            <!-- Top Bar Start -->
            @include('common.topbar')
            <!-- Top Bar End -->
            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="btn-group float-right">
                                    <ol class="breadcrumb hide-phone p-0 m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Property Management</h4>
                                <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">Create New Property</a>
                                {{--<a href="{{ route('products.addProperty') }}" class="btn btn-primary mt-3">Create New Property</a> --}}
                            
                            </div>

                        </div>
                    </div><!-- end page title end breadcrumb -->
                     @if ($message = Session::get('success'))
                <div class="alert alert-success" id="successMessage">
                    <p>{{ $message }}</p>
                </div>
            @endif
             <script>
                 setInterval(function(){
                     document.getElementById("successMessage").style.display = "none";
                 },5000)
             </script>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Property List</h4>
                                    <table id="datatable-buttons" class="table table-bordered table-striped"
                                        style="collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Zone</th>
                                                <th>House Number</th>
                                                <th>Category</th>
                                                <th>Down Payment</th>
                                                <th>Add Price</th>
                                                <th>Land Size</th>
                                                <th>Area</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ @$product->project->name }}</td>
                                                    <td>{{@$product->getZone->zone}}</td>
                                                    
                                                    
                                                    <td>{{ @$product->houseNumber }}</td>
                                                    <td>{{ @$product->category }}</td>
                                                    <td>
                                                        @if(@$product->addOn == "null")
                                                        <span>Empty Data</span>
                                                        @else
                                                        {{ @$product->downPayment }}
                                                        @endif
                                                    </td>
                                                    <td>{{ @$product->price }}</td>
                                                    <td>{{ @$product->landSize }}</td>
                                                    <td>{{ @$product->area }} {{ 'Sqrt'}}</td>
                                                    <td>
                                                        <form action="{{ route('products.destroy', @$product->id) }}"
                                                            method="POST">
                                                            {{-- <a class="btn btn-info"
                                                                href="{{ route('products.show', @$product->id) }}">Show</a> --}}
                                                            @can('product-edit')
                                                                <a class="btn btn-primary" href="{{ route('products.edit', @$product->id) }}"><i class="fa fa-edit"></i></a>
                                                            @endcan


                                                            @csrf
                                                            @method('DELETE')
                                                            @can('product-delete')
                                                                <button type="submit"
                                                                    class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Product?')"><i class="fa fa-trash"></i></button>
                                                            @endcan
                                                                      <!---onclick="delete_Product({{ $product->id }})" -->
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                     {!! @$products->links() !!}
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- container -->
            </div><!-- Page content Wrapper -->
        </div><!-- content -->
    </div>
</div>
<!---
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    function delete_Product(id) {

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '{{ url('/addZone/delete') }}/' + id,
                        method: 'get',
                        success: function(res) {

                        }
                    });
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                    // location reload();
                    $("#datatable-buttons").load(window.location.href + " #datatable-buttons");
                } else {
                    swal("Your imaginary file is safe!");
                }
            });

    }
</script>
--->
</body>
@include('common.footer')
