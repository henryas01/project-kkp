@if(session('Success'))
<div class="alert alert alert-success alert-dismissible fade show mt-3 border-0 rounded-0 shadow" role="alert">
    <strong>Succes </strong>{{session('Success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@if(session('Error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error </strong>{{session('Error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif