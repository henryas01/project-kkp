@extends('layouts.layout-home')

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">

  </div>
  <div class="card-body">
    <div class="d-flex flex-row bd-highlight justify-content-between">
      <h4 class="h4 text-gray-800">Report</h4>
    </div>


    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>

            <th>No ID</th>
            <th>Material</th>
            <th>Kategory</th>
            <th>Description</th>
            <th>Qty</th>
            <th>UoM</th>
            <td>
              Status
            </td>
            <td>Date
            </td>

          </tr>
        </thead>
        <tbody>
          @foreach ($data as $report)
          <tr>
            <td>{{ $report->id }}</td>
            <td>{{ $report->material }}</td>
            <td>{{ $report->kategory }}</td>
            <td>{{ $report->description }}</td>
            <td>{{ $report->qty }}</td>
            <td>{{ $report->uom }}</td>
            <td>{{ $report->status }}</td>
            <td>{{ $report->updated_at }}</td>
          </tr>
          @endforeach

          {{-- <tr>
            <td>2</td>
            <td>CPP PLAIN 20 MIC X 1000 MM</td>
            <td>LayerBased</td>
            <td>Inner Kis BM </td>
            <td>20</td>
            <td>kg</td>
            <td> Released
            </td>
            <td>8-Feb-25</td>
          </tr> --}}



        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/chart.js')}}"></script>
@endsection