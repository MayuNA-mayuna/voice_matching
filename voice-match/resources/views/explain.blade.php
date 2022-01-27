@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>①録音する・登録する=>②計測する</h2>
            <div class="mt-5">
                <!-- ここのリンクの飛ばし方やる -->
                <a class="btn-info p-2" href="{{ url('/top') }}">録音する・登録する</a>
            </div>
            <div class="mt-5">
                <a class="btn-info p-2" href="{{ route('analyze') }}">計測する</a>
            </div>
        </div>
    </div>
</div>
@endsection
