@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Campaigns</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control form-control-user" id="name" aria-describedby="name" placeholder="campaign name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fdate">Form Date</label>
                                <input type="date" name="fdate" class="form-control form-control-user" id="fdate" aria-describedby="fdate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tdate">To Date</label>
                                <input type="date" name="tdate" class="form-control form-control-user" id="tdate" aria-describedby="tdate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="total_budget">Total Budget</label>
                                <input type="text" name="total_budget" class="form-control form-control-user" id="total_budget" aria-describedby="fdate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="daily_budget">Daily Budget</label>
                                <input type="text" name="daily_budget" class="form-control form-control-user" id="daily_budget" aria-describedby="daily_budget">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="banner">Banner Image</label>
                                <input type="file" name="banner" class="form-control form-control-user" id="banner" aria-describedby="banner" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
