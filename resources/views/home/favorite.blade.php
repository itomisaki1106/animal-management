@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <p>譲渡のご相談承ります。お気軽にお問い合わせください</p>
    <div class="container">
            
        <div class="row justify-content-start">
        @foreach ($items as $item)    
        <div class="col-3">
            <div class="card">
                <div class="card-body {{$item->recruitement==1?'':'active'}}">
                @if(isset($item->image))
                    <img src="data:image/png;base64, {{ $item->image }}" alt="商品画像" class="card-img-top">
                @else
                    <img src="/images/no_image.png" alt="画像はありません" class="card-img-top">
                @endif
                <p>名前:{{ $item->name }}</p>
                <p>性別:{{config('auth.gender')[$item->gender] ?? ''}}</p>
                <p>{{ $item->age }}歳(推定)</p>
                @if($item->recruitement==1)
                    <a href="/home/detail/{{$item->id}}">詳細</a>
                @else
                    <p>募集を停止・終了しています。詳細はお問い合わせください</p>
                @endif
                </div>
            </div>                    
        </div>
        @endforeach
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
@stop
