@extends('back.layouts.master')

@section('content')
<div class="row">
  <div class="col-md-12">
      @include('partials.flash')
      <h2>Posts</h2>
      <div class="add">
        <a class="btn btn-primary" href="{{route('post.create')}}">Ajouter un stage/formation</a>
      </div>
        {{$posts->links()}}
      <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
              <thead>
                  <tr>
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
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->post_type}}</td>
                        <td>{{$post->started_at}} | {{$post->ended_at}}</td>
                        <td>{{$post->status}}</td>
                        <td align="center"><a href="{{route('post.edit', $post->id)}}"><i class="fa fa-edit text-muted"></i></a></td>
                        <td align="center"><a href="{{route('post.show', $post->id)}}"><i class="fa fa-eye"></i></a></td>
                        <td align="center">
                          <form id='my_form' class="delete" action="{{route('post.destroy', $post->id)}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <a class="link_delete" style="cursor:pointer">
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
