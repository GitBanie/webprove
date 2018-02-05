@extends('layouts.master')

@section('content')

  <!-- Main Content -->
  <div class="container">
      <div class="row">
          {{-- <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"> --}}
          <div class="col-md-8">
              @forelse ($posts as $post)
                <div class="post-preview">
                  {{-- <img src="" alt="" class="img-thumbnail"> --}}
                    <a href="{{route('show', $post->id)}}">
                        <h2 class="post-title">
                          {{$post->title}}
                        </h2>
                    </a>
                    <div class="row" style="padding-top:2rem;">
                      <img class="rounded col-md-5" src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}" title="{{$post->picture->title}}">
                      <p class="col-md-7">{{$post->description}}</p>
                    </div>
                    <p class="post-meta" style="padding-top:1rem;">Le {{$post->created_at}}</p>
                </div>
                <hr>
              @empty
              <p>Aucun post</p>
              @endforelse

              {{-- <!-- Pager -->
              <ul class="pager">
                  <li class="next">
                      <a href="#">Older Posts &rarr;</a>
                  </li>
              </ul> --}}

          </div>
          
          <div class="search col-md-4">
            @include('partials.search')

          </div>
      </div>
  </div>

  <hr>

@endsection
