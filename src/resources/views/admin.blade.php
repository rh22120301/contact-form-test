@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('menu')
    <li class="header__nav-item">
        <form action="/logout" method="post">
        @csrf
            <button class="header__nav-button">logout</button>
        </form>
    </li>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

   <!-- 検索機能 -->
    <div class="search__form-menu">
        <form class="search__form" action="/admin/search" method="get">
            @csrf
            <div class="search__form-item">
                
                <input type="text" name="keyword">

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

                年月日
            </div>

            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </form>
    
        <form action="/admin/reset" method="get">
            <button type="submit">リセット</button>
        </form>

    </div>

    <!-- 一覧テーブル -->
    <div class="admin__table">
        <table class="admin">
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>

            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>{{ $contact->gender }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td>
                    <!-- モーダルウィンドウ用リンク -->
                    <a class="modal-button" href="/admin?modal_id={{ $contact->id }}">詳細</a>
                </td>
            </tr>
            @endforeach
        </table>

        {{ $contacts->links() }}
    </div>

    <!-- モーダルウィンドウ -->
    @if(request('modal_id'))
        @php
            $modal = $contacts->firstWhere('id', request('modal_id'));
        @endphp

        @if($modal)
        <div class="modal-overlay">
            <div class="modal-window">
                <h3>詳細</h3>
      
                <p>名前：{{ $modal->last_name }} {{ $modal->first_name }}</p>
                <p>性別：{{ $modal->gender }}</p>
                <p>メールアドレス：{{ $modal->email }}</p>
                <p>住所：{{ $modal->address }}</p>
                <p>建物名：{{ $modal->building }}</p>
                <p>お問い合わせの種類：{{ $modal->content }}</p>
                <p>内容：{{ $modal->detail }}</p>

                <form class="delete-contact" action="/admin/delete/{{ $modal->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="delete-contact__button">
                        <input type="hidden" name="id" value= "{{ $modal->id }}">
                        <button class="delete-contact__button-submit">削除</button>
                    </div>
                </form>

               
                <a href="/admin" class="modal-close">閉じる</a>
            </div>
        </div>
        @endif
    @endif

</div>
@endsection
