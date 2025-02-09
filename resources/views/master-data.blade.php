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
        class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

        <h6 class="m-0 font-weight-bold text-primary">
          <i class="fas fa-plus"></i>
          Insert Data
        </h6>
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
          data-whatever="@getbootstrap">Open modal for @getbootstrap</button> --}}
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
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
            <th>Tebal</th>
            <th>Lebar</th>
            <th>Berat Jenis</th>
            <td class="action">
              Actions
            </td>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>PET PLAIN 12 MIC X 1100 MM</td>
            <td>PrintBased</td>
            <td>12</td>
            <td>1100</td>
            <td>1,42</td>
            <td class="action">
              {{-- {{ route('admin.mangement-user-show', $user->id) }} --}}
              <a href="#" class="btn btn-outline-info my-2 my-sm-0 "><i class="fas fa-binoculars"></i> Edit</a>{{" |
              "}}
              <a href="# " class="btn btn-outline-danger my-2 my-sm-0 ajax-popup-link" data-toggle="modal"
                data-target="#popupDelete"><i class="fas fa-trash-alt"></i> Delete</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>CPP PLAIN 20 MIC X 1000 MM</td>
            <td>LayerBased</td>
            <td>20 </td>
            <td>1000</td>
            <td>0,91</td>
            <td class="action">
              {{-- {{ route('admin.mangement-user-show', $user->id) }} --}}
              <a href="#" class="btn btn-outline-info my-2 my-sm-0 "><i class="fas fa-binoculars"></i> Edit</a>{{" |
              "}}
              <a href="# " class="btn btn-outline-danger my-2 my-sm-0 ajax-popup-link" data-toggle="modal"
                data-target="#popupDelete"><i class="fas fa-trash-alt"></i> Delete</a>
            </td>
          </tr>

          <tr>
            <td>3</td>
            <td>NYLON 15 MIC X 750 MM </td>
            <td>PrintBased</td>
            <td>15 </td>
            <td>750</td>
            <td>1,15</td>
            <td class="action">
              {{-- {{ route('admin.mangement-user-show', $user->id) }} --}}
              <a href="#" class="btn btn-outline-info my-2 my-sm-0 "><i class="fas fa-binoculars"></i> Edit</a>{{" |
              "}}
              <a href="# " class="btn btn-outline-danger my-2 my-sm-0 ajax-popup-link" data-toggle="modal"
                data-target="#popupDelete"><i class="fas fa-trash-alt"></i> Delete</a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>


{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="Material" class="col-form-label">Material:</label>
            <input type="text" class="form-control" id="Material" placeholder="Input Material">
          </div>
          <div class="form-group">
            <label for="Kategory" class="col-form-label">Kategory:</label>
            <select class="form-control" id="Kategory">
              <option value="">-- Select Kategory --</option>
              <option value="PrintBased">Print Based</option>
              <option value="LayerBased">Layer Based</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Tebal" class="col-form-label">Tebal:</label>
            <input type="number" class="form-control" id="Tebal">
          </div>
          <div class="form-group">
            <label for="Lebar" class="col-form-label">Lebar:</label>
            <input type="number" class="form-control" id="Lebar">
          </div>
          <div class="form-group">
            <label for="Berat Jenis" class="col-form-label">Berat Jenis:</label>
            <input type="number" class="form-control" id="Berat Jenis">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

@endsection