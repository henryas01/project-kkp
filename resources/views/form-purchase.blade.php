@extends('layouts.layout-home')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Purchase Request</h1>




<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

  </div>
  <div class="card-body">
    <div class="d-flex flex-row bd-highlight justify-content-between">
      <h4 class="h4 text-gray-800">PT. Mutiara Hexagon</h4>
      <span class=" text-gray-800">Sunday, February 09, 2025</span>
    </div>
    <div style="width: 40%">

      <table style="margin-top: 10px;border: none;" class=" table-sm " cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td><b>Purchase Request No.</b></td>
            <td colspan="3"><span class="text-primary">: PRRM 0001</span></td>
          </tr>
          <tr>
            <td><b>User ID</b></td>
            <td colspan="3"><span class="text-primary">: Budiharto</span></td>
          </tr>

          <tr>
            <td><b>Document Date</b></td>
            <td colspan="3"><span class="text-primary">: 09-Feb-25</span></td>
          </tr>
          <tr>
            <td><b>Status</b></td>
            <td colspan="3"><span class="text-primary">: Open</span></td>
          </tr>
        </tbody>
      </table>
    </div>
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
            <th>Description</th>
            <th>Qty</th>
            <th>UoM</th>
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
            <td>Energen</td>
            <td>15</td>
            <td>kg</td>
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
            <td>Inner Kis BM </td>
            <td>20</td>
            <td>kg</td>
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
            <td>Inner coki coki </td>
            <td>10</td>
            <td>kg</td>
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

  <div class="container text-center">
    <div class="row">
      <div class="col ">
        Requested by
        <div>
          <div>

            <img style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/approve-mark.png')}}"
              alt="">
          </div>
          <hr style="border-top: 3px solid rgba(0,0,0,.1" class="sidebar-divider d-none d-md-block">
        </div>
      </div>
      <div style="cursor: pointer" class="col" data-toggle="modal" data-target="#ApproveManagerModal">
        Approve by Manager
        <div>

          <img style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/approve-mark.png')}}" alt="">
          <hr style="border-top: 3px solid rgba(0,0,0,.1)" class="sidebar-divider d-none d-md-block">
        </div>
      </div>
      <div style="cursor: pointer" class="col">
        Acknowledge by
        <div>

          <br><br><br><br>
          <hr style="border-top: 3px solid rgba(0,0,0,.1" class="sidebar-divider d-none d-md-block">
        </div>
      </div>
    </div>

    <br><br><br><br>
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
              <select class="form-control" id="Material" placeholder="Input Material">
                <option value="">-- Select Material --</option>
                <option value="PrintBased">CPP PLAIN 20 MIC X 1000 MM</option>
                <option value="LayerBased">PET PLAIN 12 MIC X 1100 MM</option>
                <option value="LayerBased">NYLON 15 MIC X 750 MM</option>
              </select>
            </div>

            <div class="form-group">
              <label for="description" class="col-form-label">Description:</label>
              <textarea class="form-control" id="description" placeholder="Input Description"></textarea>
            </div>
          </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>



  {{-- Modal Approve Manager --}}
  <div class="modal fade" id="ApproveManagerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Signature</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="d-flex flex-column align-items-center justify-content-center">
            <i style="font-size: 70px; color:#e74a3b" class="fas fa-exclamation-circle "></i>
            <h3 class="h3 mb-2 text-gray-800 mt-3">Are You Sure?</h3>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Approve</button>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')

@endsection