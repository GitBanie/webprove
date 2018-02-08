@extends('back.layouts.master')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-9 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">New Post</div>

                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}

                          {{-- Titre --}}
                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              <label for="title" class="col-md-4 control-label">Titre</label>

                              <div class="col-md-6">
                                  <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}" required>

                                  @if ($errors->has('title'))
                                      <span class="help-block text-center">
                                          <strong>{{ $errors->first('title') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Type --}}
                          <div class="form-group{{ $errors->has('post_type') ? ' has-error' : '' }}">
                              <label for="post_type" class="col-md-4 control-label">Type</label>

                              <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="post_type" id="optionsRadiosInline1" value="stage" @if(old('post_type') == 'stage') checked @endif> Stage
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="post_type" id="optionsRadiosInline2" value="formation" @if(old('post_type') == 'formation') checked @endif> Formation
                                </label>

                                  @if ($errors->has('status'))
                                      <span class="help-block text-center">
                                          <strong>{{ $errors->first('status') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Categorie --}}
                          <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                              <label for="category_id" class="col-md-4 control-label">Catégorie</label>
                              <div class="col-md-6">
                                <select name="category_id" class="form-control" id="category">
                                  @forelse($categories as $key => $value)
                                  @if (Input::old('category_id') == $key)
                                  <option value="{{ $key }}" selected>{{ ucfirst($value) }}</option>
                                  @else
                                  <option value="{{$key}}" >{{ucfirst($value)}}</option>
                                  @endif
                                  @empty
                                  <p>Aucune catégorie</p>
                                  @endforelse
                                </select>

                                  @if ($errors->has('category_id'))
                                      <span class="help-block text-center">
                                          <strong>{{ $errors->first('category_id') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Description --}}
                          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                              <label for="description" class="col-md-4 control-label">Description</label>

                              <div class="col-md-6">
                                  <textarea name="description" class="form-control" rows="2">{{old('description')}}</textarea>
                                  @if ($errors->has('description'))
                                      <span class="help-block text-center">
                                          <strong>{{ $errors->first('description') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Date de début --}}
                          <div class="form-group">
                              <label for="started_at" class="col-md-4 control-label">Date de début</label>
                              <div class="input-group date form_datetime col-md-6" data-date="2018-01-1T00:00:00Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="started_at" style="padding:0 15px 0 15px;">
                                  <input class="form-control" size="16" type="text" value="{{old('started_at')}}" readonly style="background-color:#fff" name="started_at">
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-remove"></span>
                                  </span>
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                  </span>
                              </div>

                            @if ($errors->has('started_at'))
                                <span class="help-block text-center">
                                    <strong>{{ $errors->first('started_at') }}</strong>
                                </span>
                            @endif
                          </div>

                          {{-- Date de fin --}}
                          <div class="form-group">
                              <label for="ended_at" class="col-md-4 control-label">Date de fin</label>
                              <div class="input-group date form_datetime col-md-6" data-date="2018-01-1T00:00:00Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="ended_at" style="padding:0 15px 0 15px;">
                                  <input class="form-control" size="16" type="text" value="{{old('ended_at')}}" readonly style="background-color:#fff" name="ended_at">
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-remove"></span>
                                  </span>
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                  </span>
                              </div>

                            @if ($errors->has('ended_at'))
                                <span class="help-block text-center">
                                    <strong>{{ $errors->first('ended_at') }}</strong>
                                </span>
                            @endif
                          </div>

                          {{-- Prix --}}
                          <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                              <label for="price" class="col-md-4 control-label">Prix</label>

                              <div class="col-md-6 form-group input-group" style="padding:0 15px 0 15px;">
                                  <input id="price" type="number" class="form-control" name="price" value="{{old('price')}}" required>
                                  <span class="input-group-addon"><i class="fa fa-eur"></i></span>

                                  @if ($errors->has('price'))
                                      <span class="help-block text-center">
                                          <strong>{{ $errors->first('price') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Nombre d'élèves maximum --}}
                          <div class="form-group{{ $errors->has('students_max') ? ' has-error' : '' }}">
                              <label for="students_max" class="col-md-4 control-label">Nombre d'élèves maximum</label>

                              <div class="col-md-6">
                                  <input id="students_max" type="number" class="form-control" name="students_max" value="{{old('students_max')}}" required>

                                  @if ($errors->has('students_max'))
                                      <span class="help-block text-center">
                                          <strong>{{ $errors->first('students_max') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Status --}}
                          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                              <label for="status" class="col-md-4 control-label">Status</label>

                              <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="optionsRadiosInline1" value="published" @if(old('status') == 'published') checked @endif> Published
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="optionsRadiosInline2" value="unpublished" @if(old('status') == 'unpublished') checked @endif @if(null == (old('status')))checked @endif> Unpublished
                                </label>

                                  @if ($errors->has('status'))
                                      <span class="help-block text-center">
                                          <strong>{{ $errors->first('status') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Images --}}
                          <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                              <label for="picture" class="col-md-4 control-label">File</label>

                              <div class="col-md-6">
                                  <input style="padding-top: 0.6rem;" id="picture" type="file" name="picture" value="{{old('picture')}}">

                                  @if ($errors->has('picture'))
                                      <span class="help-block text-center">
                                          <strong>{{ $errors->first('picture') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          {{-- Submit --}}
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Submit
                                  </button>
                              </div>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
