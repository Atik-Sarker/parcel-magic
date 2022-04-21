@extends('layouts.master')

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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Total Budget</th>
                                    <th>Daily Budget</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Total Budget</th>
                                    <th>Daily Budget</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @forelse($campaigns as $campaign)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $campaign->name }}</td>
                                    <td>${{ $campaign->total_budget }}</td>
                                    <td>${{ $campaign->daily_budget }}</td>
                                    <td>{{ $campaign->from_date }}</td>
                                    <td>{{ $campaign->to_date }}</td>
                                    <td>[ <a href="{{ route('campaign.show', $campaign->id) }}">view</a> | <a href="{{ route('campaign.edit', $campaign->id) }}">edit</a> | <a href="{{ route('campaign.destroy', $campaign->id) }}">delete</a> ]</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-danger" colspan="6">Data not found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
