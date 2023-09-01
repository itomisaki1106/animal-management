@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>トップページ</h1>
@stop

@section('content')
    <p>新しい家族を見つけましょう</p>
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
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
                                <th>年齢</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{config('auth.gender')[$item->gender] ?? ''}}</td>
                                    <td>{{config('auth.type')[$item->type] ?? ''}}</td>
                                    <td>{{config('auth.recruite')[$item->recruitement] ?? ''}}</td>
                                    <!-- <td><a href="{{ url('items/edit/{$item->id}')}}">編集・削除</a></td> -->
                                    <td><a href="items/edit/{{$item->id}}">編集・削除</a></td>
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
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
