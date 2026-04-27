@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-button')
    <form action="/logout" method="POST" class="logout">
        @csrf
        <button type="submit" class="btn btn-header">logout</button>
    </form>
@endsection

@section('content')
    <div class="admin-content">
        <div class="content__logo">
            <h2>Admin</h2>
        </div>
        <div class="admin__controls">
            <div class="search">
            <form action="/search" method="GET">
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
                <select name="gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
                <input type="date" name="date">
                <button type="submit" class="btn btn-primary">検索</button> 
            </form>
            <a href="/admin" class="btn btn-reset">リセット</a>
            </div>
            <div class="admin__actions">
            <form action="/export" method="POST">
                @csrf
                <button type="submit" class="btn btn-export">エクスポート</button>
            </form>
            {{ $contacts->links() }}
            </div>
        </div>
        <div class="admin__body">
            <table class="admin__table">
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                        <td>
                            @if($contact->gender == 1)
                                男性
                            @elseif($contact->gender == 2)
                                女性
                            @else
                                その他
                            @endif
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->category->content ?? '未分類' }}</td>
                        <td>
                            <button class="btn btn-detail" data-id="{{ $contact->id }}">詳細</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @foreach($contacts as $contact)
        <div class="modal" id="modal-{{ $contact->id }}" style="display: none;">
            <div class="modal__content">
                <button class="modal__close">×</button>
                <div class="modal__body">
                    <p><strong>お名前</strong> {{ $contact->last_name }} {{ $contact->first_name }}</p>
                    <p><strong>性別</strong>
                    @if($contact->gender == 1)
                        男性
                    @elseif($contact->gender == 2)
                        女性
                    @else
                        その他
                    @endif
                    </p>
                    <p><strong>メールアドレス</strong> {{ $contact->email }}</p>
                    <p><strong>電話番号</strong> {{ $contact->tel }}</p>
                    <p><strong>住所</strong> {{ $contact->address }}</p>
                    <p><strong>建物名</strong> {{ $contact->building }}</p>
                    <p><strong>お問い合わせの種類</strong> {{ $contact->category->content ?? '未分類' }}</p>
                    <p><strong>お問い合わせ内容</strong> {{ $contact->detail }}</p>
                </div>
                <div class="delete__button">
                    <form action="/delete" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $contact->id }}">
                    <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.btn-detail').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            document.getElementById(`modal-${id}`).style.display = 'flex';
        });
    });

    document.querySelectorAll('.modal__close').forEach(button => {
        button.addEventListener('click', () => {
            button.closest('.modal').style.display = 'none';
        });
    });

    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });
    });
</script>
@endsection