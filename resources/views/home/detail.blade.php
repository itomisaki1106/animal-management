
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>トップページ</h1>
@stop

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- style sheets -->
    <link rel="stylesheet" href="{{ asset('css/search/searchderail.css') }}">

    <title>詳細画面</title>
  </head>
  <body>
   
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-4">
                @if(isset($items->image))
                <img src="data:image/png;base64, {{ $items->image }}" alt="商品画像" class="form-control img-fluid border-success" style="width: 500px;">
                @else
                <p>画像は登録されていません</p>
                @endif
                <br>
            </div>
            <div class="col-8">
                <div class="border-bottom border-success" style="max-width: 500px;">
                    <p style="font-size: 25px; font-weight:bold;">{{$items->name}}</p>
                </div><br>
                <div class="border-bottom border-success" style="max-width: 500px;">
                    【　価格　】<br>
                    <ul style="list-style: none;">
                        <?php
                            $age = $items->age;
                            echo number_format($age);
                            echo " 才(推定)"
                        ?>
                    </ul>
                </div><br>
                <div class="border-bottom border-success" style="max-width: 500px;">
                    【　商品情報　】<br>
                    <ul style="list-style: none;">
                        <li>種別：@if($items->type==1)テニス
                                @elseif($items->type==2)野球
                                @elseif($items->type==3)サッカー
                                @elseif($items->type==4)バスケットボール
                                @elseif($items->type==5)その他
                                @endif</li>
                        <li>商品登録日：@if(!empty($items->created_at)) {{$items->created_at->format('Y年 n月 j日 h時 m分')}} @else 未登録 @endif</li>
                        <li>商品更新日：@if(!empty($items->updated_at)) {{$items->updated_at->format('Y年 n月 j日 h時 m分')}} @else 未登録 @endif</li>
                        <li>直径：{{$items->age}} mm</li>
                        
                    </ul>
                </div><br>
                <div class="border-bottom border-success" style="max-width: 500px;">
                    【　詳細情報　】<br>
                    <ul style="list-style: none; white-space: pre-line">
                        <li>{{$items->detail}}</li>
                    </ul>
                </div><br>
                <!-- <img src="/images/ball_image/0401.png" alt="..." style="width:25px;">   -->
                <a href="/home/" class="link-success">商品一覧へ戻る</a>
                <!-- <img src="/images/ball_image/0401.png" alt="..." style="width:25px;">   -->
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
@stop
