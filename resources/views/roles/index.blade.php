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
                                <li class="breadcrumb-item"><a href="{{ url('/roles') }}">Roles List</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Role Management</h4>
                        <a href="{{ route('roles.create') }}" class="btn btn-primary mt-3">Create New Role</a>
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
                }, 5000)
            </script>


            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @can('role-edit')
                                <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline', 'onsubmit' => 'return delectmessage()']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $roles->render() !!}
        </div>
    </div>
</div>
 <script>
     function delectmessage(){
         return confirm("Are You Sure To Delete This Role")
     }
 </script>

@include('common.footer')
