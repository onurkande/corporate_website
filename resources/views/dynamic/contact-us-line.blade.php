@extends('layouts.dynamic')
@section('title','CONTACT US LİNE')
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
            <h4>Contact Us Line</h4>
        </div>
        <div class="card-body">

                @if($record)
                    <form action="{{url('dashboard/dynamic-edit/ContactUsLine-update/'.$record->id)}}" method="post">
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
                                <label for="">Number :</label>
                                <input type="text" name="number" class="form-control" value="{{$record->number}}">
                            </div>
                        </div>

                        <br>
                        
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Güncelle</button>
                            </div>
                            <div class="col-md-4">
                                <a href="{{url('dashboard/dynamic-edit/ContactUsLine-delete/'.$record->id)}}"><button class="btn-danger btn-lg" type="button">Contact Us Line Delete</button></a>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="{{url('dashboard/dynamic-edit/ContactUsLine-insert')}}" method="post">
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
                                <label for="">Number :</label>
                                <input type="text" name="number" class="form-control">
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