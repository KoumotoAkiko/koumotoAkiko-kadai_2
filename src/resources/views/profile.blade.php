@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="frofile-form">
    <h2 class="profile-form__heading">プロフィール登録</h2>
    <div class="profile-form__inner">
        <form class="profile-form__form" action="{{route('profile.store')}}" method="post">
            @csrf
            <div class="profile-form__group">
                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                <label class="profile-form__label">性別</label>
                <input class="profile-form__select" type="radio" name="gender" value="1" checked="checked">男性
                <input class="profile-form__select" type="radio" name="gender" value="2">女性
                <input class="profile-form__select" type="radio" name="gender" value="3">その他
            </div>
            <div class="profile-form__group">
                <label class="profile-form__label">生年月日</label>
                <input class="profile-form__birthday" type="date" id="birthday" name="birthday">
            </div>

            <input class="profile-form__btn" type="submit" value="ログイン">
        </form>
    </div>
</div>


@endsection