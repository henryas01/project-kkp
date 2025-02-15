<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
    {{-- <input type="text" class="form-control bg-light border-0 small" placeholder="Search for
 Purchase Request No" aria-label="Search" aria-describedby="basic-addon2"> --}}

    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for
 Purchase Request No" name="purchase-request" aria-label="Search" aria-describedby="basic-addon2" value=""
      onkeyup="if (event.keyCode == 13) { window.location.href = '/purchase-request/' + this.value; }">
    <div class="input-group-append">
      <button class="btn btn-primary" type="button"
        onclick="window.location.href = '/purchase-request/' + document.querySelector('input[name=purchase-request]').value;">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</div>