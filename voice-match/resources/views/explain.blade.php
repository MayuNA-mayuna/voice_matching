@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>①録音する=>②計測・登録する</h2>
            <div class="mt-5">
                <a class="btn-info p-2" href="{{ url('/top') }}">録音する</a>
            </div>
            <div class="mt-5">
                <a class="btn-info p-2" href="{{ route('upload') }}">ファイルデータのアップロード</a>
            </div>
            <div class="mt-5">
                <a class="btn-info p-2" href="{{ route('analyze') }}">計測・登録する</a>
            </div>
        </div>
    </div>
</div>
@endsection
