@extends('layouts.dynamic')
@section('title','FEATURED PROJECT')
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
            <h4>Featured Project</h4>
        </div>
        <div class="card-body">

            @if ($record)
                <form method="post" action="{{url('dashboard/dynamic-edit/featuredProject-update/'.$record->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control" value="{{ $record->title }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Button :</label>
                            <input type="text" name="button" class="form-control" value="{{ $record->button }}">
                        </div>
                    </div>
                
                    <br>

                    <div class="row">
                        @php
                            $headers = json_decode($record->headers, TRUE);
                            $contents = json_decode($record->contents, TRUE);
                            $images = json_decode($record->images, TRUE);
                        @endphp

                        <div class="col-md-4">
                            <label for="">Header :</label>
                            @if($headers)
                                @foreach($headers as $key => $header)
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="{{ route('featuredProject-delete', $key) }}"><button class="btn-danger" type="button">Sil</button></a>
                                        </div>
                                        <div class="col-md-11">
                                            <input type="text" name="header[]" class="form-control" value="{{ $header }}" oninput="checkInputRowsValues()" required>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <section id="more-header">
                            </section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            @if($contents)
                                @foreach($contents as $key => $content)
                                    <input type="text" name="content[]" class="form-control" value="{{ $content }}" oninput="checkInputRowsValues()" required>
                                @endforeach
                            @endif
                            <section id="more-content">
                            </section>
                        </div>
                        <div class="col-md-4">
                            <label for="">Image :</label>
                            @if($images)
                                @foreach($images as $image)
                                    <input type="file" name="image[]" class="form-control" value="{{ $image }}" oninput="checkInputRowsValues()" required>
                                @endforeach
                            @endif
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
            @else
                <form method="post" action="{{url('dashboard/dynamic-edit/featuredProject-insert')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Button :</label>
                            <input type="text" name="button" class="form-control">
                        </div>
                    </div>
                
                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Header :</label>
                            <input type="text" name="header" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-header">
                            </section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            <input type="text" name="content" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-content">
                            </section>
                        </div>
                        <div class="col-md-4">
                            <label for="">Image :</label>
                            <input type="file" name="image" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-image">
                            </section>
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

<script>
    function addRows() 
    {
        const moreHeader = document.getElementById('more-header');
        const moreContent = document.getElementById('more-content');
        const moreImage = document.getElementById('more-image');

        const headerRow = document.createElement("div");
        headerRow.innerHTML = '<input type="text" class="form-control" name="header[]" oninput="checkInputRowsValues()" required>';
        moreHeader.appendChild(headerRow);

        const contentRow = document.createElement("div");
        contentRow.innerHTML = '<input type="text" class="form-control" name="content[]" oninput="checkInputRowsValues()" required>';
        moreContent.appendChild(contentRow);

        const imageRow = document.createElement("div");
        imageRow.innerHTML = '<input type="file" class="form-control" name="image[]" oninput="checkInputRowsValues()" required>';
        moreImage.appendChild(imageRow);
    }

    function removeRows() 
    {
        const headerSection = document.getElementById("more-header");
        const contentSection = document.getElementById("more-content");
        const imageSection = document.getElementById("more-image");

        if (headerSection.children.length > 0) {
            headerSection.removeChild(headerSection.lastElementChild);
        }

        if (contentSection.children.length > 0) {
            contentSection.removeChild(contentSection.lastElementChild);
        }

        if (imageSection.children.length > 0) {
            imageSection.removeChild(imageSection.lastElementChild);
        }
    }

    function checkInputRowsValues() 
    {
        const headerInputs = document.querySelectorAll('input[name="header[]"]');
        const contentInputs = document.querySelectorAll('input[name="content[]"]');
        const imageInputs = document.querySelectorAll('input[name="image[]"]');

        headerInputs.forEach((headerInput, index) => {
            const contentInput = contentInputs[index];
            const imageInput = imageInputs[index];

            if (headerInput.value !== '' && (contentInput.value === '' || imageInput.value === '')) {
                contentInput.setCustomValidity('Please fill in the content');
                imageInput.setCustomValidity('Please select an image');
            } else if (headerInput.value === '' && (contentInput.value !== '' || imageInput.value !== '')) {
                headerInput.setCustomValidity('Please fill in the header');
            } else {
                headerInput.setCustomValidity('');
                contentInput.setCustomValidity('');
                imageInput.setCustomValidity('');
            }
        });
    }
</script>
