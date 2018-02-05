@extends('layouts.master')

@section('content')

  <!-- Main Content -->
  <div class="container">
    {{$formations->links()}}
      <div class="row">
          {{-- <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"> --}}
          <div class="col-md-8">
              @forelse ($formations as $formation)
                <div class="post-preview">
                  {{-- <img src="" alt="" class="img-thumbnail"> --}}
                    <a href="{{route('show', $formation->id)}}">
                        <h2 class="post-title">
                          {{$formation->title}}
                        </h2>
                    </a>
                    <div class="row" style="padding-top:2rem;">
                      <img class="rounded col-md-5" src="{{asset('images/'.$formation->picture->link)}}" alt="{{$formation->picture->title}}" title="{{$formation->picture->title}}">
                      <p class="col-md-7">{{$formation->description}}</p>
                    </div>
                    <p class="post-meta" style="padding-top:1rem;">Le {{$formation->created_at}}</p>
                </div>
                <hr>
              @empty
              <p>Aucun stage</p>
              @endforelse
          </div>

          <div class="search col-md-4">
            @include('partials.search')

          </div>
      </div>
      {{$formations->links()}}
  </div>

@endsection
