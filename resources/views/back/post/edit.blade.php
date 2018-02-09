@extends('back.layouts.master')

@section('content')



  <div class="container">
      <div class="row">
          <div class="col-md-9 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">Update</div>

                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}

                          {{-- Titre --}}
                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              <label for="title" class="col-md-4 control-label">Titre</label>

                              <div class="col-md-6">
                                  <input id="title" type="text" class="form-control" name="title"
                                   @if (!null == (old('title'))) value="{{old('title')}}" @else value="{{$post->title}}" @endif required>
                              </div>
                              @if ($errors->has('title'))
                                  <span class="help-block text-center">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                              @endif
                          </div>

                          {{-- Type --}}
                          <div class="form-group{{ $errors->has('post_type') ? ' has-error' : '' }}">
                              <label for="post_type" class="col-md-4 control-label">Type</label>

                              <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="post_type" id="optionsRadiosInline1" value="stage" @if(!null == (old('post_type')) && old('post_type') == 'stage')
                                      checked
                                    @elseif ($post->post_type == 'stage') checked
                                    @else
                                    @endif
                                    > Stage
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="post_type" id="optionsRadiosInline1" value="stage" @if(!null == (old('post_type')) && old('post_type') == 'formation')
                                      checked
                                    @elseif ($post->post_type == 'formation') checked
                                    @else
                                    @endif
                                    > Formation
                                </label>
                              </div>
                              @if ($errors->has('status'))
                                  <span class="help-block text-center">
                                      <strong>{{ $errors->first('status') }}</strong>
                                  </span>
                              @endif
                          </div>

                          {{-- Categorie --}}
                          <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                              <label for="category_id" class="col-md-4 control-label">Catégorie</label>
                              <div class="col-md-6">
                                <select name="category_id" class="form-control" id="category_id">
                                  @if(!null == (old('category_id')))
                                    @forelse($categories as $id => $name)
                                    <option value="{{$id}}" @if(old('category_id') == $id) selected @endif>{{$name}}</option>
                                    @empty
                                    @endforelse
                                @else

                                  @forelse($categories as $id => $name)
                                        <option value="{{$id}}" @if((old('category_id') == $id) || ($post->category->id == $id)) selected @endif>{{$name}}</option>
                                        @empty
                                        @endforelse

                                         @endif
                                </select>
                              </div>
                              @if ($errors->has('category_id'))
                                  <span class="help-block text-center">
                                      <strong>{{ $errors->first('category_id') }}</strong>
                                  </span>
                              @endif
                          </div>

                          {{-- Description --}}
                          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                              <label for="description" class="col-md-4 control-label">Description</label>

                              <div class="col-md-6">
                                  <textarea name="description" class="form-control" rows="2">@if(!null==(old('description'))){{old('description')}}
                                  @else{{$post->description}}
                                  @endif</textarea>
                              </div>
                              @if ($errors->has('description'))
                                  <span class="help-block text-center">
                                      <strong>{{ $errors->first('description') }}</strong>
                                  </span>
                              @endif
                          </div>

                          {{-- Date de début --}}
                          <div class="form-group">
                              <label for="started_at" class="col-md-4 control-label">Date de début</label>
                              <div class="input-group date form_datetime col-md-6" data-date="2018-01-1T00:00:00Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="started_at" style="padding:0 15px 0 15px;">
                                  <input class="form-control" size="16" type="text"
                                  @if (!null == old('started_at'))
                                    value="{{old('started_at')}}"
                                  @else
                                    value="{{$post->started_at}}"
                                  @endif
                                  readonly style="background-color:#fff" name="started_at">
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
                                  <input class="form-control" size="16" type="text"
                                  @if (!null == old('ended_at'))
                                    value="{{old('ended_at')}}"
                                  @else
                                    value="{{$post->ended_at}}"
                                  @endif
                                   readonly style="background-color:#fff" name="ended_at">
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
                                  <input id="price" type="number" step="any" min="1" class="form-control" name="price"
                                  @if (!null == old('price'))
                                    value="{{old('price')}}"
                                  @else
                                    value="{{$post->price}}"
                                  @endif
                                   required>
                                  <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                              </div>
                              @if ($errors->has('price'))
                                  <span class="help-block text-center">
                                      <strong>{{ $errors->first('price') }}</strong>
                                  </span>
                              @endif
                          </div>

                          {{-- Nombre d'élèves maximum --}}
                          <div class="form-group{{ $errors->has('students_max') ? ' has-error' : '' }}">
                              <label for="students_max" class="col-md-4 control-label">Nombre d'élèves maximum</label>

                              <div class="col-md-6">
                                  <input id="students_max" type="number" class="form-control" name="students_max" min="0"
                                  @if (!null == old('students_max'))
                                    value="{{old('students_max')}}"
                                  @else
                                    value="{{$post->students_max}}"
                                  @endif
                                   required>
                              </div>
                              @if ($errors->has('students_max'))
                                  <span class="help-block text-center">
                                      <strong>{{ $errors->first('students_max') }}</strong>
                                  </span>
                              @endif
                          </div>

                          {{-- Status --}}
                          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                              <label for="status" class="col-md-4 control-label">Status</label>

                              <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="optionsRadiosInline1" value="published" @if(!null == (old('status')) && old('status') == 'published')
                                      checked
                                    @elseif ($post->status == 'published') checked
                                    @else
                                    @endif>
                                       Published
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="optionsRadiosInline2" value="unpublished" @if(!null == (old('status')) && old('status') == 'unpublished')
                                      checked
                                    @elseif ($post->status == 'unpublished') checked
                                    @else
                                    @endif>
                                       Unpublished
                                </label>
                              </div>

                                @if ($errors->has('status'))
                                    <span class="help-block text-center">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="row">
                            <div class="img col-md-2 col-md-offset-4">
                              @if (isset($post->picture))
                                <img  src="{{asset('images/' . $post->picture->link)}}" style="max-width:100%;"/>
                              @endif
                            </div>
                          </div>
                          {{-- Images --}}
                          <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                              <label for="picture" class="col-md-4 control-label">Image</label>

                              <div class="col-md-6">
                                  <input style="padding-top: 0.6rem;" id="picture" type="file" name="picture" value="{{old('picture')}}">
                              </div>
                          </div>
                          @if ($errors->has('picture'))
                              <span class="help-block text-center">
                                  <strong>{{ $errors->first('picture') }}</strong>
                              </span>
                          @endif

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
