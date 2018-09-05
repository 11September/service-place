@extends('layouts.master')

@section('css')

@endsection

@section('content')

    <div class="register-page">

        <div class="wrapper-header">
            <a class="nav-link signin" href="{{ url('/') }}">Home</a>
            <a class="nav-link signin" href="{{ url('/editProfile') }}">Edit</a>
        </div>

        <div class="profile-content">
            <div class="wrapper-profile-avatar">
                <p>
                    @if($user->avatar)
                        <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}">
                    @else
                        <img src="img/oleg.jpg" alt="oleg">
                    @endif

                </p>

                <p class="profile-username">{{ $user->name }}</p>
            </div>

            <div class="wrapper-social-links">
                <div class="social-links">
                    <div class="social-link social-link-thead">
                        <p class="social-link-thead-name">Social links</p>
                        <p><a class="social-link-create-button" href="#">+Add</a></p>
                    </div>

                    @if(isset($user->social->instagram))
                        <div class="social-link">
                            <p class="social-link-name">Instagram</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->instagram }}">{{ $user->social->instagram }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->facebook))
                        <div class="social-link">
                            <p class="social-link-name">Facebook</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->facebook }}">{{ $user->social->facebook }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->vk))
                        <div class="social-link">
                            <p class="social-link-name">VK</p>
                            <p class="social-link-src"><a href="{{ $user->social->vk }}">{{ $user->social->vk }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->linkedIn))
                        <div class="social-link">
                            <p class="social-link-name">LinkedIn</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->facebook }}">{{ $user->social->facebook }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->telegram))
                        <div class="social-link">
                            <p class="social-link-name">Telegram</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->telegram }}">{{ $user->social->telegram }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->viber))
                        <div class="social-link">
                            <p class="social-link-name">Viber</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->viber }}">{{ $user->social->viber }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->whatsApp))
                        <div class="social-link">
                            <p class="social-link-name">WhatsApp</p>
                            <p class="social-link-src"><a
                                        href="{{ $user->social->whatsApp }}">{{ $user->social->whatsApp }}</a></p>
                        </div>
                    @endif

                    <div class="social-link social-link-last">
                        <p class="social-link-name">Facebook</p>
                        <p class="social-link-src">facebook.com/qweqw123</p>
                        <p>
                            <a class="social-link-edit-button" href="#">Edit</a>
                            <a class="social-link-delete-button" href="#">Delete</a>
                        </p>
                    </div>
                </div>
            </div>


            <div class="social-links">
                <div class="social-link social-link-thead">
                    <p class="social-link-thead-name">Posts</p>
                    <p><a class="social-link-create-button" href="{{ url('/new-post') }}">+Add</a></p>
                </div>

                @foreach($user->posts as $post)
                    <div class="post-flex @if($loop->last) social-link-last @endif">
                        <div>
                            <p class="social-link-name"><a href="{{ url('/post/' . $post->id) }}">{{ $post->title }}</a>
                            </p>
                            <p class="social-link-src">{{ $post->description }}</p>
                        </div>

                        <div>
                            <p>
                                <a class="social-link-edit-button" href="{{ url('/edit-post/' . $post->id) }}">Edit</a>
                                <a class="social-link-delete-button" href="{{ url('/delete-post/' . $post->id) }}">Delete</a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection


@section('scripts')

@endsection
