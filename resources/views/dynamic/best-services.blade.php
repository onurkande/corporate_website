@extends('layouts.dynamic')
@section('title','BEST SERVİCES')
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
            <h4>Best Services</h4>
        </div>
        <div class="card-body">

            @if($record)
                <form method="post" enctype="multipart/form-data" action="{{url('dashboard/dynamic-edit/bestServices-update/'.$record->id)}}">
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
                            <input type="text" name="content" class="form-control" value="{{$record->content}}">
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
                            
                        <div class="col-md-6">
                            <label>Header :</label>
                            @php
                                $header = json_decode($record->header, TRUE);
                            @endphp
                            <div class="row">
                                @foreach($header as $single)
                                <div class="col-md-1">
                                    <a href="{{url('dashboard/dynamic-edit/bestServices-delete/'.$single)}}"><button class="btn-danger" type="button">Sil</button></a>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="header[]" class="form-control" value="{{$single}}" oninput="checkInputRowsValues()">
                                </div>
                                @endforeach
                            </div>
                            <section id="more-header">
                            </section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @php
                                $images = json_decode($record->image, TRUE);
                            @endphp
                            @foreach($images as $index => $single)
                                <img src="{{asset('admin/bestServicesImage/'.$single)}}" width="300">
                                <input type="file" name="image[]" class="form-control" style="margin-bottom: 1rem">
                                <input type="hidden" name="old_image[{{$index}}]" value="{{$single}}">
                            @endforeach
                            <section id="more-paragraph">
                            </section>
                        </div>
                    
                    </div>

                    <br>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Update</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{url('dashboard/dynamic-edit/allAboutRow-delete/'.$record->id)}}"><button class="btn-danger btn-lg" type="button">About Row Delete</button></a>
                        </div>
                    </div>
                </form>

            @else
                <form method="post" enctype="multipart/form-data" action="{{url('dashboard/dynamic-edit/best-services-insert')}}">
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
                            <input type="text" name="content" class="form-control">
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
                        <div class="col-md-6">
                            <label>Header :</label>
                            <input type="text" name="header[]" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-header">
                            </section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <label>Image :</label>
                            <input type="file" name="image[]" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-image">
                            </section>
                        </div>
                    </div>

                    <br>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Submit</button>
                        </div>
                    </div>
                </form>
            @endif

        </div>
    </div>

    <script>
        function addRows() 
        {
            const moreHeader = document.getElementById('more-header');
            const moreImage = document.getElementById('more-image');

            const headerRow = document.createElement("div");
            headerRow.innerHTML = '<input type="text" class="form-control" name="header[]" oninput="checkInputRowsValues()" required>';
            moreHeader.appendChild(headerRow);

            const imageRow = document.createElement("div");
            imageRow.innerHTML = '<input type="file" class="form-control" name="image[]" oninput="checkInputRowsValues()" required>';
            moreImage.appendChild(imageRow);
        }

        function removeRows() 
        {
            const headerSection = document.getElementById("more-header");
            const imageSection = document.getElementById("more-image");

            if (headerSection.children.length > 0) {
                headerSection.removeChild(headerSection.lastElementChild);
            }

            if (imageSection.children.length > 0) {
                imageSection.removeChild(imageSection.lastElementChild);
            }
        }

        function checkInputRowsValues() 
        {
            const headerInputs = document.querySelectorAll('input[name="header[]"]');
            const imageInputs = document.querySelectorAll('input[name="image[]"]');

            headerInputs.forEach((headerInput, index) => {
                const imageInput = imageInputs[index];

                if (headerInput.value !== '' && imageInput.value === '') {
                    imageInput.setCustomValidity('Please fill in the image');
                } else if (headerInput.value === '' && imageInput.value !== '') {
                    headerInput.setCustomValidity('Please fill in the header');
                } else {
                    headerInput.setCustomValidity('');
                    imageInput.setCustomValidity('');
                }
            });
        }
    </script>
@endsection