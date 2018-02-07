@extends('layouts.master')

@section('content')

  <!-- Main Content -->
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <p>Voulez-vous entrer en contact avec moi? Remplissez le formulaire ci-dessous pour m'envoyer un message et je vais essayer de vous répondre dans les 24 heures</p>
              @include('partials.flash')
              <form action="{{route('contactAdmin')}}" method="post" name="sentMessage" id="contactForm">
                {{csrf_field()}}
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name." value="{{old('name')}}">
                          <p class="help-block text-danger"></p>
                          @if($errors->has('name'))
                            <p class="help-block text-danger">{{$errors->first('name')}}</p>
                          @endif
                      </div>
                  </div>
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Email Address</label>
                          <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address." value="{{old('email')}}">
                          <p class="help-block text-danger"></p>
                          @if($errors->has('email'))
                            <p class="help-block text-danger">{{$errors->first('email')}}</p>
                          @endif
                      </div>
                  </div>
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Message</label>
                          <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message." name="message" >{{old('message')}}</textarea>
                          <p class="help-block text-danger"></p>
                          @if($errors->has('message'))
                            <p class="help-block text-danger">{{$errors->first('message')}}</p>
                          @endif
                      </div>
                  </div>
                  <br>
                  <div id="success"></div>
                  <div class="row">
                      <div class="form-group col-xs-12">
                          <button type="submit" class="btn btn-default">Send</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>

@endsection
