@extends('layouts.layout-home')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Purchase Request</h1>




<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

    {{-- ['user', 'material', 'head', 'list', 'signature'] >format('d-M-Y') } --}}


  </div>
  <div class="card-body">
    <div class="d-flex flex-row bd-highlight justify-content-between">
      <h4 class="h4 text-gray-800">PT. Mutiara Hexagon</h4>
      <span class="text-gray-800">{{ \Carbon\Carbon::parse($head->document_date)->format('l, j F
        Y') }}</span>
    </div>
    <div style="width: 40%">

      <table style="margin-top: 10px;border: none;" class=" table-sm " cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td><b>Purchase Request No.</b></td>
            <td colspan="3">
              <input type="text" class="form-control text-primary" name="purchase_request_no"
                value="{{ urldecode(request('purchase_request_number', 'PRRM 0001')) }}"
                onkeyup="if (event.keyCode == 13) { window.location.href = '/purchase-request/' + this.value; }">
            </td>
          </tr>
          <tr>
            <td><b>User ID</b></td>
            <td colspan="3"><span class="text-primary">: {{$user->name}}</span></td>
          </tr>

          <tr>
            <td><b>Document Date</b></td>
            <td colspan="3"><span class="text-primary">: {{ \Carbon\Carbon::parse($head->document_date)->format('l, j F
                Y') }}</span></td>
          </tr>
          <tr>
            <td><b>Status</b></td>
            <td colspan="3"><span class="text-primary">: {{$head->status ? 'Release': 'Open'}}</span></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="d-flex flex-row bd-highlight justify-content-between">
      <div style="cursor: pointer" class="d-flex flex-column align-items-center justify-content-center"
        class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

        @if ($user->role == 'admin' || $user->role == 'atasan')
        <h6 class="m-0 font-weight-bold text-primary">
          <i class="fas fa-plus"></i>
          Insert Data
        </h6>
        @endif
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
          data-whatever="@getbootstrap">Open modal for @getbootstrap</button> --}}
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          {{-- Previous Page Link --}}
          @if ($list->onFirstPage())
          <li class="page-item disabled"><span class="page-link">Previous</span></li>
          @else
          <li class="page-item"><a class="page-link" href="{{ $list->previousPageUrl() }}">Previous</a></li>
          @endif

          {{-- Page Numbers --}}
          @foreach ($list->links()->elements[0] as $page => $url)
          <li class="page-item {{ $list->currentPage() == $page ? 'active' : '' }}">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
          </li>
          @endforeach

          {{-- Next Page Link --}}
          @if ($list->hasMorePages())
          <li class="page-item"><a class="page-link" href="{{ $list->nextPageUrl() }}">Next</a></li>
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
            @if ($user->role == 'admin' || $user->role == 'atasan')
            <td class="action">
              Actions
            </td>
            @endif

          </tr>
        </thead>
        <tbody>
          @foreach ($list as $item)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $item->material }}</td>
            <td>{{ $item->kategory }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->uom }}</td>

            @if ($user->role == 'admin' || $user->role == 'atasan')
            <td class="action" style="width: auto; display: flex; align-items: center;gap: 5px;">
              <a data-url="/purchase-request/list/{{ $item->id }}"
                class="btn btn-outline-info my-2 my-sm-0 PrEditModal"><i class="fas fa-binoculars "
                  data-toggle="PrEditModal" data-target="#PrEditModal"></i>
                Edit</a>{{" |
              "}}

              <form method="post" action="{{route('purchase-request-list.destroy', $item->id)}}">
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


  {{-- @if ($user->role == 'admin' || $user->role == 'atasan') --}}
  {{-- if $user->role admin or atasan --}}

  {{-- Signature --}}
  <div class="container text-center">
    <div class="row">
      <div class="col ">
        Requested by
        <div>
          <div>

            @if(empty($signature->approved_user))
            <br><br><br><br>
            @else
            <img style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/approve-mark.png')}}"
              alt="">
            @endif
            <hr style="border-top: 3px solid rgba(0,0,0,.1" class="sidebar-divider d-none d-md-block">
          </div>

        </div>
      </div>
      @if ($user->role == 'admin' || $user->role == 'atasan')
      <div style="cursor: pointer" class="col" data-toggle="modal" data-target="#ApproveManagerModal">
        @else
        <div class="col">
          @endif
          Approve by Manager
          <div>

            @if(empty($signature->approved_manager))
            <br><br><br><br>
            @else
            <img style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/approve-mark.png')}}"
              alt="">
            @endif
            <hr style="border-top: 3px solid rgba(0,0,0,.1)" class="sidebar-divider d-none d-md-block">
          </div>
        </div>
        <div style="cursor: pointer" class="col" data-toggle="modal" data-target="#ApproveAcknowledgeModal">
          Acknowledge by
          <div>

            @if(empty($signature->acknowledge))
            <br><br><br><br>
            @else
            <img style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/approve-mark.png')}}"
              alt="">
            @endif
            <hr style="border-top: 3px solid rgba(0,0,0,.1" class="sidebar-divider d-none d-md-block">
          </div>
        </div>
      </div>

      <br><br><br><br>
    </div>


    {{-- Modal Insert Data--}}
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
          <form method="POST"
            action="{{ route('purchase-request.store', urldecode(request('purchase_request_number', 'PRRM 0001'))) }}">
            @csrf
            <div class="modal-body">

              <div class="form-group">
                <label for="Material" class="col-form-label">Material:</label>
                <select class="form-control" id="Material" placeholder="Input Material" name="material">
                  <option value="">-- Select Material --</option>
                  @foreach ($material as $item)
                  <option value="{{ $item }}">{{ $item }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="description" class="col-form-label">Description:</label>
                <textarea class="form-control" id="description" name="description"
                  placeholder="Input Description">{{ old('description') }}</textarea>
              </div>

              <div class="form-group">
                <label for="qty" class="col-form-label">Qty:</label>
                <input type="number" class="form-control" id="qty" placeholder="Input Qty" name="qty"
                  value="{{ old('qty') }}">
              </div>

              <div class="form-group">
                <label for="uom" class="col-form-label">UoM:</label>
                <select class="form-control" id="uom" placeholder="Input UoM" name="uom">
                  <option value="">-- Select UoM --</option>
                  <option value="meter" {{ old('uom')=='meter' ? 'selected' : '' }}>Meter</option>
                  <option value="kg" {{ old('uom')=='kg' ? 'selected' : '' }}>Kilogram</option>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>



    {{-- Modal Approve Manager --}}
    <div class="modal fade" id="ApproveManagerModal" tabindex="-1" role="dialog"
      aria-labelledby="ApproveManagerModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="">
          @csrf

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ApproveManagerModalLabel">Signature</h5>
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
        </form>
      </div>
    </div>
  </div>

  {{-- Modal Approve Acknowledge --}}
  <div class="modal fade" id="ApproveAcknowledgeModal" tabindex="-1" role="dialog"
    aria-labelledby="ApproveAcknowledgeModalLebel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ApproveAcknowledgeModalLebel">Signature</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{-- urldecode(request('purchase_request_number', 'PRRM 0001')) --}}
        <form method="POST" action="{{route('purchase-request.signature', urldecode(request('purchase_request_number', 'PRRM 0001'
          ))) }}">
          @csrf
          <input type="hidden" name="acknowledge" value="{{ Auth::user()->name }}">

          <div class="modal-body">
            <div class="d-flex flex-column align-items-center justify-content-center">
              <i style="font-size: 70px; color:#e74a3b" class="fas fa-exclamation-circle "></i>
              <h3 class="h3 mb-2 text-gray-800 mt-3">Are You Sure?</h3>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Approve</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <div class="tampil"></div>

</div>
@endsection
@section('scripts')

<script type="text/javascript">
  $('.PrEditModal').on('click', function () {
        var url = $(this).attr('data-url');
        console.log(url);
        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
              console.log('inin', response);
                $('.tampil').html(response);
                //show model
                $('#PrEditModal').modal('show');

                //close
                $('.close').on('click', function (event) {
                    $('#PrEditModal').modal('hide')
                });
                // affter  hide model run this func
                $('#PrEditModal').on('hidden.bs.modal', function (e) {
                    $('.tampil').empty();
                })

                // affter show run this func
                $('#PrEditModal').on('shown.bs.modal', function (event) {
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