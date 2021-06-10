@extends('layouts.blank')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- 新增游戏 -->   
                <th>新增游戏</th>
                <div class="card-body">
                
                    <form action="/POST/addGame" method="POST">
                        {{ csrf_field() }}
                         <br>gameType:
                         <select name="gameType">
                            @foreach($gameTypeList as $typeName)
                            <option value="{{$typeName}}" >{{ __('games.'.$typeName) }}</option>
                            @endforeach
                         </select>
                         <br>gameName:
                         <br>cn：<input required  type="text" value="cn" name="gameName[cn]">
                         <br>en：<input required  type="text" value="en" name="gameName[en]">
                         <br>tw：<input required  type="text" value="tw" name="gameName[tw]">
                         <br>status: 
                         开启<input type="radio"  name="status" value="1" checked>
                         关闭<input type="radio"  name="status" value="0">
                         <br>
                         <button type="submit" >add Game</button>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <br>
                </div>
                <!-- 搜寻游戏 -->

                <br>
                <th>搜寻游戏</th>
                <div class="card-body">
                    <form action="/POST/searchGames" method="POST" >
                        @csrf
                        搜寻：
                        <input type="text" name="search" text="请输入codeName/gameName/gameType">
                        <button type="submit" >go</button>
                    </form>   
                    <br>
                    {{ $searchGameInfo}}
                </div>
                <br>
                <th>编辑游戏</th>
                <div class="card-body">
                    <form action="/POST/editGames" method="POST" >
                        @csrf
                        <input type="text" name="codeName" text="请输入codeName">
                        <br>
                        要修改的内容：
                        <select name="gameType">
                            @foreach($gameTypeList as $typeName)
                            <option value="{{$typeName}}" >{{ __('games.'.$typeName) }}</option>
                            @endforeach
                         </select>
                         <br>gameName:
                         <br>cn：<input required  type="text" value="cn" name="gameName[cn]">
                         <br>en：<input required  type="text" value="en" name="gameName[en]">
                         <br>tw：<input required  type="text" value="tw" name="gameName[tw]">
                         <br>status: 
                         开启<input type="radio"  name="status" value="1" checked>
                         关闭<input type="radio"  name="status" value="0">
                        <button type="submit" >go</button>
                    </form>   
                </div>
            </div>
        </div>
    </div>
 
</div>
@endsection