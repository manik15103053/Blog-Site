@if(Session::get('msg'))
    <div class="alert alert-success">
        {{session::get('msg')}}
    </div>
@endif
