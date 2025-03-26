@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/entry.css') }}">
@endsection

@section('content')
<div class="entry-form">
    <h2 class="entry-form__heading">新規登録</h2>
    <div class="entry-form__inner">
        <form class="entry-form__form" action="/admin/register" method="post">
            @csrf
            <div class="entry-form__group">
                <label class="entry-form__label" for="name">お名前</label>
                <input class="entry-form__input" type="text" name="name" id="name" placeholder="例:山田太郎" value="{{old('name')}}">
                <p class="entry-form__error-message">
                    @error('name')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <div class="entry-form__group">
                <label class="entry-form__label" for="email">メールアドレス</label>
                <input class="entry-form__input" type="mail" name="email" id="email" placeholder="例:test@gmail.com" value="{{old('email')}}">
                <p class="entry-form__error-message">
                    @error('email')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <div class="entry-form__group">
                <laebl class="entry-form__label" for="password">パスワード</label>
                <input class="entry-form__input" type="password" name="password" id="passwprd" placeholder="例:coachtech1106">
                <p class="entry-form__error-message">
                    @error('password')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <input class="entry-form__btn" type="submit" value="プロフィール登録">
        </form>
    </div>
</div>

@endsection