@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register__content">
        <div class="register__heading">
            <h2>Register</h2>
        </div>

        <form class="form" action="/register" method="post">
        @csrf

            <div class="form-group">
                <div class="form__group-title">
                    <span class="form__label-item">お名前</span>
                </div>
                <div class="form__group-content">                
                    <input type="text" name="name" placeholder="例：山田　太郎" value="{{ old('name') }}" class="textbox">
                </div>
                <div class="form-error">
                    @error('name')
                        {{ $message }} 
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="form__group-title">
                    <span class="form__label-item">メールアドレス</span>
                </div>
                <div class="form__group-content">                
                    <input type="text" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" class="textbox">
                </div>
                <div class="form-error">
                    @error('email')
                        {{ $message }} 
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <div class="form__group-title">
                    <span class="form__label-item">パスワード</span>
                </div>
                <div class="form__group-content">                
                    <input type="password" name="password" placeholder="例：coachtech1106" value="{{ old('password') }}" class="textbox">
                </div>
                <div class="form-error">
                    @error('password')
                        {{ $message }} 
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="form__group-title"></div>
                <div class="form__group-content">
                    <button class="form__button-submit" type="submit">登録</button>
                </div>
            </div>

        </form>
    </div>
@endsection
