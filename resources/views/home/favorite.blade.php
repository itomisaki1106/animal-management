@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>トップページ</h1>
@stop

@section('content')
    <p>お気に入り一覧</p>
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
