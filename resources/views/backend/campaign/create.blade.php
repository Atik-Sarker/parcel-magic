@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Campaigns</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <form action="{{ route('campaign.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" aria-describedby="name" placeholder="campaign name">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="from_date">Form Date</label>
                                    <input type="date" name="from_date" class="form-control form-control-user @error('from_date') is-invalid @enderror" id="from_date" aria-describedby="from_date">
                                </div>
                                @error('from_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="to_date">To Date</label>
                                    <input type="date" name="to_date" class="form-control form-control-user @error('to_date') is-invalid @enderror" id="to_date" aria-describedby="to_date">
                                </div>
                                @error('to_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="total_budget">Total Budget</label>
                                    <input type="text" name="total_budget" class="form-control form-control-user @error('total_budget') is-invalid @enderror" id="total_budget" aria-describedby="fdate">
                                </div>
                                @error('total_budget')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="daily_budget">Daily Budget</label>
                                    <input type="text" name="daily_budget" class="form-control form-control-user @error('daily_budget') is-invalid @enderror" id="daily_budget" aria-describedby="daily_budget">
                                </div>
                                @error('daily_budget')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="banner">Banner Image</label>
                                    <input type="file" name="banner[]" class="form-control form-control-user @error('banner') is-invalid @enderror" id="banner" aria-describedby="banner" multiple>
                                </div>

                                @error('banner[]')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                =================
                               

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger">{{ $error }}</div>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary shadow-sm" style="width: 200px;">
                                    Create
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection