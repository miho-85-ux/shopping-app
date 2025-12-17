@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

@if (session('message'))
<div class="alart">
    {{ session('message') }}
</div>
@endif

<div class="shopping__content">
    <div class="content__inner">
        <form class="content__item" action="/store" method="POST">
            @csrf 
            <div >
                <label class="content__title" for="name">お買い物リスト</label>
                <div>
                    <input type="text" name="name" id="name" placeholder="買うもの">
                </div>
            </div>
            <div>
                <label class="content__title" for="quantity">個数</label>
                <div>
                    <select class="select-quantity" name="quantity" id="quantity">
                        <option value="" selected disabled>選択してください</option>
                        @foreach (range(1, 10) as $quantity)
                            <option value="{{ $quantity }}" >
                                {{ $quantity}}個
                            </option>    
                        @endforeach                  
                    </select>
                </div>
            </div>
            <button class="content__item--submit" type="submit">登録</button>
        </form>
    </div>
    <div class="content__inner">
        <form class="content__item" action="/search" method="GET">
            @csrf 
            <div>
                <label class="content__title" for="sarch">検索</label>
                <div>
                    <input type="text" name="name" id="sarch" placeholder="検索したい商品名" value="{{ request('name') }}" >
                </div>
            </div>
            <div>
                <label class="content__title" for="quantity">個数</label>
                <div>
                    <select class="select-quantity" type="text" name="quantity" id="quantity">
                        <option value="" selected disabled >選択してください</option>
                        @foreach (range(1, 10) as $quantity)
                            <option value="{{ $quantity }}" {{ request('quantity') == $quantity ? 'selected' : '' }}>
                                {{ $quantity}}個
                            </option>    
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="content__item--submit" type="submit">検索</button>
        </form>
    </div>

    <div class="shopping__table">
        <table class="table__row">
            <tr class="table__item">
                <th class="table__item--title">お買い物リスト</th>
                <th class="table__item--title">個数</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($items as $item)
            <tr>  
                <form action="/edit" method="POST">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" id="postId" name="key" value="{{ $item->id }}" />
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        {{ $item->quantity }}個
                    </td>
                    <td class="table__submit--item">
                        <button class="table__submit--update" type="submit">編集</button>
                    </td>
                </form>
                <form action="/destroy" method="POSt">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="key" value="{{ $item->id }}" >
                    <td>
                        <button class="table__submit--delete" type="submit">削除</button>
                    </td>
                </form>  
            </tr>
            @endforeach
        </table>    
    </div>
</div>


@endsection