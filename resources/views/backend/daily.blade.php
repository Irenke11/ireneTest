@extends('layouts.blank')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">  
                <th>新增日結算</th>
                <div class="card-body">
                
                    <form action="/POST/addDaily" method="POST">
                        {{ csrf_field() }}
                        请输入time:<input type="date" name="betsDay">
                        <br><button type="submit" >結算</button>
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
                <th>搜寻日結算</th>
                <div class="card-body">
                    <form action="/POST/searchDaily" method="POST" >
                        @csrf
                        搜寻：
                        <br>  
                        请输入time:<input type="date" name="search">
                        <button type="submit" >go</button>
                    </form>   
                    <br>
                    {{ $searchDailyInfo}}
                </div>
                <br>
            </div>
        </div>
    </div>
 
</div>
@endsection