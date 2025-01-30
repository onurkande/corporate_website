@extends('layouts.dynamic')
@section('title','INFO BOX')
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
            <h4>Info Box</h4>
        </div>
        <div class="card-body">
            @if($record)
                <form method="post" action="{{route('InfoBox-update')}}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$record->title}}">
                        </div>
                    </div>

                    <br>

                    @php
                        $images = json_decode($record->images);
                    @endphp

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">image :</label>
                            @if($images)
                                @foreach($images as $key => $image)
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="{{ route('infoBox-image-delete', $key) }}"><button class="btn-danger" type="button">Sil</button></a>
                                        </div>
                                        <div class="col-md-11">
                                            <img src="{{ asset('admin/infoBoxImage/' . $image) }}" alt="Info Box Image" class="img-fluid">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <br>
                            <input type="file" name="image[]" class="form-control">
                            <section id="more-image">
                            </section>
                            <br>
                            <div>
                                <a onclick="addImage()"><button type="button">+</button></a>
                                <a onclick="removeImage()"><button type="button">-</button></a>
                            </div>
                        </div>
                    </div>
                
                    <br>
                
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Güncelle</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('InfoBoxAllDelete')}}"><button class="btn-danger btn-lg" type="button">Info Box Delete</button></a>
                        </div>
                    </div>
                </form>                
            @else
                <form method="post" action="{{route('InfoBox-update')}}" enctype="multipart/form-data">
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
                            <label for="">image :</label>
                            <input type="file" name="image[]" class="form-control">
                            <section id="more-image">
                            </section>
                            <br>
                            <div>
                                <a onclick="addImage()"><button type="button">+</button></a>
                                <a onclick="removeImage()"><button type="button">-</button></a>
                            </div>
                        </div>
                    </div>
                    
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
        function addImage()
        {
            const moreImage = document.getElementById('more-image');
            const image = document.createElement("div");
            image.innerHTML = '<div><input type="file" name="image[]" class="form-control"></div>';
            moreImage.appendChild(image);
        }

        function removeImage()
        {
            const imagesSection = document.getElementById("more-image");
            const lastImage = imagesSection.querySelector("div:last-child");
            lastImage.parentElement.removeChild(lastImage);
        }
    </script>
@endsection