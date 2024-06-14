@include('common.header')
@include('common.leftSideBar')
<style>
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .header {
        text-align: center;
    }

    .payment-details {
        margin-top: 20px;
    }

    .footer {
        margin-top: 20px;
        text-align: center;
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
                                <li class="breadcrumb-item"><a href="{{ Route('account.index') }}">Back</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Down Payment Slip</h4>
                        {{-- <a href="{{ url('auditor/create') }}" class="btn btn-primary mt-3">Create New Account</a> --}}
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="header">
                    <h2>Down Payment Slip</h2>
                </div>

                <div class="payment-details">
                    <p><strong>Date:</strong> {{ $data->created_at->format('d-m-y') }}</p>

                    <p><strong>Payer Information:</strong><br>
                        <strong>Name:</strong> {{ $data->fname }}<br>
                        <strong>Address:</strong> {{ $data->address }}<br>
                        <strong>Contact Number:</strong> {{ $data->phone }}<br>
                    </p>

                    <p><strong>Salesman Information:</strong><br>
                        <strong>Name:</strong> {{$data->salesman}}<br>
                        <!--<strong>Address:</strong> [Recipient's Address]<br>-->
                        <!--<strong>Contact Number:</strong> [Recipient's Phone Number]<br>-->
                    </p>

                    <p><strong>Payment Details:</strong><br>
                        <strong>Total Amount:</strong> {{$data->price}}<br>
                        <strong>Payment Method:</strong> [Cash / Check / Bank Transfer / Other]<br>
                        <strong>Payment Reference/Check Number:</strong> [Reference or Check Number]<br>
                        <strong>Date of Payment:</strong> [Payment Date]
                    </p>
                </div>

            </div>
            <center class="p-3">
                <div>
                    <button type="button" class="btn btn-danger" onclick="window.print()">Print-Slip</button>
                </div>
            </center>
        </div>
    </div>
</div>
@include('common.footer')
