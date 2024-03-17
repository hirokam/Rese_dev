<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/qr_code.css') }}">
</head>
<body>
    <div class="body__all">
        <div class="qr-code__frame">
            <div class="shop-name__frame">
                <span class="shop-name">{{$reservation_info->shop->shop_name}}</span><span class="shop-name__after">予約者情報QRコード</span>
            </div>
            <div class="qr-code__inner-frame">
                <div class="qr-code">{!! QrCode::generate(url('$reservation_info->user->name')) !!}</div>
            </div>
            <a href="/mypage" class="cancel">キャンセル</a>
        </div>
    </div>
</body>
</html>