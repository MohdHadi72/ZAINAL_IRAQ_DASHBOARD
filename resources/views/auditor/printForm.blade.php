
@include('common.header')
@include('common.leftSideBar')
<style>
    table tr th{
        width: 50%;
    }
    table tr td{
        width: 50%;
    }
</style>
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
                                <li class="breadcrumb-item"><a href="{{ url('/auditor') }}">Back</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title text-center">Print Form</h4>
                    </div>
                </div>
            </div> 
            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                <thead>
                      <tr>
                        <th>Uiid Generate :</th>
                        <td>{{$data->uiid}}</td>
                    </tr>
                    <tr>
                        <th>First Name :</th>
                        <td>{{$data->fname}}</td>
                    </tr>
                    <tr>
                        <th>Middle Name:</th>
                        <td>{{$data->mname}}</td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td>{{$data->lname}}</td>
                    </tr>
                    <tr>
                        <th>Occupation:</th>
                        <td>{{$data->occupation}}</td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td>{{$data->address}}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{$data->phone}}</td>
                    </tr>
                   
                    <tr>
                        <th>Id Number:</th>
                        <td>{{$data->idNumber}}</td>
                    </tr>
                    <tr>
                        <th>Issue Date:</th>
                        <td>{{$data->issueDate}}</td>

                    </tr>
                   
                    <tr>
                        <th>Total Price:</th>
                        <td>{{$data->price}}</td>
                    </tr>
            
                </thead>
            </table>
            <center>
                <button type="button" class="btn btn-danger m-3" onclick="window.print()">Print Preview</button>
            </center> 
        </div>
    </div>
</div>
@include('common.footer')
