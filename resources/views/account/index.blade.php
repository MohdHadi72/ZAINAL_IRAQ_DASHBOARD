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
                                <li class="breadcrumb-item"><a href="{{ Route('account.index') }}">Back</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Account Management</h4>
                    </div>
                </div>
            </div>
            
            <table id="datatable-buttons" class="table table-striped table-bordered   ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Generate UID</th>
                        <th>Downpayment Slip Preview</th>
                        <th >Print Payment Installment Schedule</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->fname }}</td>
                            <td>{{ $item->uiid }}</td>
                            <td> <a href="{{url('/accountant/downpayment/slip/'.$item->id)}}" class="badge badge-success text-center">downpayment Slip Preview</a></td>
                            <td style="display:flex;align-items:center;justify-content:center;">
                                <a href="{{ url('/accountant/payment-installment/'.$item->id) }}" class="btn btn-sm btn-danger text-center"> 
                                <i class="fas fa-print "></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- {!! $data->render() !!} --}}
{{-- @endsection --}}
@include('common.footer')
