@extends('layouts.layout-home')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Master Data</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

  </div>
  <div class="card-body">
    <div class="d-flex flex-row bd-highlight justify-content-between">

      <div style="cursor: pointer" class="d-flex flex-column align-items-center justify-content-center"
        class="btn btn-primary" data-toggle="modal" data-target="#insertModal">

        @if ($user->role == 'admin' || $user->role == 'atasan')
        <h6 class="m-0 font-weight-bold text-primary">
          <i class="fas fa-plus"></i>
          Insert Data
        </h6>
        @endif
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          {{-- Previous Page Link --}}
          @if ($masterData->onFirstPage())
          <li class="page-item disabled"><span class="page-link">Previous</span></li>
          @else
          <li class="page-item"><a class="page-link" href="{{ $masterData->previousPageUrl() }}">Previous</a></li>
          @endif

          {{-- Page Numbers --}}
          @foreach ($masterData->links()->elements[0] as $page => $url)
          <li class="page-item {{ $masterData->currentPage() == $page ? 'active' : '' }}">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
          </li>
          @endforeach

          {{-- Next Page Link --}}
          @if ($masterData->hasMorePages())
          <li class="page-item"><a class="page-link" href="{{ $masterData->nextPageUrl() }}">Next</a></li>
          @else
          <li class="page-item disabled"><span class="page-link">Next</span></li>
          @endif
        </ul>
      </nav>
      {{-- {{ $masterData->links('pagination::bootstrap-5') }} --}}
    </div>


    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No ID</th>
            <th>Material</th>
            <th>Kategory</th>
            <th>Tebal</th>
            <th>Lebar</th>
            <th>Berat Jenis</th>
            @if ($user->role == 'admin' || $user->role == 'atasan')
            <td class="action">
              Actions
            </td>
            @endif

          </tr>
        </thead>
        <tbody>
          @foreach ($masterData as $key => $data)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $data->material }}</td>
            <td>{{ $data->kategory }}</td>
            <td>{{ $data->tebal }}</td>
            <td>{{ $data->lebar }}</td>
            <td>{{ $data->berat_jenis }}</td>
            @if ($user->role == 'admin' || $user->role == 'atasan')
            <td class="action" style="width: auto; display: flex; align-items: center;gap: 5px;">
              <a data-url="/master-data/{{ $data->id }}" class="btn btn-outline-info my-2 my-sm-0 editModal"><i
                  class="fas fa-binoculars " data-toggle="editModal" data-target="#editModal"></i>
                Edit</a>{{"
              |
              "}}


              <form method="post" action="{{route('master-data.destroy', $data->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger my-2 my-sm-0 "><i class="fas fa-trash-alt"></i>
                  Delete</button>
              </form>


            </td>
            @endif
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>


{{-- Modal --}}
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertModalLabel">Insert Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('master-data.store') }}">
          @csrf
          <div class="form-group">
            <label for="Material" class="col-form-label">Material:</label>
            <input type="text" class="form-control" id="Material" placeholder="Input Material" name="material"
              :value="old('material')">
          </div>
          <div class="form-group">
            <label for="Kategory" class="col-form-label">Kategory:</label>
            <select class="form-control" id="Kategory" placeholder="Input Kategory" name="kategory"
              :value="old('kategory')">
              <option value="">-- Select Kategory --</option>
              <option value="PrintBased">Print Based</option>
              <option value="LayerBased">Layer Based</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Tebal" class="col-form-label">Tebal:</label>
            <input type="number" class="form-control" id="Tebal" placeholder="Input Tebal" name="tebal"
              :value="old('tebal')">
          </div>
          <div class="form-group">
            <label for="Lebar" class="col-form-label">Lebar:</label>
            <input type="number" class="form-control" id="Lebar" placeholder="Input Lebar" name="lebar"
              :value="old('lebar')">
          </div>
          <div class="form-group">
            <label for="Berat Jenis" class="col-form-label">Berat Jenis:</label>

            <input type="number" step="any" class="form-control" id="Berat Jenis" placeholder="Input Berat Jenis"
              name="berat_jenis" :value="old('berat_jenis')">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="tampil"></div>
@endsection

@section('scripts')

<script type="text/javascript">
  $('.editModal').on('click', function () {
        var url = $(this).attr('data-url');
        console.log(url);
        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
              console.log('inin', response);
                $('.tampil').html(response);
                //show model
                $('#editModal').modal('show');

                //close
                $('.close').on('click', function (event) {
                    $('#editModal').modal('hide')
                });
                // affter  hide model run this func
                $('#editModal').on('hidden.bs.modal', function (e) {
                    $('.tampil').empty();
                })

                // affter show run this func
                $('#editModal').on('shown.bs.modal', function (event) {
                    // console.log('hay')
                })

            },
            complete: function (response) {},
            error: function (jqXHR, textStatus, errorThrown) {
                alert('error')
            }
        });
    })

</script>


@endsection