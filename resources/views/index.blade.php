@extends('layouts.master')

@section('css')

@endsection

@section('content')

    <header class="masthead">
        <div class="overlay"></div>

        <div class="intro">
            <div class="container">

                <div class="wrapper-logo-user">
                    <div>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            @if(setting('site.logo'))
                                <img src="{{ asset('storage/' . setting('site.logo')) }}" alt="">
                            @else
                                LOGO
                            @endif
                        </a>
                    </div>

                    <div class="wrapper-right-signin">

                        @if ( Config::get('app.locale') == 'en')
                            <p>
                                <a href="{{ url('/language/ru') }}"
                                   class="nav-item-child nav-item-hover language @if ( Config::get('app.locale') == 'ru') active-language @endif">
                                    @lang('messages.menu.language.ru')
                                </a>
                            </p>
                        @endif

                        @if ( Config::get('app.locale') == 'ru')
                            <p>
                                <a href="{{ url('/language/en') }}"
                                   class="nav-item-child nav-item-hover language  @if ( Config::get('app.locale') == 'en') active-language @endif">
                                    @lang('messages.menu.language.en')
                                </a>
                            </p>
                        @endif

                        <ul class="navbar-nav ml-auto">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link signin"
                                       href="{{ route('login') }}">@lang('messages.menu.signIN')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link signin"
                                       href="{{ route('register') }}">@lang('messages.menu.signUp')</a>
                                </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"
                                               href="{{ url('profile') }}">@lang('messages.profile')</a>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                @lang('messages.menu.logout')
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endguest
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <div class="site-heading">

                            @if ( Config::get('app.locale') == 'ru')
                                <h1>{{ setting('site.title') }}</h1>
                            @endif

                            @if ( Config::get('app.locale') == 'en')
                                <h1>{{ setting('site.titleEng') }}</h1>
                            @endif


                            @if ( Config::get('app.locale') == 'ru')
                                    <span class="subheading">{{ setting('site.description') }}</span>
                            @endif

                            @if ( Config::get('app.locale') == 'en')
                                    <span class="subheading">{{ setting('site.descriptionEng') }}</span>
                            @endif


                            <form class="search-form" action="{{ action('PostsController@search') }}">
                                <input name="search" type="text" class="form-control"
                                       placeholder="@lang('messages.search-placeholder')">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="wrapper-content">
        <div class="container">
            <div class="row">
                @if(Request::is('search'))
                    <p class="search-helper">@lang('messages.we-found') {{ $posts->total() }} @lang('messages.we-found-posts')
                        <span class="search-helper-keyword"> "{{ $search }}" </span>
                    </p>
                @else
                    <p class="search-helper">@lang('messages.we-found') {{ $posts->total() }} @lang('messages.we-found-latest-posts')</p>
                @endif
            </div>
        </div>

        <div class="posts-container">
            <div class="item-list row no-marg">

                @foreach($posts as $post)
                    <div class="animated fadeInUp service col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="service-item">
                            <a href="{{ url('post/' . $post->id ) }}" class="service-item-title-link">
                                <p class="service-item-title">{{ $post->title }}</p>
                            </a>
                            <p class="service-item-descr">{{ mb_strimwidth($post->description, 0, 100, " ...") }}</p>
                            <div class="service-wrapper-user">
                                <a href="{{ url( '/user/' . $post->user->id) }}">

                                    @if($post->user->avatar)
                                        <img class="service-logo" src="{{ asset($post->user->avatar) }}" alt="">
                                    @endif
                                </a>
                                <a class="service-username" href="{{ url('user/' . $post->user->id) }}">
                                    <p>{{ $post->user->name }}</p>
                                </a>
                                <a class="service-userarrow" href="{{ url('user/' . $post->user->id) }}">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="wrapper-pagination">
                    {{ $posts->links() }}
                </div>


            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection