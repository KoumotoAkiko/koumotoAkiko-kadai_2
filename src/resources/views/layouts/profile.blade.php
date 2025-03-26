@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="frofile-form">
    <h2 class="profile-form__heading">プロフィール登録</h2>
    <div class="profile-form__inner">
        <form class="profile-form__form" action="{{route('admin.profile')}}" method="post">
            @csrf
            <div class="profile-form__group">
                <label class="profile-form__label">性別</label>
                <input class="profile-form__select" type="radio" name="gender" value="男性" checked="checked">男性
                <input class="profile-form__select" type="radio" name="gender" value="女性">女性
                <input class="profile-form__select" type="redio" name="gender" value="その他">その他
            </div>

            <input class="profile-form__btn" type="submit" value="ログイン">
        </form>
    </div>
</div>


@endsection