@extends('layouts.dynamic')
@section('title','CONTACT US LİNE')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($record)
                    <form action="ContactUsLine-update" method="post">
                        @csrf
                        <input type="text" name="title" value="{{$record->title}}">
                        <input type="text" name="number" value="{{$record->number}}">
                        <br>
                        <input type="submit" value="güncelle">
                    </form>
                @else
                    <form method="post">
                        @csrf
                        <input type="text" name="title">
                        <br>
                        <input type="text" name="number">
                        <br>
                        <input type="submit" value="kaydet">
                    </form>
                @endif
		        
            </div>
        </div>
    </div>
@endsection