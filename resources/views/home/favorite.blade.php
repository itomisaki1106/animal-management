@extends('adminlte::page')

@section('title', 'お気に入り一覧')

@section('content_header')

@stop

@section('content')
    <div class="topPage text-center pt-4 pb-4">
        <p>譲渡のご相談承ります。お気軽にお問い合わせください</p>
    </div>    
    <div class="container">
            
        
        @if($items->count() == 0)
        <div class="noItems text-center mt-5 mb-5">
        <h4>お気に入り登録された猫はいません</h4>
        <p>詳細ページよりお気に入り登録してみてください</p>
        </div>
        @else
        <div class="row justify-content-start">
            @foreach ($items as $item)    
            <div class="col-3">
                <div class="card h-100">
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
                        <br>
                        <a href="/home/detail/{{$item->id}}">詳細はこちら</a>
                    @else
                        <a href="/home/detail/{{$item->id}}">詳細はこちら</a>
                        <p>募集を停止・終了しています。下記よりお問い合わせください</p>
                    @endif
                    
                    </div>
                </div>                    
            </div>
            @endforeach
        @endif
        </div>
    <div class="pageBottom text-center mt-4">
            <h5>＜お問い合わせ先＞</h5>
            <p>株式会社CATIS</p>
            <p>E-mai:XXX@XXX  Tel:000-000-0000</p>
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
