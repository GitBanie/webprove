@extends('layouts.master')

@section('content')

  <div class="container">
    @if(isset($details))
    {{$details->links()}}
      <div class="row">
          {{-- <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"> --}}
          <div class="col-md-8">
              @forelse ($details as $post)
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
              <p>Aucun stage</p>
              @endforelse
          </div>

          <div class="search col-md-4">
            @include('partials.search')

          </div>
      </div>
      {{$details->links()}}
    @else
      <div class="search col-md-12">
        @include('partials.search')

      </div>
    @endif
  </div>

@endsection
