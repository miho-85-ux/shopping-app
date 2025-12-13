@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit-content">
    <form action="/update" method="POST">
        @method('PATCH')
        @csrf 
        <input type="hidden" name="key" value="{{ $item->id }}" >
        <table class="edit-table">
            <tr>
                <th class="table-title">名前</th>
                <td>
                    <input type="text" name="name" value="{{ old('name', $item->name) }}">
                </td>
            </tr>
            <tr>
                <th class="table-title">個数</th>
                <td>
                    <input type="text" name="quantity" value="{{ old('quantity', $item->quantity) }}">
                </td>
            </tr>
        </table>
        <div class="edit-submit">
            <button class="edit-submit__button" type="submit">登録</button>
            <a class="edit-submit__button" href="/top">戻る</a>
        </div>
    </form>
</div>
@endsection