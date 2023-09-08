@extends('adminlte::page')

@section('title', '個体登録')

@section('content_header')
    <h1>個体登録</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        
                            <div class="col-6 form-group">
                                <label for="name">名前</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ old('name') }}">
                            </div>
                            <div class="parent">
                                <div class="col-4 form-group inline-block-selectSize">
                                    <label for="type">種別</label>
                                    <select name="type" id="type" class="form-control">
                                        @foreach(config('auth.type') as $key => $value)
                                        <option value="{{$key}}" @if($key==old('type'))selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4 form-group inline-block-selectSize">
                                    <label for="gender">性別</label>
                                    <select name="gender" id="" class="form-control">
                                        @foreach(config('auth.gender') as $key => $value)
                                        <option value="{{$key}}"@if($key==old('gender'))selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="parent">
                                <div class="col-4 form-group inline-block-selectSize">
                                    <label for="age">年齢(推定)</label>
                                    <input type="number" class="form-control" id="age" name="age" placeholder="名前" value="{{ old('age') }}">
                                </div>

                                <div class="col-4 form-group inline-block-selectSize">
                                    <label for="health">健康状態</label>
                                    <select name="health" id="" class="form-control">
                                        @foreach(config('auth.hc') as $key => $value)
                                        <option value="{{$key}}"@if($key==old('health'))selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 form-group">
                                <label for="recruite">募集状況</label>
                                <select name="recruite" id="" class="form-control">
                                    @foreach(config('auth.recruite') as $key => $value)
                                    <option value="{{$key}}"@if($key==old('recruite'))selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="detail">詳細</label>
                                <textarea cols="20" rows="5" class="form-control" id="detail" name="detail" placeholder="詳細説明">{{ old('detail') }}</textarea>
                            </div>

                            <div class="form-group"> 
                                <label for="image">画像</label>
                                <!-- <input type="file" name="image" id="image" accept="image/jpeg, image/png"> -->
                                <input type="file" name="image" id="image" class="col-4 form-control">
                            </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
@stop
