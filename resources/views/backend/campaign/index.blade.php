@extends('layouts.master')

@push('style')
    <style>
        .col-lg-12.banner img {
            height: 250px;
            width: 200px;
            object-fit: scale-down;
        }
    </style>
@endpush


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
                                    <td>[ <a href="{{ route('campaign.show', $campaign->id) }}" id="view">view</a> | 
                                    <a href="{{ route('campaign.edit', $campaign->id) }}">edit</a> | 
                                    <a href="#" onclick='event.preventDefault();
                                                     document.getElementById("delete-form-{{$campaign->id}}").submit();'>delete</a>  ]


                                    <form id="delete-form-{{$campaign->id}}" action="{{ route('campaign.destroy', $campaign->id) }}" method="POST" class="d-none">
                                        @method("DELETE")
                                        @csrf
                                    </form>
                                </td>
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


@push('script')

<script>

    let view = document.getElementById('view')

    view.onclick = function(e){

        e.preventDefault();
        
        let url = $(this).attr('href');
        console.log(url);
        $.ajax({
            type: 'GET',
            url: url,
            success: function (response) {
                console.log(response);
                console.log(response.html);
                $("#body").html(response.html);
                // $('#modal-body').html(response.data);
                $('#modal-title').text('Campaign Details');
                $('#CampaignModal').modal('show');
            }

        })


    }

        // $('#profile').click(function (e) {
            
        // }); //show profile

</script>

@endpush
