@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('header-button')
    <div class="header__button">
        <a href="/login" class="btn btn-header">login</a>
    </div>
@endsection

@section('content')
    <div class="auth-form__content">
        <div class="auth-form__heading">
            <h2>Register</h2>
        </div>
        <div class="auth-form__group">
            <form class="auth-form" action="/register" method="POST">
            @csrf
            <div class="auth__form-group">
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" placeholder="山田太郎" value="{{ old('name') }}">
            </div>
            <div class="form__error">
                @error('name')
                <p class="auth-form__error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="auth__form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="test@example.com" value="{{ old('email') }}">
            </div>
            <div class="form__error">
                @error('email')
                <p class="auth-form__error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="auth__form-group">
                <label for="password">パスワード<span>※</span></label>
                <input type="password" id="password" name="password" placeholder="coachtech1106" >
            </div>
            <div class="form__error">
                @error('password')
                <p class="auth-form__error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="auth__form-button">
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
            </form>
        </div>
    </div>
@endsection
