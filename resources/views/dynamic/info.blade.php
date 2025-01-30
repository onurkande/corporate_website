@extends('layouts.dynamic')
@section('title','OUR SERVİCES')
@section('content')
    @if(session()->has('store'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('store') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    </script>
    @endif

    @if(session()->has('update'))
    <div class="alert alert-info" role="alert">
        {{ session()->get('update') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    </script>
    @endif

    @if(session()->has('delete'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('delete') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    </script>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>Info Row</h4>
        </div>
        <div class="card-body">
            @if($record)
                <form method="post" action="{{route('info-update')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$record->title}}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="bigtitle" class="form-control" placeholder="bigtitle" value="{{$record->bigtitle}}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            <input type="text" name="content" class="form-control" placeholder="Content" value="{{$record->content}}">
                        </div>
                    </div>

                    <br>
                    
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Güncelle</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('info-delete')}}"><button class="btn-danger btn-lg" type="button">Info Delete</button></a>
                        </div>
                    </div>
                </form>
            @else
                <form method="post" action="{{route('info-update')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="bigtitle" class="form-control" placeholder="bigtitle">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            <input type="text" name="content" class="form-control" placeholder="Content">
                        </div>
                    </div>

                    <br>
                    
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Kaydet</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection