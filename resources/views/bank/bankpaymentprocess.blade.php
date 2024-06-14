@include('common.header')
@include('common.leftSideBar')
{{-- <style>
    table tr th{
        width: 50%;
    }
    table tr td{
        width: 50%;
    }
</style> --}}
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
                        <h4 class="page-title text-center">Payment Schedule </h4>
                    </div>
                </div>
            </div> 
            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                        <th>Name: {{$salesman->fname}} {{ @$salesman->mname }} {{ $salesman->lname }}</th>
                         <th>Phone: {{$salesman->phone}}</th>
                         <th>Application No.: {{$salesman->uiid}}</th>
                         <th>Address.: {!! Str::limit($salesman->address,20)!!}</th>
                    </tr>
                </thead>
            </table>

 <form  method="POST">
                    @csrf
            <table id="datatable-buttons" class="table table-striped table-bordered text-center">

                <tr>
                    <th>Month</th>
                    <th>Date</th>
                    <th>Principal Amount</th>
                    <th>Monthly Payment</th>
                    <th>Unpaid Balance </th>
                </tr>
               
              @foreach($data as $payment)
                <tr>
                    
                    <td>{{ $payment['month'] }}</td>
                    <td>{{ $payment['date'] }}</td>
                    <td>{{ $payment['beginning'] }}</td>
                    <td>{{ $payment['monthly_payment'] }}</td>
                    <td>{{ $payment['ending_balance'] }}  <span><input class=" " type="checkbox" name="status[]" id="remember" value="1"></span></td>
                </tr>
            @endforeach
           
            </table>
             <center>
                <button type="submit" class="btn btn-primary m-3">Submit</button>
            </center>
            </form>
        </div>
    </div>
</div>
@include('common.footer')