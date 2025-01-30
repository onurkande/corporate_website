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
            <h4>Our Services</h4>
        </div>
        <div class="card-body">
            @if($record)
                <form method="post" action="{{route('our-services-update')}}">
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
                            <label for="">Content :</label>
                            <input type="text" name="content" class="form-control" placeholder="content" value="{{$record->content}}">
                        </div>
                    </div>

                    <br>

                    @php
                        $content_rows = json_decode($record->content_rows);
                    @endphp

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Content Rows :</label>
                            @if($content_rows)
                                @foreach($content_rows as $key => $content_row)
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="{{ route('our-services-content-row-delete', $key) }}"><button class="btn-danger" type="button">Sil</button></a>
                                        </div>
                                        <div class="col-md-11">
                                            <input type="text" name="content_rows[]" class="form-control" placeholder="content_rows" value="{{$content_row}}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <section id="more-content_rows">
                            </section>
                            <br>
                            <div>
                                <a onclick="addContentRow()"><button type="button">+</button></a>
                                <a onclick="removeContentRow()"><button type="button">-</button></a>
                            </div>
                        </div>
                    </div>

                    <br>
                    
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Güncelle</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('our-services-allDelete')}}"><button class="btn-danger btn-lg" type="button">Our Services Delete</button></a>
                        </div>
                    </div>
                </form>
            @else
                <form method="post" action="{{route('our-services-update')}}">
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
                            <label for="">Content :</label>
                            <input type="text" name="content" class="form-control" placeholder="content">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Content Rows :</label>
                            <input type="text" name="content_rows[]" class="form-control" placeholder="content_rows">
                            <section id="more-content_rows">
                            </section>
                            <br>
                            <div>
                                <a onclick="addContentRow()"><button type="button">+</button></a>
                                <a onclick="removeContentRow()"><button type="button">-</button></a>
                            </div>
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
        
    <script>
        function addContentRow() {
            let contentRow = `<input type="text" name="content_rows[]" class="form-control" placeholder="content_rows">`;
            $('#more-content_rows').append(contentRow);
        }

        function removeContentRow() {
            $('#more-content_rows input:last-child').remove();
        }
    </script>
@endsection