@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>トップページ</h1>
@stop

@section('content')
    <p>新しい出会いをサポートします</p>
    <div class="container">
            
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
        
    </div>
@stop



@section('content')
    <p>新しい家族を見つけましょう</p>
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">一覧画面</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                                <!-- 並び替え　絞り込みボタン -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>名前</th>
                                <th>性別</th>
                                <th>種別</th>
                                <th>年齢(推定)</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                    <div class="image-view">
                                    @if(isset($item->image))
                                    <img src="data:image/png;base64, {{ $item->image }}" alt="商品画像" class="">
                                    @endif
                                    </div>
                                    </td>

                                    <td>{{ $item->name }}</td>
                                    <td>{{config('auth.gender')[$item->gender] ?? ''}}</td>
                                    <td>{{config('auth.type')[$item->type] ?? ''}}</td>
                                    <td>{{ $item->age }}</td>
                                    <!-- <td><a href="{{ url('items/edit/{$item->id}')}}">編集・削除</a></td> -->
                                    <td><a href="/home/detail/{{$item->id}}">詳細</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
