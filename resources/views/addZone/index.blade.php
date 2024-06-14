
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
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add-Zone Management</h4>
                        <a href="{{ url('addZone/create') }}" class="btn btn-primary mt-3">Add-Zone</a>
                    </div>
                </div>
            </div>
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


            <table id="datatable-buttons" class="table table-striped table-bordered   ">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Project Name</th>
                        <th>Zone</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ @$item->projectName_id }}</td> --}}
                            <td>{{ @$item->getproject->name }}</td>
                            <td>{{ @$item->zone }}</td>
                            <td>
                                <a href="{{ url('addZone/edit/'.$item->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i></a>
                                <button type="button" onclick="delete_client({{ $item->id }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            {!! $data->links() !!}
        </div>
    </div>
</div>
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

{{-- {!! $data->render() !!} --}}
{{-- @endsection --}}
@include('common.footer')
