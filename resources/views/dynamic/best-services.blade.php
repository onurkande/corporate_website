@extends('layouts.dynamic')
@section('title','BEST SERVİCES')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            @if($record)
                <form action="bestServices-update" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>title</label>
                    <input type="text" name="title" value="{{$record->title}}">
                    <br>
                    <label>content</label>
                    <input type="text" name="content" value="{{$record->content}}">
                    <br>
                    <label>button</label>
                    <input type="text" name="button" value="{{$record->button}}">
                    @if($record->rows != null)
                        @php
                            $rows=json_decode($record->rows, TRUE);
                        @endphp

                        @foreach($rows as $row)
                            <br>
                            <br>
                            <div >
                                <input type="text" name="header[]" value="{{$row['header']}}"><br>
                                <img style="width:250px" src="{{ asset('images/' . $row['image']) }}">
                                <input type="hidden" name="oldImage[]" value="{{$row['image']}}">
                                <input type="file" name="image[]">
                                <a href="{{route('bestServices-delete', ['header'=>$row['header']])}}"> sil </a>
                            </div>
                        @endforeach
                        <hr>
                        <section id="more-rows">

                        </section>
                    @else
                        <label>header</label>
                        <input type="text" name="header[]">
                        <br>
                        <label>image</label>
                        <input type="file" name="image[]">
                        <section id="more-rows">

                        </section>
                    @endif
                    <br>
                    <div>
                         <a onclick="addRows()">+</a>
                        <a onclick="removeRows()">-</a>
                    </div>

                    <!-- Trigger/Open The Modal -->
                <a id="myBtn">Open Modal</a>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                    <span class="close">&times;</span>
                    {{-- <p>Some text in the Modal..</p> --}}

                        @php
                            $images = glob('./storage/images/bestServices/*.*');
                        @endphp
                        @foreach ($images as $image)
                            <img style="width:250px" src="{{ltrim($image, '.')}}">
                            <label>{{ltrim($image, './storage/images/bestServices/')}}</label>
                            <input type="radio" name="radiobutton[]" value="{{ltrim($image, '.')}}">
                            <br>
                        @endforeach
                    </div>
                </div>
                
                <br>
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
                    <label>header</label>
                    <input type="text" name="header">
                    <br>
                    <label>image</label>
                    <input type="file" name="image">
                    <br>
                    <label>button</label>
                    <input type="text" name="button">
                    <br>
                    <input type="submit" value="kaydet">
                    <br>
                    <section id="more-rows">

                    </section>
                </form>
            @endif

            </div>
        </div>
    </div>

    <script>
        function addRows()
        {
            const moreRows = document.getElementById('more-rows');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="text" name="header[]" required><input type="file" name="image[]" required></div>';
            moreRows.appendChild(row);
        }

        function removeRows()
        {
            const rowsSection = document.getElementById("more-rows");
            const lastRows = rowsSection.querySelector("div:last-child");
            lastRows.parentElement.removeChild(lastRows);
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    </script>

    <style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        }

        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }
    </style>
@endsection