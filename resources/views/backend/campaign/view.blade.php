<div class="col-lg-12">
    <table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ $campaign->name }}</td>
    </tr>
    <tr>
        <th>Form Date</th>
        <td>{{ $campaign->from_date }}</td>
    </tr>
    <tr>
        <th>To Date</th>
        <td>{{ $campaign->to_date }}</td>
    </tr>
    <tr>
        <th>Total Budget</th>
        <td>${{ $campaign->total_budget }}</td>
    </tr>
    <tr>
        <th>Daily Budget</th>
        <td>${{ $campaign->daily_budget }}</td>
    </tr>
    </table>
</div>
<div class="col-lg-12 banner">
    @if($campaign->banner)
        @foreach(explode('|',$campaign->banner) as $banner)
        <img src="{{ asset('storage') }}/{{ $banner }}" alt="">
        @endforeach
    @endif
</div>