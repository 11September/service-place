@extends('layouts.master')

@section('css')

@endsection

@section('content')

    <div class="register-page">

        <div class="wrapper-header">
            <a class="nav-link signin" href="{{ url('/') }}">@lang('messages.home')</a>
            <a class="nav-link signin" href="{{ url('/editProfile') }}">@lang('messages.editProfile')</a>
        </div>

        <div class="profile-content">
            <div class="wrapper-profile-avatar">
                <p>
                    @if($user->avatar && $user->avatar != "users/default.png")
                        <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}">
                    @endif
                </p>

                <p class="profile-username">{{ $user->name }}</p>
            </div>

            <div class="wrapper-social-links">
                <div class="social-links social-links-padding">


                    <div class="social-link social-link-thead @if(empty($user->social->instagram) && empty($user->social->facebook) && empty($user->social->vk) && empty($user->social->linkedIn) && empty($user->social->telegram) && empty($user->social->viber) && empty($user->social->whatsApp)) empty @endif">
                        <p class="social-link-thead-name">@lang('messages.social_links')</p>
                        <p><a class="social-link-create-button" href="{{ url('/social') }}">@lang('messages.add')</a></p>
                    </div>

                    @if(isset($user->social->instagram) && !empty($user->social->instagram))
                        <div class="social-link">
                            <p class="social-link-name width">Instagram</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->instagram }}">{{ $user->social->instagram }}</a></p>

                            <p>
                                <a class="social-link-edit-button" href="{{ url('/social') }}">@lang('messages.edit')</a>
                                <a class="social-link-delete-button"
                                   href="{{ action('WelcomeController@social_delete', "instagram") }}">@lang('messages.delete')</a>
                            </p>
                        </div>
                    @endif

                    @if(isset($user->social->facebook) && !empty($user->social->facebook))
                        <div class="social-link">
                            <p class="social-link-name width">Facebook</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->facebook }}">{{ $user->social->facebook }}</a></p>

                            <p>
                                <a class="social-link-edit-button" href="{{ url('/social') }}">@lang('messages.edit')</a>
                                <a class="social-link-delete-button"
                                   href="{{ action('WelcomeController@social_delete', "facebook") }}">@lang('messages.delete')</a>
                            </p>
                        </div>
                    @endif

                    @if(isset($user->social->vk) && !empty($user->social->vk))
                        <div class="social-link">
                            <p class="social-link-name width">VK</p>
                            <p class="social-link-src"><a href="{{ $user->social->vk }}">{{ $user->social->vk }}</a></p>

                            <p>
                                <a class="social-link-edit-button" href="{{ url('/social') }}">@lang('messages.edit')</a>
                                <a class="social-link-delete-button"
                                   href="{{ action('WelcomeController@social_delete', "vk") }}">@lang('messages.delete')</a>
                            </p>
                        </div>
                    @endif

                    @if(isset($user->social->linkedIn) && !empty($user->social->linkedIn))
                        <div class="social-link">
                            <p class="social-link-name width">LinkedIn</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->linkedIn }}">{{ $user->social->linkedIn }}</a></p>

                            <p>
                                <a class="social-link-edit-button" href="{{ url('/social') }}">@lang('messages.edit')</a>
                                <a class="social-link-delete-button"
                                   href="{{ action('WelcomeController@social_delete', "linkedIn") }}">@lang('messages.delete')</a>
                            </p>
                        </div>
                    @endif

                    @if(isset($user->social->telegram) && !empty($user->social->telegram))
                        <div class="social-link">
                            <p class="social-link-name width">Telegram</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->telegram }}">{{ $user->social->telegram }}</a></p>

                            <p>
                                <a class="social-link-edit-button" href="{{ url('/social') }}">@lang('messages.edit')</a>
                                <a class="social-link-delete-button"
                                   href="{{ action('WelcomeController@social_delete', "telegram") }}">@lang('messages.delete')</a>
                            </p>
                        </div>
                    @endif

                    @if(isset($user->social->viber) && !empty($user->social->viber))
                        <div class="social-link">
                            <p class="social-link-name width">Viber</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->viber }}">{{ $user->social->viber }}</a></p>

                            <p>
                                <a class="social-link-edit-button" href="{{ url('/social') }}">@lang('messages.edit')</a>
                                <a class="social-link-delete-button"
                                   href="{{ action('WelcomeController@social_delete', "viber") }}">@lang('messages.delete')</a>
                            </p>
                        </div>
                    @endif

                    @if(isset($user->social->whatsApp) && !empty($user->social->whatsApp))
                        <div class="social-link">
                            <p class="social-link-name width">WhatsApp</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->whatsApp }}">{{ $user->social->whatsApp }}</a></p>

                            <p>
                                <a class="social-link-edit-button" href="{{ url('/social') }}">@lang('messages.edit')</a>
                                <a class="social-link-delete-button"
                                   href="{{ action('WelcomeController@social_delete', "whatsApp") }}">@lang('messages.delete')</a>
                            </p>
                        </div>
                    @endif

                </div>
            </div>

            <div class="social-links">
                <div class="social-link social-link-thead @if(count($user->posts) < 1) empty @endif">
                    <p class="social-link-thead-name">@lang('messages.posts')</p>
                    <p><a class="social-link-create-button" href="{{ url('/new-post') }}">@lang('messages.add')</a></p>
                </div>

                @foreach($user->posts as $post)
                    <div class="post-flex @if($loop->last) social-link-last @endif">
                        <div>
                            <p class="social-link-name">
                                <a class="@if($post->status == "Pending") disabled disabled-link @endif"
                                   @if($post->status == "Pending") tabindex="-1" @endif
                                   href="{{ url('/post/' . $post->id) }}">
                                    {{ $post->title }}
                                </a>
                            </p>
                            <p class="social-link-src">{{ $post->description }}</p>
                        </div>

                        <div class="wrapper-profile-control-posts-buttons">
                            <p>
                                <a class="social-link-edit-button" href="{{ url('/edit-post/' . $post->id) }}">@lang('messages.edit')</a>
                                <a class="social-link-delete-button" href="{{ url('/delete-post/' . $post->id) }}">@lang('messages.delete')</a>
                            </p>

                            @if($post->status == "Published")
                                <p class="profile-control-post-status">
                                    <a href="#"><i class="fas fa-check-circle publihed"></i></a>
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection


@section('scripts')

@endsection
