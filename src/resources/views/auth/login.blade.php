@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection



@section('content')
<div class="login-form">
    <h2 class="login-form__heading">ログイン</h2>
    <div class="login-form__inner">
        <form class="login-form__form" action="/admin/login" method="post">
            @csrf
            <div class="login-form__group">
                <label class="login-form__label" for="email">メールアドレス</label>
                <input class="login-form__input" type="email" name="email" id="email" placeholder="例:test@gmail.com" value="{{old('email')}}">
                <p class="login-form__error-message">
                    @error('email')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <div class="login-form__group">
                <label class="login-form__label" for="passward">パスワード</label>
                <input class="login-form__input" type="password" name="password" id="password" placeholder="例:coachtech">
                <p class="login-form__error-message">
                    @error('password')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <input class="login-form__btn" type="submit" value="ログイン">
        </form>
    </div>
</div>

@endsection
