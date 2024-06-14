@include('common.header')
@include('common.leftSideBar')
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
                                <li class="breadcrumb-item"><a href="{{ url('/auditor') }}">Auditor List</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Auditor Management</h4>
                        <!--<a href="{{ url('auditor/create') }}" class="btn btn-primary mt-3">Create New Auditor</a>-->
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <table id="datatable-buttons" class="table table-striped table-bordered   ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>ID Number</th>
                        <th>Date of Issue</th>
                        <th>Phone</th>
                        <th>Total Price</th>
                        <th>Generate UID</th>
                        <th>Print Form</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $Audit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $Audit->fname }}</td>
                            <td>{{ $Audit->lname }}</td>
                           
                            <td>{{ $Audit->idNumber }}</td>
                            <td>{{ $Audit->issueDate }}</td>
                            <td>{{ $Audit->phone }}</td>
                            <td>{{ $Audit->price }}{{" $"}}</td>
                            <td>{{ $Audit->uiid }}</td>
                            <td>
                                <a href="{{ url('auditor/print-form/'.$Audit->id) }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-file-pdf-o "></i></a>
                            </td>
                            
                            <!--<td>-->
                            <!--    <a href="{{ url('auditor/payment-installment/'.$Audit->id) }}" class="btn btn-sm btn-success"> -->
                            <!--    <i class="fas fa-print "></i></a>-->
                            <!--</td>-->
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->render() !!}
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
                        url: '{{ url('/auditor/delete') }}/' + id,
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
@include('common.footer')
