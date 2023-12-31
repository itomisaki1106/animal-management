@extends('adminlte::page')

@section('title', '個体一覧')

@section('content_header')
    <h1>個体一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">個体一覧画面</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">個体登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>性別</th>
                                <th>種別</th>
                                <th>お気に入り登録状況</th>
                                <th>募集状況</th>
                                <th>登録日時</th>
                                <th>更新日時日時</th>
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
                                    <td>{{ $item->likes_count }}</td>
                                    <td>{{config('auth.recruite')[$item->recruitement] ?? ''}}</td>
                                    <!-- <td><a href="{{ url('items/edit/{$item->id}')}}">編集・削除</a></td> -->
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td><a href="items/edit/{{$item->id}}">編集・削除</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$items->appends(request()->query())->links('pagination::bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
