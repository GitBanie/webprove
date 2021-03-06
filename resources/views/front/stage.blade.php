@extends('layouts.master')

@section('content')


  <!-- Main Content -->
  <div class="container">
    {{$stages->links()}}
      <div class="row">
          {{-- <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"> --}}
          <div class="col-md-8">
              @forelse ($stages as $stage)
                <div class="post-preview">
                  {{-- <img src="" alt="" class="img-thumbnail"> --}}
                    <a href="{{route('show', $stage->id)}}">
                        <h2 class="post-title">
                          {{$stage->title}}
                        </h2>
                    </a>
                    <div class="row" style="padding-top:2rem;">
                      @isset($stage->picture)

                      <img class="rounded col-md-5" src="{{asset('images/'.$stage->picture->link)}}" alt="{{$stage->picture->title}}" title="{{$stage->picture->title}}">
                      @endisset
                      <p class="col-md-7">{{$stage->description}}</p>
                    </div>
                    <p class="post-meta" style="padding-top:1rem;">Le {{$stage->created_at}}</p>
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
      {{$stages->links()}}
  </div>

@endsection
