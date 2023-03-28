@extends('layouts.dynamic')
@section('title','ABOUT')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
		        
                @if($record)
                    <form action="about-update" method="post" enctype="multipart/form-data">
                        @csrf
                        <label>title</label>
                        <input type="text" name="title" value="{{$record->title}}">
                        <br>
                        <label>content</label>
                        <input type="text" name="content" value="{{$record->content}}">
                        <br>
                        <label>button</label>
                        <input type="text" name="button" value="{{$record->button}}">
                        <br>
                        <label>image</label>
                        <img style="width:250px"  src="{{ asset('images/' . $record->image) }}">
                        <input type="file" name="image">
                        <br>
                        <input type="submit" value="güncelle">
                    </form>
                @else
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <label>title</label>
                        <input type="text" name="title">
                        <br>
                        <label>content</label>
                        <input type="text" name="content">
                        <br>
                        <label>button</label>
                        <input type="text" name="button">
                        <br>
                        <label>image</label>
                        <input type="file" name="image">
                        <br>
                        <input type="submit" value="kaydet">
                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection