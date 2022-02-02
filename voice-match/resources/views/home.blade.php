@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ Auth::user()->name }}の普段の声</p>
                    <p>最大周波数：{{ Auth::user()->max_f }}</p>
                    <p>最大周波数平均：{{ Auth::user()->max_average_f }}</p>
                    <p>まだ測ってない方はこちら↓↓</p>
                    <a href="{{ route('explain') }}">最大周波数、最大周波数平均を測る・登録する</a>
                </div>


            </div>

            <div class="card mt-5">
                <div class="card-header">相手との音声登録ページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>マッチングしたい相手との会話の周波数を測る↓↓</p>
                    <a href="{{ route('explain2') }}">最大周波数、最大周波数平均を測る・登録する</a>
                </div>


            </div>

            <div class="card mt-5">
                <div class="card-header">マッチングページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>マッチングしたい相手を選択(*自分と相手がそれぞれ音声をアップロードしていることがマッチングを出せる条件となります)</p>
                    @foreach($items as $item)
                            <p>{{$item->name}}</p>
                            <a href="{{ route('match', ['id'=>$item->id]) }}">マッチング率を出す！！</a>
                    @endforeach
                </div>

            </div>
            
        </div>
    </div>
</div>
@endsection
