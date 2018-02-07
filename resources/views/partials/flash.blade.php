<!-- Message de confirmation de vote -->
@if(Session::has('message'))
    <div class="alert alert-success">
        <strong>
          @if(Session::has('name'))
            {{Session::get('name')}}
          </strong>
          @endif
          {{Session::get('message')}}
    </div>

    {{-- <div class="alert alert-success">
  <strong>Success!</strong> Indicates a successful or positive action.
</div> --}}
@endif
