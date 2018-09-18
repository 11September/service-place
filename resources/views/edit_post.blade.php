@extends('layouts.master')

@section('css')

@endsection

@section('content')

    <div class="register-page">

        <div class="wrapper-header">
            <a class="nav-link signin" href="{{ url('/profile') }}">@lang('messages.back')</a>
        </div>

        <div class="register-content">
            <div class="container">
                <h2 class="register-heading text-center">@lang('messages.post')</h2>

                <div class="register-form-wrapper new-post-wrapper">
                    <form method="post" action="{{ action('PostsController@updatePost', $post->id) }}">
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="form-item">
                                <p>@lang('messages.title_post')</p>
                                <input value="{{ $post->title }}" name="title" type="text"
                                       class="{{ $errors->has('title') ? ' is-invalid' : '' }}"/>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                                <p>@lang('messages.description_post')</p>
                                <textarea name="description" type="text"
                                          class="{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $post->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                                <p class="prices-description-text">@lang('messages.please_deposit')</p>
                                <div class="prices-block">
                                    <p>1 @lang('messages.month') - $10</p>
                                    <p>6 @lang('messages.month') - $30</p>
                                    <p>12 @lang('messages.month') - $50</p>
                                </div>

                                <div class="wrapper-blocks-payment">
                                    <p class="prices-description-text">@lang('messages.payment')</p>

                                    <div class="cards">
                                        <div class="wrapper-code">
                                            <p class="code-number">{{ setting('site.card') }}</p>
                                        </div>
                                    </div>

                                    <p class="prices-description-text">@lang('messages.code')</p>

                                    <div class="wrapper-code">
                                        <p class="code-number">{{ \Illuminate\Support\Facades\Auth::user()->code }}</p>
                                    </div>
                                </div>

                                <p class="prices-description-text">
                                    @lang('messages.comments')
                                </p>
                                <p class="text-center"></p>
                            </div>
                        </div>

                        <div class="form-button">
                            <button class="nav-link signin" type="submit" value="Submit">@lang('messages.update')</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')

@endsection