@if(session("mensaje"))
    {{-- <div class="alert alert-{{session('tipo') ? session("tipo") : "info"}}">
        <span class="text-center">{{session('mensaje')}}</span>
    </div> --}}
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{session('mensaje')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif