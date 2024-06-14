
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
                                <li class="breadcrumb-item"><a href="{{ url('/users') }}">Users List</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Users Management</h4>
                        <a href="{{ route('users.create') }}" class="btn btn-primary mt-3">Create New User</a>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <!---<a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>--->
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline' , 'onsubmit' => 'return confirmDelete()']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
{!! $data->render() !!}
        </div>
    </div>
</div>

<script>
    function confirmDelete(){
        return confirm("Are You Sure To Delte This User?");
    }
</script>


{{-- @endsection --}}
@include('common.footer')
