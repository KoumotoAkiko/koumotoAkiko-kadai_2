@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<div class="register-form">
    <h2 class="register-form__heading content__heading">商品登録</h2>
    <div class="register-form__inner">
        <form action="{{ route('products.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="register-form__group">
                <label class="register-form__label" for="name">
                    商品名<span class="register-form__required">必須</span>
                </label>
                <input class="register-form__input" type="text" name="name" id="name" value="{{
                old('name')}}"
                    placeholder="商品名を入力">
                    <p class="register-form__error-message">
                        @error('name')
                        {{$message}}
                        @enderror
                    </p>
            </div>

            <div class="register-form__group">
                <label class="register-form__label" for="price">
                    値段<span class="register-form__required">必須</span>
                </label>
                <input class="register-form__input" type="text" name="price" id="price" value="{{
                old('price')}}"
                    placeholder="値段を入力">
                    <p class="register-form__error-message">
                        @error('price')
                        {{$message}}
                        @enderror
                    </p>
            </div>

            <div class="register-form__groupe">
                <label class="register-form__label" for="image">
                    商品画像<span class="register-form__required">必須</span>
                </label>
                    <input class="register-form__uplode" type="file" name="image" id="image">
                    <p class="register-form__error-message">
                        @error('image')
                        {{$message}}
                        @enderror
                    </p>
            </div>

            <div class="register-form__group">
                <label class="register-form__label" for="season">
                    季節<span class="register-form__required">必須</span>
                        <span class="register-form__multiple-choice">複数選択可</span>
                </label>
                @foreach($seasons as $season)
                <div class="register-form__seasons">
                <input type="checkbox" name="seasons[]" value="{{$season->id}}" {{in_array($season->id,
                    old('seasons',[])) ? 'checked' : ''}}><label class="select-season__label">{{$season->name}}</label>
                </div>
                @endforeach
                    <p class="product-detail__error-message">
                    @error('season')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="register-form__group">
                <label class="register-form__label" for="description">
                    商品説明<span class="register-form__required">必須</span>
                </label>
                <textarea class="register-form__textarea" name="description" id="" cols="50" rows="8"
                    placeholder="商品の説明を入力">{{
                        old('description')}}</textarea>
                    <p class="register-form__error-message">
                        @error('escription')
                        {{$message}}
                        @enderror
                    </p>
            </div>
            <div class="register-form__button">
                <button class="register-form__btn btn" type="submit">登録</button>
                <a href="{{route('products')}}" class="register-form__back-btn">戻る</a>
            </div>
        </form>
    </div>
</div>
@endsection