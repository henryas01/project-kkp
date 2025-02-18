@extends('layouts.layout-home')

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">

  </div>
  <div class="card-body">
    <div class="d-flex flex-row bd-highlight justify-content-between">
      <h4 class="h4 text-gray-800">Report</h4>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          {{-- Previous Page Link --}}
          @if ($data->onFirstPage())
          <li class="page-item disabled"><span class="page-link">Previous</span></li>
          @else
          <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a></li>
          @endif

          {{-- Page Numbers --}}
          @foreach ($data->links()->elements[0] as $page => $url)
          <li class="page-item {{ $data->currentPage() == $page ? 'active' : '' }}">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
          </li>
          @endforeach

          {{-- Next Page Link --}}
          @if ($data->hasMorePages())
          <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a></li>
          @else
          <li class="page-item disabled"><span class="page-link">Next</span></li>
          @endif
        </ul>
      </nav>
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
            <td>
              <span class="text-{{ $report->status ? 'success' : 'primary'}}">{{ $report->status ? 'Released' : 'Open'
                }}</span>
            </td>
            <td>

              {{ $report->updated_at }}</td>
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