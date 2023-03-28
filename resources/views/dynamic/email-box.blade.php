@extends('layouts.dynamic')
@section('title','EMAİL BOX')
@section('content')
    @if ($record)
        <form method="post" action="emailBox-update">
            @csrf
            <label>title</label>
            <input type="text" name="title" value="{{$record->title}}"><br>
            <label>content</label>
            <input type="text" name="content" value="{{$record->content}}"><br>
            <label>button</label>
            <input type="text" name="button" value="{{$record->button}}"><br>
            <input type="submit" value="güncelle">
        </form>
    @else
        <form method="post">
            @csrf
            <label>title</label>
            <input type="text" name="title"><br>
            <label>content</label>
            <input type="text" name="content"><br>
            <label>button</label>
            <input type="text" name="button"><br>
            <input type="submit" value="kaydet">
        </form>
    @endif
    
@endsection