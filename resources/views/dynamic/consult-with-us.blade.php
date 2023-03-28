@extends('layouts.dynamic')
@section('title','CONSULT WİTH US')
@section('content')
    <form method="post">
        @csrf
        <label>title</label>
        <input type="text" name="title">
        <br>
        <label>header</label>
        <input type="text" name="header">
        <br>
        <label>content</label>
        <input type="text" name="content">
        <br>
        <input type="submit" value="kaydet">
    </form>
@endsection