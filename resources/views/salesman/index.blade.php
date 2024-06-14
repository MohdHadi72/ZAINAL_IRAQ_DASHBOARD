
@include('common.header')
@include('common.leftSideBar')
<script>
    @if(Session::has('success'))
  toastr.options={
      "closeButton":true,
      "progressBar":true,
  }
  toastr.success("{{ session('success') }}")
  @endif
  </script>
  <script>
    @if(Session::has('update'))
  toastr.options={
      "closeButton":true,
      "progressBar":true,
  }
  toastr.success("{{ session('update') }}")
  @endif
  </script>
<div id="preloader">
  <div id="status">
      <div class="spinner"></div>
  </div>
</div>
<div id="wrapper">
    <div class="content-page"><!-- Start content -->
        <div class="content">
            <!-- Top Bar Start -->
            @include('common.topbar')
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                        <div class="table-responsive">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">SalesMan Management</h4>
                        <!-- <a href="{{ url('salesman/create') }}" class="btn btn-primary mt-3">Add SalesMan</a>--->
                    </div>
                </div>
            </div>
        <table id="datatable-buttons" class="table table-striped table-bordered   ">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Project Name</th>
                        <th>Zone</th>
                        <th>House No.</th>
                        <th>Category</th>
                        <th>EMI Period</th>
                        <th>Land Size</th>
                        <th>Build Area</th>
                        <th>House Price</th>
                        <th>After Add-On Price</th>
                        <th>EMI Amount</th>
                        <th>Down Payment</th>
                        <th>Auditor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($salesman as $item)
                       <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{@$item->project->name}}</td>
                        <td>{{@$item->getzone->zone}}</td>
                        <td>{{@$item->product->houseNumber}}</td>
                        <td>{{@$item->product->category}}</td>
                        <td>
                            @if($item->emi==null || $item->emi==Null)
                            {{"No Emi Period"}}
                            @else
                            {{$item->emi}}
                            @endif
                        </td>
                        <td>{{@$item->landSize}}{{" sqrt"}}</td>
                        <td>{{@$item->area}}{{" sqrt"}}</td>
                        <td>{{@$item->price}}{{" $"}}</td>
                       <td>{{ (float)$item->price + (float)$item->addOnPrice }}</td>




                        <td>
                            @if($item->emiAmount==null || $item->emiAmount==Null)
                            {{"No Emi Amount"}}
                            @else
                            {{$item->emiAmount}} {{" $"}}
                            @endif
                        </td>
                        <td>
                        {{@$item->downPayment}}{{" $"}}
                        </td>
                        <td>
                        {{@$item->AuditorData}}
                        </td>
                        <td>
                            @if(Auth::check() && Auth::user()->roles->contains('name', 'Auditor') )
                            <a href="{{ url('salesman/edit/'.$item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i></a>
                         @elseif (Auth::check() && Auth::user()->roles->contains('name', 'Admin') )
                         <a href="{{ url('salesman/edit/'.$item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i></a>
                             <button type="button" onclick="delete_client({{ $item->id }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            @elseif (Auth::check() && Auth::user()->roles->contains('name', 'Salesman') )
                            <a href="{{ url('salesman/edit/'.$item->id) }}" class="btn btn-sm btn-primary">
                               <i class="fas fa-edit"></i></a>
                                <button type="button" onclick="delete_client({{ $item->id }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                         @endif
                        </td>
                       </tr>
                   @endforeach
                </tbody>
            </table>
            {!! $salesman->links() !!}
        </div>
    </div>
    </div>
</div>

@include('common.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    function delete_client(id) {

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
                        url: '{{ url('/salesman/delete') }}/' + id,
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