@extends('adminlte::page')

@section('title', '編集画面')

@section('content_header')
    <h1>個体番号：{{ $items->id }} の編集</h1>
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

            <div class="body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="col-6 form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$items->name) }}">
                        </div>
                        <div class="parent">
                            <div class="col-4 form-group inline-block-selectSize">
                                <label for="type">種別</label>
                                <select name="type" id="" class="form-control">
                                    @foreach(config('auth.type') as $key => $value)
                                    <option value="{{$key}}" @if($key == old('type',$items->type))selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 form-group inline-block-selectSize">
                                <label for="gender">性別</label>
                                <select name="gender" id="" class="form-control">
                                    @foreach(config('auth.gender') as $key => $value)
                                    <option value="{{$key}}" @if($key == old('gender',$items->gender))selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="parent">
                            <div class="col-4 form-group inline-block-selectSize">
                                <label for="age">年齢(推定)</label>
                                <input type="number" class="form-control" id="age" name="age" value="{{ old('age',$items->age) }}">
                            </div>

                            <div class="col-4 form-group inline-block-selectSize">
                                <label for="health">健康状態</label>
                                <select name="health" id="" class="form-control">
                                    @foreach(config('auth.hc') as $key => $value)
                                    <option value="{{$key}}" @if($key == old('health',$items->healthCondition))selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="recruite">募集状況</label>
                            <select name="recruite" id="" class="form-control">
                                @foreach(config('auth.recruite') as $key => $value)
                                <option value="{{$key}}" @if($key == old('recruite',$items->recruitement))selected @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <textarea cols="20" rows="5" class="form-control" id="detail" name="detail">{{ old('detail',$items->detail) }}</textarea>
                        </div>

                        <div class="form-group"> 
                            <label for="image">登録されている画像</label>
                            <div class = "form-group image-view">
                                @if(isset($items->image))
                                <img src="data:image/png;base64, {{ $items->image }}" alt="商品画像" class="card-img-top">
                                @else
                                <img src="/images/no_image.png" alt="画像はありません" class="card-img-top">
                                @endif
                            </div>
                            <label for="image">画像ファイルアップロード</label>
                            <!-- <input type="file" name="image" id="image" accept="image/jpeg, image/png"> -->
                            <input type="file" name="image" id="image" class="col-4 form-control">
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-primary">変更して保存</button>
                    </div>
                </form>
                <form class="text-center mt-3" action="{{ url('items/imagedelete') }}" method="POST">
                @csrf
                    <input type="hidden" name="id" value="{{ $items->id }}" >
                    <button class="btn btn-success">画像のみ削除する</button>
                </form>
                <form  class="text-center mt-3" action="{{ url('items/delete')}}" method="POST">
                @csrf
                    <input type="hidden" name="id" value="{{ $items->id }}" >
                    <button type="submit" class="btn btn-danger">データ削除(削除したデータは戻りません) </button>
                </form>
                
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
@stop
