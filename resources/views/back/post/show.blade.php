@extends('back.layouts.master')

@section('content')

  <div class="col-xs-12 col-md-8 col-md-offset-2">
      <div class="panel panel-default">
          <div class="panel-image">
            @if (isset($post->picture))
              <img src="{{asset('images/' . $post->picture->link)}}" class="panel-image-preview" />
            @endif
          </div>
          <div class="panel-body">
              <h4>{{$post->title}}</h4>
              <p>{{$post->description}}.</p>
          </div>
          <div class="panel-footer text-center">
            <ul class="list-group" style="margin-bottom:0;">
              <li class="list-group-item"><b>Date de début : </b>{{$post->started_at}}</li>
              <li class="list-group-item"><b>Date de fin : </b>{{$post->ended_at}}</li>
              <li class="list-group-item"><b>Prix : </b>{{$post->price}} €</li>
              <li class="list-group-item"><b>Nombre d'élèves maximum : </b>{{$post->students_max}}</li>
            </ul>
          </div>
      </div>
  </div>

@endsection
