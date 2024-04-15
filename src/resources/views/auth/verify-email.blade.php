@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="verify-content__frame">
        <div class="verify-message-space">
            <p class="message">会員登録ありがとうございます。<br />登録されたメールアドレスに確認用メールを送信しましたので、ブラウザの閉じるボタンでこの画面を閉じてメールアドレスの確認を行ってから再度ログインしてください。</p>
        </div>
    </div>
@endsection