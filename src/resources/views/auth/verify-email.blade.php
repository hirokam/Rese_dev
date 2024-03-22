@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="content__frame">
        <div class="message-space">
            <span class="message">会員登録ありがとうございます。登録されたメールアドレスに確認用メールを送信しましたので、ブラウザの閉じるボタンでこの画面を閉じてメールアドレスの確認を行ってから再度ログインしてください。</span>
        </div>
    </div>
@endsection