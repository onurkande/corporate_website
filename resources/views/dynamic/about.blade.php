@extends('layouts.dynamic')
@section('title','ABOUT')
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
    <div class="card" style="padding: 0">
        <div class="card-header">
            <h4>About</h4>
        </div>
        <div class="card-body">
                @if($record)
                    <form action="{{url('dashboard/dynamic-edit/about-update/'.$record->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Title :</label>
                                <input type="text" name="title" class="form-control" value="{{$record->title}}">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Content :</label>
                                <textarea type="text" cols="30" rows="4" name="content" class="form-control">{{$record->content}}</textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Button :</label>
                                <input type="text" name="button" class="form-control" value="{{$record->button}}">
                            </div>
                        </div>
                        
                        <br>

                        <div class="row">
                            <label for="">Image :</label>
                            <div class="col-md-4">
                                <img src="{{asset('admin/aboutImage/'.$record->image)}}" width="300" style="margin-bottom: 1rem">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row mt-3">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Güncelle</button>
                            </div>
                            <div class="col-md-4">
                                <a href="{{url('dashboard/dynamic-edit/about-delete/'.$record->id)}}"><button class="btn-danger btn-lg" type="button">About Delete</button></a>
                            </div>
                        </div>
                    </form>
                @else
                    <form method="post" action="{{url('dashboard/dynamic-edit/about-insert')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Title :</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Content :</label>
                                <textarea type="text" cols="30" rows="4" name="content" class="form-control"></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Button :</label>
                                <input type="text" name="button" class="form-control">
                            </div>
                        </div>
                        
                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Image :</label>
                                <input type="file" name="image" class="form-control">
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