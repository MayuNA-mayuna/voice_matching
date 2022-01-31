@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    {{ Auth::user()->name }}と{{$items->name}}のマッチング率は<span class="display-4">{{ (Auth::user()->max_average_f + $items->max_average_f) /10}}%</span>です！
    </div>
</div>
@endsection
