
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <div class="container" style="">
        <div class="row pt-3">
            <div class="col-6">
                <p>＼ よろしくね ／</p>
                @if(isset($items->image))
                <img src="data:image/png;base64, {{ $items->image }}" alt="商品画像" class="form-control img-fluid border-success" style="width: 500px;">
                @else
                <p>画像は登録されていません</p>
                @endif
                <br>
                <ul style="list-style: none;">
                <li>登録日：@if(!empty($items->created_at)) {{$items->created_at->format('Y年 n月 j日 h時 m分')}} @else 未登録 @endif</li>
                <li>更新日：@if(!empty($items->updated_at)) {{$items->updated_at->format('Y年 n月 j日 h時 m分')}} @else 未登録 @endif</li>        
                </ul>
            </div>
            <div class="col-6">
                <div class="border-bottom border-success" style="max-width: 500px;">
                    <p style="font-size: 30px; font-weight:bold;">{{$items->name}}</p>
                </div><br>
                <div class="border-bottom border-success" style="max-width: 500px;">
                    【　年齢　】<br>
                    <ul style="list-style: none;">
                        {{$items->age}} 才(推定)
                    </ul>
                </div><br>
                <div class="border-bottom border-success" style="max-width: 500px;">
                    【　詳細情報　】<br>
                    <ul style="list-style: none;">
                        <li>性別：{{ config('auth.gender')[$items->gender] }}</li>
                        <li>種別：{{ config('auth.type')[$items->type] }}</li>
                        <li>健康状態：{{ config('auth.hc')[$items->healthCondition] }}</li>  
                    </ul>
                </div><br>
                <div class="border-bottom border-success" style="max-width: 500px;">
                    【　コメント　】<br>
                    <ul style="list-style: none; white-space: pre-line">
                        <li>{{$items->detail}}</li>
                    </ul>
                </div>
            </div>
            <div class="link text-center">
                @if($like)
                    <form action="/like/unlike/{{$items->id}}" method="GET">
                    <input type="hidden" value="{{ $items->id }}" name="item_id">
                    <button type="submit" class="btn btn-primary">お気に入りから削除</button>
                    </form>
                @else
                    <form action="/like/like/{{$items->id}}" method="GET">
                    <input type="hidden" value="{{ $items->id }}" name="item_id">
                    <button type="submit" class="btn btn-secondary">お気に入りに登録</button>
                    </form>
                @endif
                <br>
                <a href="/home/list" class="link-success">商品一覧へ戻る</a>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
@stop
