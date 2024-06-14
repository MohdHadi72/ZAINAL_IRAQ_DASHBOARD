@include('common.header')
@include('common.leftSideBar')
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>
<!-- Begin page -->
<div id="wrapper">

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            @include('common.topbar')
            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="btn-group float-right">
                                    <ol class="breadcrumb hide-phone p-0 m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                                        <li class="breadcrumb-item active"><a
                                                href="{{ url('docs-view') }}">Document-View</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Document</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <!-- start Basic info  -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Document Info</h4>
                                    @if (session('status'))
                                        <div class="alert alert-primary mb-1 mt-1">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                   
                                    <form id="documentForm" action="#" method="get">
                                        @csrf
                                        <div class="row">
                                            <div class="container col-xl-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Select Document<span style="color: red">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select" name="document" id="document" placeholder="Select Document" required>
                                                            <option value="">Select Document</option>
                                                            <option value="stageFirst" {{ old('document') == 'stageFirst' ? 'selected' : '' }}>Stage First</option>
                                                            <option value="stageSecond" {{ old('document') == 'stageSecond' ? 'selected' : '' }}>Stage Second</option>
                                                            <option value="stageThird" {{ old('document') == 'stageThird' ? 'selected' : '' }}>Stage Third</option>
                                                        </select>
                                                        @error('document')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <center>
                                            <div>
                                                <button type="button" class="btn btn-primary" onclick="redirect()">Submit</button>
                                            </div>
                                        </center>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Basic info -->
                </div>

            </div><!-- Page content Wrapper -->

        </div><!-- content -->
    </div>
</div>
@include('common.footer')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function redirect() {
        var selectedProject = $('#document').val();
        if (selectedProject === 'stageFirst') {
            window.location.href = "{{ url('/stage-first') }}";
        } else if (selectedProject === 'stageSecond') {
            window.location.href = "{{ url('/stage-second') }}";
        } else if (selectedProject === 'stageThird') {
            window.location.href = "{{ url('/stage-third') }}";
        }
    }
</script>


