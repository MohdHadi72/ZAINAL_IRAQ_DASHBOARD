@include('common.header')
@include('common.leftSideBar')
{{-- <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .total {
        font-weight: bold;
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
                                <li class="breadcrumb-item"><a href="{{ Route('account.index') }}">Back</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Payment Invoice</h4>
                    </div>
                </div>
            </div>

<div class="row">
    {{-- <p class="col-sm-10 p-3"><strong>Customer Name:</strong> {{ $invoice['invoice_number'] }}</p> --}}
    <div class="col-sm-6 p-3">
        <p><strong>Customer Name:</strong> {{ $invoice['invoice_number'] }}</p>
        <p><strong>Mobile Number:</strong> {{ $invoice['date'] }}</p>
        <p><strong>Zone:</strong> {{ $invoice['due_date'] }}</p>
        <p><strong>Down Payment:</strong> {{ $invoice['due_date'] }}</p>
        <p><strong>Price After Add On:</strong> {{ $invoice['customer_name'] }}</p>
        <p><strong>EMI Period Every X Month</strong> {{ $invoice['customer_address'] }}</p>
    </div>

    <div class="col-sm-6 mt-0 mx-auto d-block">
        <p><strong>Category:</strong> {{ $invoice['invoice_number'] }}</p>
        <p><strong>House Number:</strong> {{ $invoice['date'] }}</p>
        <p><strong>House Price:</strong> {{ $invoice['due_date'] }}</p>
        <p><strong>Down Payment :</strong> {{ $invoice['customer_name'] }}</p>
        <p><strong>Total Time Period</strong> {{ $invoice['customer_address'] }}</p>
    </div>
</div>

    <table id="datatable-buttons" class="table table-striped table-bordered   ">
        <thead>
            <tr>
                <th>#</th>
                <th>Remaining Amt</th>
                <th>Paid Amt.USD</th>
                <th>Paid Amt.IQD</th>
                <th>EMI Amount</th>
                <th>Way Of Payment</th>
                <th>Date</th>
                <th>Payment</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->fname }}</td>
                    <td>{{ $item->uiid }}</td>
                    <td> <a href="{{url('/accountant/downpayment/slip/'.$item->id)}}" class="badge badge-success text-center">downpayment Slip Preview</a></td>
                    <td >
                        <a href="{{url('/accountant/generate/invoice/'.$item->id)}}" class="btn btn-sm btn-danger">Payment Invoice
                            <i class="fas fa-file-pdf-o btn-danger"></i></a>
                    </td>

                </tr>
            @endforeach --}}
        </tbody>
    </table>
    <center class="p-3">
        <div>
            <button type="button" class="btn btn-danger" onclick="window.print()">Print-Slip</button>
        </div>
    </center>
    @include('common.footer')
