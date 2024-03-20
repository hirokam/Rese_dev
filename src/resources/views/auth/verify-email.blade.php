@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="content__frame">
        <div class="message-space">
            <span class="message">会員登録ありがとうございます</span>< /br>
            <span class="message">登録されたメールアドレスに確認用メールを送信しましたので、</span>< /br>
            <span class="message">この画面を閉じてメールアドレスの確認を行い、再度ログインしてください。</span>< /br>
        </div>
        <div class="button-space">
            <form action="/login" method="get">
                <button class="button">ログインする</button>
            </form>
        </div>
    </div>
@endsection