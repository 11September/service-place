@extends('layouts.master')

@section('content')
    <div class="register-page">

        <div class="wrapper-header">
            <a class="nav-link signin" href="{{ url('/profile') }}">@lang('messages.home')</a>
        </div>

        <div class="register-content">
            <div class="container">
                <h2 class="register-heading text-center">@lang('messages.editProfile')</h2>

                <div class="register-form-wrapper">
                    <form method="post" action="{{ action('WelcomeController@updateProfile', $user) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-item">
                                <p>@lang('messages.Profile_photo')</p>
                                <input type="file" name="avatar" id="file" class="upload" />
                                <label for="file">@lang('messages.Choose_file')</label>
                            </div>
                            <div class="form-item">
                                <p>@lang('messages.email')</p>

                                <input disabled="disabled" value="{{ $user->email }}" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                                <p>@lang('messages.fName')</p>

                                <input value="{{ $user->name }}" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-item">
                                <p>@lang('messages.lName')</p>

                                <input value="{{ $user->lastName }}" id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lastName') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                                <p>@lang('messages.password')</p>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-item">
                                <p>@lang('messages.Cpassword')</p>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-button">
                            <button class="nav-link signin" type="submit" value="Submit">@lang('messages.edit')</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

