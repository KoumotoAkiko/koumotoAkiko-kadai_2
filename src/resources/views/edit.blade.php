@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')

<div class="product-detail">
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('products')}}">商品一覧</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ul>
    </nav>

<div class="product-detail__inner">
    <form action="{{ route('products.update', $product->id)}}" enctype="multipart/form-data"  method="post">
        @csrf
        @method('PUT')
        <div class="product-detail__item">
            <input class="product-detail__uplode" type="file"  id="image" name="image">
             <img src="{{asset('storage/image/'. $product->image)}}">
                <input type="hidden" name="image" value="{{old('image',$product->image)}}">
                <p class="product-detail__error-message">
                    @error('image')
                    {{$message}}
                    @enderror
                </p>
        </div>

        <div class="product-detail__item">
            <label class="product-detail__label">商品名</label>
                <input class="product-detail__input" type="name" id="name" name="name" value="{{old('name',$product->name)}}" placeholder="商品名を入力">
                <p class="product-detail__error-message">
                @error('name')
                {{$message}}
                @enderror
                </p>
        </div>

        <div class="product-detail__item">
            <label class="product-detail__label">値段</label>
                <input class="product-detail__input" type="price" id="price" name="price" value="{{old('price',$product->price)}}" placeholder="値段を入力">
                <p class="product-detail__error-message">
                    @error('price')
                    {{$message}}
                    @enderror
                </p>
        </div>

        <div class="product-detail__item">
            <label class="product-detail__label">季節</label>
                @foreach($seasons as $season)
                <input class="product-detail__select" type="checkbox" name="seasons[]" value="{{$season->id}}" {{$product->seasons->contains($season->id) ? 'checked' : ''}}>{{$season->name}}>
                @endforeach

                <p class="product-detail__error-message">
                    @error('season')
                    {{$message}}
                    @enderror
                </p>
        </div>

        <div class="product-detail__item">
            <label class="product-detail__label">商品説明</label>
                <textarea class="product-detail__textarea" name="description" id="description" cols="30" rows="10" placeholder="商品の説明を入力">
                    {{old('description',$product->description)}}</textarea>

                    <p class="product-detail__error-message">
                        @error('description')
                        {{$message}}
                        @enderror
                    </p>
        </div>
        <div class="product-datail__update-btn">
            <button class="update__btn-subumit" type="submit">変更を保存</button>
            <a href="{{route('products')}}" class="register-form__back btn">戻る</a>
        </div>
    </form>
    
    <div class="product-datail__item">
    <form class="product-detail__delete" action="{{route('products.destroy', $product->id)}}" method="post">
        @csrf
        @method('DELETE')
       <div class="product-datail__delete__btn">
        <input type="hidden" name="id" value="{{$product['id']}}">
        <button class="delete__btn btn" >
            <img src="{{asset('storage/image/TiTrash.png')}}" alt="削除" class="delete-icon">
        </button>
       </div>
    </form>
</div>
</div>
</div>



@endsection