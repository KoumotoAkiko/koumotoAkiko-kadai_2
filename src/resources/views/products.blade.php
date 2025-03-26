@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="product">
    <div class="product__header">
    <h1>商品一覧</h1>
    <nav class="product__nav">
        <a href="{{route('products.register')}}" class="product__btn" >+商品を追加</a>
    </nav>
</div>
    <div class="product__content">
        <div class="product__content-search">
            <form class="search-form" action="/products/search" method="get">
                @csrf
                <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" placeholder="商品名で検索" value="{{request('keyword')}}">
                </div>
                <div class="search-form__button">
                    <button class="search-form__buttom-submit" type="submit">検索</button>
                </div>
            </form>

            <div class="products-card__sort">
                <form action="/products" method="get">
                    @csrf
                    <label for="sort">価格順で表示</label>
                    <select name="sort" id="sort" onchange="this.form.submit()">
                        <option value=""disabled selected>価格で並び替え</option>
                        <option value="asc" {{request('sort')== 'asc' ? 'selected' : ''}}>低い順に表示</option>
                        <option value="desc" {{request('sort')== 'desc' ? 'selected' : ''}}>高い順に表示</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="product__content-list">
            @if($products->isNotEmpty())
            <div class="product__list-com">
            @foreach($products as $product)
                <a href="{{route('products.edit', $product->id)}}">
                <img src="{{asset('storage/image/'. $product->image)}}" alt="{{$product->name}}" class="image">
                </a>
            <div class="list-content">
                <h5 class="product-name">{{$product->name}}</h5>
                <p class="product-price">¥{{number_format($product->price)}}</p>
            </div>
            @endforeach
            </div>
            @else
                <p>該当する商品がありません</p>
            @endif
            <div class="mb-4">
                {{$products->links()}}
            </div>
        </div>
        <form class="product__content-logout" action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
    </div>
    </div>
</div>
@endsection