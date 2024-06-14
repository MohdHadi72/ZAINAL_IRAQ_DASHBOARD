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
                                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Enquiry Management</h4>
                                    
                                            @if(Auth::check() && Auth::user()->roles->contains('name', 'Receptionist') )
                                                <a href="/add-enquiry" class="btn btn-primary mt-3" >Create New Enquiry</a>
                                            @elseif (Auth::check() && Auth::user()->roles->contains('name', 'Admin') )
                                                <a href="/add-enquiry" class="btn btn-primary mt-3" >Create New Enquiry</a>
                                            @endif
                                         </div>
                                     </div>
                                 </div>

                                    <!-- end page title end breadcrumb -->
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
                                                 <h4 class="mt-0 header-title">Enquiry List</h4>
                                                  <div class="table-responsive">
                                                    <table id="datatable-buttons" class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                    <th>S.NO</th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Phone No.</th>
                                                    <th>Salesman</th>
                                                    <th>Address</th>
                                                    <th>Occupation</th>
                                                    <th>Project Name</th>
                                                    <th>Description</th>
                                                    <th>Assigned to</th>
                                                    <th>Status</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                   $user = auth()->user();
                                                   $isSalesman = $user && $user->getRoleNames() == '["Salesman"]';
                                                   @endphp
                                                @foreach ($data as $key => $item)
                                                 
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->fname }}</td>
                                                    <td>{{ $item->mname }}</td>
                                                    <td>{{ $item->lname }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->salesman }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>{{ $item->occupation }}</td>
                                                    <td>{{ $item->projectName }} </td>
                                                    <td>{{ $item->desc }} </td>
                                                    @if ($isSalesman)
                                                <td>{{Auth()->user()->email}}</td>
                                                 <td>@if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                                </td>
                                                @else
                                                   <td>{{ $item->Assigned }}</td>
                                                   <td>{{ $item->Status }}</td>
                                               @endif 
                                               <td class="badge badge-success p-2 mt-4 m-1" style="color:white; font-size:12px;">{{ $item->updated_at->format('h:i:A') }}</td>
                                                  <td>
   
                                            <a class="btn btn-primary" href="{{ route('enquiry.edit', $item->id) }}" ><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['enquiry.destroy', $item->id], 'style' => 'display:inline']) !!}
                                            {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                              
                                            @if(Auth::check() && Auth::user()->roles->contains('name', 'Receptionist') )
                                               <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure To Delete This Enquiry?');"><i class="fa fa-trash"></i></button>
                                            @elseif (Auth::check() && Auth::user()->roles->contains('name', 'Admin') )
                                                <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure To Delete This Enquiry?');"><i class="fa fa-trash"></i></button>
                                            @endif
                                
                                
                                <!--<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>-->
                                {!! Form::close() !!}
                                 
                                                    </td>
                                                </tr>
                                           
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $data->links() !!}
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
    <script>
        function delete_enquiry(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Perform the deletion using AJAX
                $.ajax({
                    url: '{{ url('/delete-enquiry') }}/' + id,
                    method: 'get',
                    success: function(res) {
                        // Handle success if needed
                        // For example, reload the page after deletion
                        window.location.reload();
                    }
                });
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    }
    </script>
</body>
@include('common.footer')
