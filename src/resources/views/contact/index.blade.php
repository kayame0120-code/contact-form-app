@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Contact</h2>
        </div>
        <form class="contact-form" action="/confirm" method="POST">
            @csrf
            <div class="form__group">
                <div class="form__title">
                    <label>お名前<span>※</span></label>
                </div>
                <div class="contact-form__item">
                    <input type="text" name="last_name" placeholder="山田" value="{{ old('last_name') }}">
                    <input type="text" name="first_name" placeholder="太郎" value="{{ old('first_name') }}">
                    <div class="form__error">
                        @error('last_name')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                        @error('first_name')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__title">
                    <label>性別<span>※</span></label>
                </div>
                <div class="contact-form__item">
                    <input type="radio" name="gender" id="male" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                    <label for="male">男性</label>
                    <input type="radio" name="gender" id="female" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
                    <label for="female">女性</label>
                    <input type="radio" name="gender" id="other"   value="3" {{ old('gender') == '3' ? 'checked' : '' }}>
                    <label for="other">その他</label>
                    <div class="form__error">
                        @error('gender')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__title">
                    <label for="email">メールアドレス<span>※</span></label>
                </div>
                <div class="contact-form__item">
                    <input type="text" id="email" name="email" placeholder="test@example.com" value="{{ old('email') }}">
                    <div class="form__error">
                        @error('email')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="form__group">
                <div class="form__title">
                    <label>電話番号<span>※</span></label>
                </div>
                <div class="contact-form__item">
                    <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                    <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                    <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                    <div class="form__error">
                        @error('tel1')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                        @error('tel2')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                        @error('tel3')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__title">
                    <label>住所<span>※</span></label>
                </div>
                <div class="contact-form__item">
                    <input type="text" name="address" placeholder="東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    <div class="form__error">
                        @error('address')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__title">
                    <label>建物名</label>
                </div>
                <div class="contact-form__item">
                    <input type="text" name="building" placeholder="千駄ヶ谷マンション101" value="{{ old('building') }}">
                    <div class="form__error">
                        @error('building')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__title">
                    <label>お問い合わせの種類<span>※</span></label>
                </div>
                <div class="contact-form__item">
                    <select  name="category_id">
                        <option value="">選択してください</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                        @endforeach
                    </select>
                    <div class="form__error">
                        @error('category_id')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__title">
                    <label for="detail">お問い合わせ内容<span>※</span></label>
                </div>
                <div class="contact-form__item">
                    <textarea name="detail" id="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    <div class="form__error">
                        @error('detail')
                        <p class="contact-form__error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="contact-form__button">
                <button type="submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection