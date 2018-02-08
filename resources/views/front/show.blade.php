@extends('layouts.master')

@section('content')

  <!-- Page Header -->
  <!-- Set your background image for this header on the line below. -->
  <header class="intro-header" style="background-color:#3097D1;">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  <div class="site-heading">
                      <h1 style="font-size:4rem;">{{$post->title}}</h1>
                  </div>
              </div>
          </div>
      </div>
  </header>

  <div class="container">
      <div class="row">
          <div class="col-md-12">
                <div class="post-preview">
                    <div class="row" style="padding-top:2rem;">
                      @isset($post->picture)

                      <img class="rounded col-md-5" src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}" title="{{$post->picture->title}}">
                    @endisset
                      <p class="col-md-7">{{$post->description}}</p>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <ul class="list-group">
                          <li class="list-group-item"><b>Date de début : </b>{{$post->started_at}}</li>
                          <li class="list-group-item"><b>Date de fin : </b>{{$post->ended_at}}</li>
                          <li class="list-group-item"><b>Prix : </b>{{$post->price}} €</li>
                          <li class="list-group-item"><b>Nombre d'élèves maximum : </b>{{$post->students_max}}</li>
                        </ul>
                      </div>
                    </div>
                </div>
          </div>
      </div>
      <hr>
    </div>

@endsection
