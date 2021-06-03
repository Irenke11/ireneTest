@extends('layouts.blank')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- 新增用户 -->   <th>新增用户</th>
                <div class="card-body">
                    
                    <form action="/POST/addPlayer" method="POST">
                    {{ csrf_field() }}
                         <br>account:<input required  type="text" text="account" value="irene"name="account"> 
                         <br>password:<input required  type="text" text="password" value="123456"name="password">
                         <br>name:<input required  type="text" text="name" value="Irene"name="name">
                         <!-- <br>currency:<input required  type="text" text="currency" value="RMB"name="currency"> -->
                         <br>currency:
                         <select name="currency" id="currency" text>
                            <option value="RMB" >人民币</option>
                            <option value="USD" selected>美金</option>
                            <option value="NTD">台币</option>
                         </select>
                         <br>
                         status: 
                         开启<input type="radio"  name="status" value="1" checked>
                         关闭<input type="radio"  name="status" value="0">
                         <br><button type="submit" >addplayer</button>
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
                    {{ $getAllInfo }}
                </div>
                <!-- 搜寻用户 -->

                <br>
                <th>搜寻用户</th>
                <div class="card-body">
                    <form action="/POST/searchPlayers" method="POST" >
                        @csrf
                        搜寻：
                        <input type="text" name="search" text="请输入Id/Account/Name/Currency">
                        <button type="submit" >go</button>
                    </form>   
                    {{ $searchPlayerInfo}}
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection