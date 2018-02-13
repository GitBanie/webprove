<!-- Message de confirmation de vote -->
@if(Session::has('message'))
    <div class="alert alert-success">

          @if(Session::has('name'))
            {{Session::get('name')}}
          @endif
          {{Session::get('message')}}
    </div>
@endif
