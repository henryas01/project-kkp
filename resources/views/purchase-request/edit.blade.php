<div class="modal fade" id="PrEditModal" tabindex="-1" role="dialog" aria-labelledby="PrEditModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PrEditModal">Insert Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- method="POST" action="{{ route('purchase-request-list.update', urldecode(request('purchase_request_number',
      'PRRM
      0001'))) }}" --}}
      <form method="POST" action="{{ route('purchase-request-list.update', $list->id ) }}">
        @csrf
        <div class="modal-body">

          {{-- <input type="hidden" id="id" name="id" value="{{ $list->id }}" /> --}}

          <div class="form-group">
            <label for="Material" class="col-form-label">Material: </label>
            <select class="form-control" id="Material" placeholder="Input Material" name="material">
              <option value="">-- Select Material --</option>
              @foreach ($material as $item)
              <option value="{{ $item }}" {{ $list->material == $item ? 'selected' : '' }}>{{ $item }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="Kategory" class="col-form-label">Kategory: </label>
            <select class="form-control" id="Kategory" placeholder="Input Kategory" name="kategory"
              value="{{$list->kategory}}">
              <option value="">-- Select Kategory --</option>
              <option value="PrintBased" {{ $list->kategory == 'PrintBased' ? 'selected' : '' }}>Print Based
              </option>
              <option value="LayerBased" {{ $list->kategory == 'LayerBased' ? 'selected' : '' }}>Layer Based
              </option>
            </select>
          </div>

          <div class="form-group">
            <label for="description" class="col-form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" placeholder="Input Description"
              value="{{$list->description}}">{{$list->description}}</textarea>
          </div>

          <div class="form-group">
            <label for="qty" class="col-form-label">Qty:</label>
            <input type="number" class="form-control" id="qty" placeholder="Input Qty" name="qty"
              value="{{$list->qty}}">
          </div>

          <div class="form-group">
            <label for="uom" class="col-form-label">UoM:</label>
            <select class="form-control" id="uom" placeholder="Input UoM" name="uom" value="{{$list->uom}}">
              <option value="">-- Select UoM --</option>

              <option value="meter" {{ $list->uom=='meter' ? 'selected' : '' }}>Meter</option>
              <option value="kg" {{ $list->uom=='kg' ? 'selected' : '' }}>Kilogram</option>
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