@include('common.header')
@include('common.leftSideBar')
<script>
    @if (Session::has('stage-I'))
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
                        <h4 class="page-title">View Document</h4>
                        <a href="{{ url('docs-add') }}" class="btn btn-primary mt-3">Add-Document</a>
                        <a href="{{ url('docs/trash-list') }}"
                            class="btn btn-primary mt-3  float-right">Show-InActive</a>

                        <select class="custom-select  col-sm-4 mx-auto d-block" name="document" id="document" required>
                            <option>Select Role</option>
                            @foreach($data as $item)
                                @php
                                $stage = '';
                                switch($item)
                                    {
                                        case 'Salesman':$stage = 'stageFirst';
                                            break;
                                        case 'Auditor':$stage = 'stageSecond';
                                            break;
                                        case 'Accountant':$stage = 'stageThird';
                                            break;
                                        default:
                                    }
                                @endphp
                                <option value="{{ $stage }}" {{ old('document') == $item ? 'selected' : ''}} >{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered   ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>StageName</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="roles-table">

                </tbody>
            </table>
            {{-- {!! $data->links() !!} --}}
        </div>
    </div>
</div>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>-->



@include('common.footer')

<script>
    $(document).ready(function() {
        $('#document').change(function() {
            var selectedStage = $(this).val();
            $.ajax({
                url: '/fetch-data/' + selectedStage,
                type: 'GET',
                success: function(response)
                    {
                        var rolesTable = $('#roles-table');
                        rolesTable.empty();
                        
                        if (response.length > 0)
                            {
                                var tableBody = $('#roles-table');
                                var serialNumber = 1;
                                var stages=selectedStage
                                console.log(stages)
                                $.each(response, function(index, role)
                                    {
                                       
                                        var row = $('<tr>');
                                        row.append
                                            (
                                                $('<td>').text(index + 1),
                                                $('<td>').text(role.title),
                                                $('<td>').text(stages),
                                               $('<td>').append($('<a>').text('Delete').addClass('btn btn-danger').attr('href', "{{ url('/stage/first/delete') }}" + "/" + role.id)),
                                            );
                                        tableBody.append(row);
                                    }
                                );
                                rolesTable.append(tableBody);
                            }
                        else
                            {
                                var noRolesRow = $('<tr>').append
                                    (
                                        $('<td>').attr('colspan', '5').addClass
                                            ('text-center text-danger').text('No roles found')
                                    );
                                var tableBody = $('<tbody>').append(noRolesRow);
                                rolesTable.append(tableBody);
                            }
                    },
                error: function(xhr)
                    {console.log(xhr.responseText);}
                    
            });
        });
    });
</script>


