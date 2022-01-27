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
                    <p>最大周波数：</p>
                    <p>最大周波数平均：</p>
                    <p>まだ測ってない方はこちら↓↓</p>
                    <a href="{{ route('explain') }}">最大周波数、最大周波数平均を測る・登録する</a>
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
                    <p>マッチング相手を選択</p><select name="" id="" value="マッチング相手を選択"></select>
                    <p>この人との会話の周波数を測る↓↓</p>
                    <a href="{{ route('explain') }}">最大周波数、最大周波数平均を測る・登録する</a>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
