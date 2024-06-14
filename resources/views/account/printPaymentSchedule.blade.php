
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
                                <li class="breadcrumb-item"><a href="{{ url('/auditor') }}">Back</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title text-center">Print Payment Installment Schedule </h4>
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
                    <tr>
                        <form  method="POST"  id="paymentScheduleForm">
                            @csrf
                            <th>
                            <div class="form-group row"><label for="current_date"class="col-sm-4 col-form-label">From Date <span style="color: red">*</span></label><div class="col-sm-10"><input class="form-control" type="date"name="current_date" value="{{ old('current_date') }}" id="current_date"
                                required></div>
                            </div>
                         </th>
                        <th>
                            <div class="form-group row"><label for="input_date"class="col-sm-10 col-form-label">To Date<span style="color: red">*</span></label><div class="col-sm-10"><input class="form-control" type="date"name="input_date" value="{{ old('input_date') }}" id="input_date"
                                required></div>
                            </div>
                            <th> <button type="submit">Calculate Payment Schedule</button></th>
                         </th>
                          
                         </form>
                    </tr>
                </thead>
            </table>

            <table id="datatable-buttons" class="table table-striped table-bordered text-center">

                <tr>
                    <th>Month</th>
                    <th>Date</th>
                    <th>Principal Amount</th>
                    <th>Monthly Payment</th>
                    <th>Unpaid Balance</th>
                </tr>
               @foreach($data as $payment)
                <tr>
                    <td>{{ $payment['month'] }}</td>
                    <td>{{ $payment['date'] }}</td>
                    <td>{{ $payment['beginning'] }}</td>
                    <td>{{ $payment['monthly_payment'] }}</td>
                    <td>{{ $payment['ending_balance'] }}</td>
                </tr>
            @endforeach
            </table>
            <center>
                <button type="button" class="btn btn-danger m-3" onclick="window.print()">Print Preview</button>
            </center> 
        </div>
    </div>
</div>

@include('common.footer')
