@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="shopping__content">
    <div class="content__inner">
        <form class="content__item" action="/store" method="POST">
            @csrf 
            <div >
                <label class="content__title" for="">お買い物リスト</label>
                <div>
                    <input type="text" name="name" placeholder="買うもの">
                </div>
            </div>
            <div>
                <label class="content__title" for="">個数</label>
                <div>
                    <select name="quantity" id="">
                        <option value="1">1個</option>
                        <option value="2">2個</option>
                        <option value="3">3個</option>
                        <option value="4">4個</option>
                        <option value="5">5個</option>                      
                    </select>
                </div>
            </div>
            <button class="content__item--submit" type="submit">登録</button>
        </form>
    </div>
    <div class="content__inner">
        <form class="content__item" action="">
            <div>
                <label class="content__title" for="">検索</label>
                <div>
                    <input type="text" name="name" placeholder="検索したい商品名">
                </div>
            </div>
            <div>
                <label class="content__title" for="">個数</label>
                <div>
                    <select name="quantity" id="">個</select>
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
                <form action="">
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