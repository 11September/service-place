@extends('layouts.master')

@section('css')

@endsection

@section('content')

<div class="register-page">

    <div class="wrapper-header">
        <a class="nav-link signin" href="{{ url('/profile') }}">Back</a>
    </div>

    <div class="container">
        <div class="wrapper-one-post">
            <div class="one-post">
                <div class="one-post-heading">
                    <p class="one-post-title">
                        {{ $post->title }}
                    </p>
                </div>
                <div class="one-post-content">
                    <div class="one-post-description-wrapper">
                        <p class="one-post-description">
                            {{ $post->description }}
                        </p>
                    </div>
                </div>

                <div class="one-post-info">
                    <div class="one-post-user-info">
                        <p><a href="{{ url('profile/' . $post->user->id) }}"><img src="{{ asset('img/oleg.jpg') }}" alt="oleg"></a></p>
                        <p class="one-post-user-name"><a href="{{ url('profile/' . $post->user->id) }}">John Doe</a></p>
                    </div>
                    <div class="one-post-contact-me">
                        <p>Contact me:</p>
                        @if($post->user->social->instagram)
                            <p class="one-post-contact-item"><a href="{{ $post->user->social->instagram }}">instagram</a></p>
                        @endif
                        @if($post->user->social->facebook)
                            <p class="one-post-contact-item"><a href="{{ $post->user->social->facebook }}">facebook</a></p>
                        @endif
                        @if($post->user->social->vk)
                            <p class="one-post-contact-item"><a href="{{ $post->user->social->vk }}">vk</a></p>
                        @endif
                        @if($post->user->social->linkedIn)
                            <p class="one-post-contact-item"><a href="{{ $post->user->social->linkedIn }}">linkedIn</a></p>
                        @endif
                        @if($post->user->social->telegram)
                            <p class="one-post-contact-item"><a href="{{ $post->user->social->telegram }}">telegram</a></p>
                        @endif
                        @if($post->user->social->viber)
                            <p class="one-post-contact-item"><a href="{{ $post->user->social->viber }}">viber</a></p>
                        @endif
                        @if($post->user->social->whatsApp)
                            <p class="one-post-contact-item"><a href="{{ $post->user->social->whatsApp }}">whatsApp</a></p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

@endsection
