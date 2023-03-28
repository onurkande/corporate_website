@extends('layouts.dynamic')
@section('title','FEATURED PROJECT')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($record)
                    <form action="featuredProject-update" method="post" enctype="multipart/form-data">
                        @csrf

                        <label>title</label>
                        <input type="text" name="title" value="{{$record->title}}">
                        <br>
                        <label>button</label>
                        <input type="text" name="button" value="{{$record->button}}">
                        <br>
                        <br>

                        @if($record->rows != null)

                            @php
                            $rows=json_decode($record->rows, TRUE);
                            @endphp

                            @foreach ($rows as $row)
                            <div >
                                <br>
                                <br>
                                <img style="width:250px" src="{{ asset('images/' . $row['image']) }}">
                                <br>
                                <input type="hidden" name="oldImage[]" value="{{$row['image']}}">
                                <input type="file" name="image[]">
                                <br>
                                <input type="text" name="header[]" value="{{$row['header']}}">
                                <input type="text" name="content[]" value="{{$row['content']}}">
                                
                                <a href="{{route('featuredProject-delete', ['header'=>$row['header']])}}"> sil </a>
                            </div>
                            @endforeach
                            <hr>
                            <section id="more-rows">
                                
                            </section>
                            
                        @else
                            <label>image</label>
                            <div style="display:grid; grid-template-columns:1fr 1fr 1fr;">
                                <input type="file" name="image[]">
                                <input type="text" name="header[]">
                                <input type="text" name="content[]">
                            </div>
                            <hr>
                            <section id="more-rows">
                                
                            </section>
                        @endif
                        <br>
                        <br>
                        <div>
                            <a onclick="addRows()">+</a>
                            <a onclick="removeRows()">-</a>
                        </div>
                        
                        <input type="submit" value="güncelle">
                    </form>
                @else
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <label>title</label>
                        <input type="text" name="title">
                        <br>
                        <label>header</label>
                        <input type="text" name="header">
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
            row.innerHTML = '<div><input type="file" name="image[]" required><input type="text" name="header[]" required><input type="text" name="content[]" required></div>';
            moreRows.appendChild(row);
        }

        function removeRows()
        {
            const rowsSection = document.getElementById("more-rows");
            const lastRows = rowsSection.querySelector("div:last-child");
            lastRows.parentElement.removeChild(lastRows);
        }
    </script>
@endsection