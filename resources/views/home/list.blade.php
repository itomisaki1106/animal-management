@extends('adminlte::page')

@section('title', '募集一覧')

@section('content_header')
@stop

@section('content')
    <div class="topPage text-center pt-4 pb-4">
    <p>CATISの里親募集ページにようこそ</p>
    </div>
    <div class="container">
        @if($items->count() == 0)
            <div class="noItems text-center mt-5 mb-5">
            <h4>現在、里親を募集している猫はいません</h4>
            </div>
        @else    
            <div class="row justify-content-start">
            @foreach ($items as $item)    
            <div class="col-3">
                    
                    <div class="card">
                        <div class="card-body">
                        @if(isset($item->image))
                        <img src="data:image/png;base64, {{ $item->image }}" alt="商品画像" class="card-img-top">
                        @else
                        <img src="/images/no_image.png" alt="画像はありません" class="card-img-top">
                        @endif
                        <p>名前:{{ $item->name }}</p>
                        <p>性別:{{config('auth.gender')[$item->gender] ?? ''}}</p>
                        <p>{{ $item->age }}歳(推定)</p>
                        <a href="/home/detail/{{$item->id}}">詳細はこちら</a>
                        </div>
                    </div>                    
            </div>
            @endforeach
            </div>
        @endif
        {{$items->appends(request()->query())->links('pagination::bootstrap-4')}}
        <div class="pageBottom text-center">
            <h5>＜お問い合わせ先＞</h5>
            <p>株式会社CATIS</p>
            <p>E-mai:XXX@XXX  Tel:000-000-0000</p>
        </div>
    </div>
@stop
@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

@stop


