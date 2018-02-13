@extends('back.layouts.master')

@section('content')
<div class="row">
  <div class="col-md-12">
      @include('partials.flash')
      <h2>Posts</h2>
      <div class="add row">
        <div class="col-md-6">
          <a class="btn btn-primary" href="{{route('post.create')}}">Ajouter un stage/formation</a>
        </div>
      </div>
      <div class="row options">
        @if ($posts->total() > 10)
        <div class="col-md-2 option_link">
          {{$posts->links()}}
        </div>
        @endif
        <div class="col-md-2 option">
          <form class="deleteGroup" action="{{route('del')}}" method="post">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
        </div>
      <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
              <thead>
                  <tr>
                      <th><label><input type="checkbox" id="checkAll"/></label></th>
                      <th>Titre</th>
                      <th>Type</th>
                      <th>Dates</th>
                      <th>Status</th>
                      <th>Edition</th>
                      <th>Show</th>
                      <th>Delete</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($posts as $post)
                    <tr class="item{{$post->id}}" >
                        <td><input type="checkbox" name="deletes[]" value="{{$post->id}}" /></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->post_type}}</td>
                        <td>{{$post->started_at}} | {{$post->ended_at}}</td>
                        <td>{{$post->status}}</td>
                        <td align="center"><a href="{{route('post.edit', $post->id)}}"><i class="fa fa-edit text-muted"></i></a></td>
                        <td align="center"><a href="{{route('post.show', $post->id)}}"><i class="fa fa-eye"></i></a></td>
                        <td align="center">
                            <a class="link_delete" style="cursor:pointer" data-id="{{ $post->id }}"
                              data-token="{{ csrf_token() }}">
                            <i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                  @empty
                    <p>Aucun Post</p>
                  @endforelse
              </tbody>
          </table>
          {{$posts->links()}}
      </div>
  </div>
</div>

@endsection
