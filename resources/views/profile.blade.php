@extends('layouts.master')

@section('css')

@endsection

@section('content')

<div class="register-page">

    <div class="wrapper-header">
        <a class="nav-link signin" href="contact.html">Home</a>
        <a class="nav-link signin" href="contact.html">Edit</a>
    </div>

    <div class="profile-content">
        <div class="wrapper-profile-avatar">
            <p>
                <img src="img/oleg.jpg" alt="oleg">
            </p>

            <p class="profile-username">John Doe</p>
        </div>

        <div class="wrapper-social-links">
            <div class="social-links">
                <div class="social-link social-link-thead">
                    <p class="social-link-thead-name">Social links</p>
                    <p><a class="social-link-create-button" href="#">+Add</a></p>
                </div>

                <div class="social-link">
                    <p class="social-link-name">Facebook</p>
                    <p class="social-link-src">facebook.com/qweqw123</p>
                    <p>
                        <a class="social-link-edit-button" href="#">Edit</a>
                        <a class="social-link-delete-button" href="#">Delete</a>
                    </p>
                </div>

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
                <p class="social-link-thead-name">Social links</p>
                <p><a class="social-link-create-button" href="#">+Add</a></p>
            </div>

            <div class="social-link">
                <p class="social-link-name">Facebook</p>
                <p class="social-link-src">facebook.com/qweqw123</p>
                <p>
                    <a class="social-link-edit-button" href="#">Edit</a>
                    <a class="social-link-delete-button" href="#">Delete</a>
                </p>
            </div>

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
</div>


@endsection


@section('scripts')

@endsection
