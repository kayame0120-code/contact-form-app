@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__logo">
        <h2>Confirm</h2>
    </div>
    <div class="content__body">
        <table class="contact__table">
                <tr class="contact__item">
                    <th class="confirm__th">お名前</th>
                    <td class="confirm__td">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
                </tr>
                <tr class="contact__item">
                    <th class="confirm__th">性別</th>
                    <td class="confirm__td">
                        @if($contact['gender'] == 1)
                            男性
                        @elseif($contact['gender'] == 2)
                            女性
                        @else
                            その他
                        @endif
                    </td>
                </tr>
                <tr class="contact__item">
                    <th class="confirm__th">メールアドレス</th>
                    <td class="confirm__td">{{ $contact['email'] }}</td>
                </tr>
                <tr class="contact__item">
                    <th class="confirm__th">電話番号</th>
                    <td class="confirm__td">{{ $contact['tel'] }}</td>
                </tr>
                <tr class="contact__item">
                    <th class="confirm__th">住所</th>
                    <td class="confirm__td">{{ $contact['address'] }}</td>
                </tr>
                <tr class="contact__item">
                    <th class="confirm__th">建物名</th>
                    <td class="confirm__td">{{ $contact['building'] }}</td>
                </tr>
                <tr class="contact__item">
                    <th class="confirm__th">お問い合わせの種類</th>
                    <td class="confirm__td">
                        @foreach($categories as $category)
                            @if($category->id == $contact['category_id'])
                                {{ $category->content }}
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr class="contact__item">
                    <th class="confirm__th">お問い合わせ内容</th>
                    <td class="confirm__td">{{ $contact['detail'] }}</td>
                </tr>
            </table>
    </div>
    <div class="confirm__buttons">
        <form action="/thanks" method="POST">
        @csrf
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}" >
            <input type="hidden" name="tel" value="{{ $contact['tel'] }}" >
            <input type="hidden" name="address" value="{{ $contact['address'] }}" >
            <input type="hidden" name="building" value="{{ $contact['building'] }}" >
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" >
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}" >
            <button type="submit" class="btn btn-primary">送信</button>
        </form>
        <form action="/" method="GET">
            <button type="submit" class="btn btn-secondary">修正</button>
        </form>
    </div>
</div>

@endsection