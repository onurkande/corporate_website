@extends('layouts.dynamic')
@section('title','SERVİCE DETAİL')
@section('content')
    @if($record)
        <form method="post" action="ServiceDetail-update">
            @csrf
            <label>title</label>
            <input type="text" name="title" value="{{$record->title}}"><br>
            <label>content</label>
            <input type="text" name="content" value="{{$record->content}}"><br>
            <input type="submit" value="güncelle">
        </form>
    @else
        <form method="post">
            @csrf
            <label>title</label>
            <input type="text" name="title"><br>
            <label>content</label>
            <input type="text" name="content"><br>
            <input type="submit" value="kaydet">
        </form>
    @endif
@endsection