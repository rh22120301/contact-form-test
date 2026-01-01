@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login__content">
        <div class="login__heading">
            <h2>Login</h2>
        </div>
    
        <form class="form" action="/login" method="post">
        @csrf

            <div class="form-group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">                
                    <input type="text" name="email" placeholder="例：test@example.com" value="{{ old('last_name') }}" class="textbox">
                </div>
                <div class="form-error">
                    @error('email')
                        {{ $message }} 
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form__group-title">
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__group-content">                
                    <input type="text" name="password" placeholder="例：coachtech1106" value="{{ old('last_name') }}" class="textbox">
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
                    <button class="form__button-submit" type="submit">ログイン</button>
                </div>
            </div>

        </form>
    </div>
@endsection
