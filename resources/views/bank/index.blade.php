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
                                <li class="breadcrumb-item"><a href="{{ url('/auditor') }}">Bank List</a></li>
                            </ol>
                        </div>
                        @if (session('status'))
                          <div class="alert alert-danger text-center ">{{ session('status') }}</div>
                        @endif
                        <h4 class="page-title">Bank Management</h4>
                        <div class="input-group mt-2 col-xl-4 m-auto">
                            <label for="application_number">Enter Application Number</label>
                            <form action="{{ url('/searchproduct') }}" method="POST" role="search" class="input-group ">
                                @csrf
                            
                            <input type="text" name="search" id="search_product" class="form-control phone" placeholder="Search..." maxlength="10" required>
                            <span class="input-group-prepend">
                                <button type="submit" id="search-results" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </span>
                            
                        </div>
                    </div>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered   ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Recive Notification for Payment</th>
                        <th>Types the Amount that paid.</th>
                        <th>Confirms Payment</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                    {{-- @foreach ($data as $key => $Audit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $Audit->fname }}</td>
                            <td>{{ $Audit->lname }}</td>
                            <td>{{ $Audit->idType }}</td>
                            <td>{{ $Audit->idNumber }}</td>
                            <td>{{ $Audit->issueDate }}</td>
                            <td>{{ $Audit->phone }}</td>
                            <td>{{ $Audit->totalPrice }}{{" $"}}</td>
                            <td>{{ $Audit->docs }}</td>
                            <td>
                                <a href="{{ url('auditor/print-form/'.$Audit->id) }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-file-pdf-o "></i></a>
                            </td>
                            
                            <td>
                                <a href="" class="btn btn-sm btn-success">
                                <i class="fas fa-print "></i></a>
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary">
                                <i class="fas fa-id-card "></i></a>
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit "></i></a>
                                <a href="" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('common.footer')
<script>
    $(function() {
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function(response) {
                startAutoComplete(response)
            }
        });

        function startAutoComplete(availableTags) {
            $("#search_product").autocomplete({
                source: availableTags
            });
        }
    });
</script>
