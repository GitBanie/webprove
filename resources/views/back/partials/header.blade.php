<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Statistics Overview</small>
        </h1>
        @if(Route::is('post.index'))
        {{ Breadcrumbs::render('dashboard') }}
      @elseif (Route::is('post.create'))
        {{ Breadcrumbs::render('create') }}        
      @else
        {{ Breadcrumbs::render('post', $post) }}
      @endif
    </div>
</div>
<!-- /.row -->
