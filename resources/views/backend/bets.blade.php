@extends('layouts.blank')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">  
                <th>新增註單</th>
                <div class="card-body">
                
                    <form action="/POST/addBet" method="POST">
                        {{ csrf_field() }}
                        <br>gameId:<input required  type="text" value="2001" name="gameId">
                        <br>playerId: <input required  type="text" value="1001" name="playerId">
                        <br>amount:<input required  type="text" value="10" name="amount">
                        <br>payout:<input required  type="text" value="5" name="payout">
                        <br>bureauNo:<input required  type="text" value="5004" name="bureauNo">
                        <br>betTime:<input required  type="text" value="{{now()}}" name="betTime">
                        <br><button type="submit" >add Game</button>
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
                <br>
                <th>搜寻註單</th>
                <div class="card-body">
                    <form action="/POST/searchBets" method="POST" >
                        @csrf
                        搜寻：
                        <br>
                        请输入time:<input type="datetime-local" name="search[start]"> to <input type="datetime-local" name="search[end]">
                        <button type="submit" >go</button>
                        <br>
                        请输入局號:<input type="text" name="search[bureauNo]" text="请输入局號">
                        <button type="submit" >go</button>
                    </form>   
                    <br>
                    {{ $searchBetsInfo}}
                </div>
                <br>
            </div>
        </div>
    </div>
 
</div>
@endsection