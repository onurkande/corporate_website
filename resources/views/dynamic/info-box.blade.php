@extends('layouts.dynamic')
@section('title','TEAM')
@section('content')
    <form method="post">
        @csrf
        <label>title</label>
        <input type="text" name="title"><br>
        <label>file</label>
        <input type="text" name="file"><br>
        <input type="submit" value="kaydet">
    </form>
@endsection