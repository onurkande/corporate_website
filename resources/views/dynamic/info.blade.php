@extends('layouts.dynamic')
@section('title','OUR SERVİCES')
@section('content')
    @if($record)
        <form method="post" action="info-update">
            @csrf
            <label>title</label>
            <input type="text" name="title" value="{{$record->title}}"><br>
            <label>bigtitle</label>
            <input type="text" name="bigtitle" value="{{$record->bigtitle}}"><br>
            <label>content</label>
            <input type="text" name="content" value="{{$record->content}}"><br>
            <input type="submit" value="güncelle">
        </form>
    @else
        <form method="post">
            @csrf
            <label>title</label>
            <input type="text" name="title"><br>
            <label>bigtitle</label>
            <input type="text" name="bigtitle"><br>
            <label>content</label>
            <input type="text" name="content"><br>
            <input type="submit" value="kaydet">
        </form>
    @endif
@endsection