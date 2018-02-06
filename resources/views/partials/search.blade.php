<form action="{{route('search')}}" method="post" @if(Route::is('search') == true && !isset($details)) @else class="navbar-form navbar-left" @endif role="search">
  {{ csrf_field() }}
  <div @if(Route::is('search') == true && !isset($details)) class="form-group col-md-11" @else class="form-group"  @endif>
    <input type="text" name="search" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-default" style="padding: 6px 12px;">Submit</button>
</form>
