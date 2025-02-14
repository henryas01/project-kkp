@if(session('Success') || session('Error'))
<div class="alert {{ session('Success') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show mt-3 border-0 rounded-0 shadow"
    role="alert">
    <strong>{{ session('Success') ? 'Success' : 'Error' }} </strong>{{ session('Success') ?? session('Error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<script>
    function fadeAlert() {
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    }
    setTimeout(fadeAlert, 1000);
</script>
@endif