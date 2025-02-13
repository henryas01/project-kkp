{{-- Modal --}}
<div class="modal fade editModal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- {{route('master-data', $data->id)}} --}}
      <form method="POST" action="{{ route('master-data.update', $masterData->id) }}">
        <div class="modal-body">

          @csrf
          <div class="form-group">
            <label for="Material" class="col-form-label">Material:</label>
            <input type="text" class="form-control" id="Material" placeholder="Input Material" name="material"
              value="{{$masterData->material}}">
          </div>
          <div class="form-group">
            <label for="Kategory" class="col-form-label">Kategory: </label>
            <select class="form-control" id="Kategory" placeholder="Input Kategory" name="kategory"
              value="{{$masterData->kategory}}">
              <option value="">-- Select Kategory --</option>
              <option value="PrintBased" {{ $masterData->kategory == 'PrintBased' ? 'selected' : '' }}>Print Based
              </option>
              <option value="LayerBased" {{ $masterData->kategory == 'LayerBased' ? 'selected' : '' }}>Layer Based
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="Tebal" class="col-form-label">Tebal:</label>
            <input type="number" class="form-control" id="Tebal" placeholder="Input Tebal" name="tebal"
              value="{{$masterData->tebal}}">
          </div>
          <div class="form-group">
            <label for="Lebar" class="col-form-label">Lebar:</label>
            <input type="number" class="form-control" id="Lebar" placeholder="Input Lebar" name="lebar"
              value="{{$masterData->lebar}}">
          </div>
          <div class="form-group">
            <label for="Berat Jenis" class="col-form-label">Berat Jenis:</label>

            <input type="number" step="any" class="form-control" id="Berat Jenis" placeholder="Input Berat Jenis"
              name="berat_jenis" value="{{$masterData->berat_jenis}}">
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