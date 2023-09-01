@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>個体編集</h1>
    <p>個体番号：{{ $items->id }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$items->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select name="type" id="" class="form-control">
                                @foreach(config('auth.type') as $key => $value)
                                <option value="{{$key}}" @if($key == old('type',$items->type))selected @endif>{{$value}}</option>
                                @endforeach
                                @foreach(config('auth.type') as $key => $value)
                                <option value="{{$key}}" @if($key == old('type',$items->type))selected @endif>{{$value}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender">性別</label>
                            <select name="gender" id="" class="form-control">
                                @foreach(config('auth.gender') as $key => $value)
                                <option value="{{$key}}" @if($key == old('gender',$items->gender))selected @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="age">年齢(推定)</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ old('name',$items->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="health">健康状態</label>
                            <select name="health" id="" class="form-control">
                                @foreach(config('auth.hc') as $key => $value)
                                <option value="{{$key}}" @if($key == old('health',$items->healthCondition))selected @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recruite">募集状況</label>
                            <select name="recruite" id="" class="form-control">
                                @foreach(config('auth.recruite') as $key => $value)
                                <option value="{{$key}}" @if($key == old('recruite',$items->recruitement))selected @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <textarea class="form-control" id="detail" name="detail">{{ old('detail',$items->detail) }}</textarea>
                        </div>

                        <div class="form-group"> 
                            <label for="image">画像</label>
                            <!-- <input type="file" name="image" id="image" accept="image/jpeg, image/png"> -->
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">変更して保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
