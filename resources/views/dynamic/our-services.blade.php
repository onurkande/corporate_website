@extends('layouts.dynamic')
@section('title','OUR SERVİCES')
@section('content')
    @if($record)
        <form method="post" action="OurServices-update">
            @csrf
            <label>title</label>
            <input type="text" name="title" value="{{$record->title}}"><br>
            <label>content</label>
            <input type="text" name="content" value="{{$record->content}}"><br>

            @if($record->rows != null)
                @php
                    $rows=json_decode($record->rows, TRUE);
                @endphp

                @foreach ($rows as $row)
                    <br>
                    <label>paragraph</label>
                    <input type="text" name="paragraph[]" value="{{$row['paragraph']}}">
                    <a href="{{route('OurServices-delete', ['paragraph'=>$row['paragraph']])}}"> sil </a><br>
                @endforeach
                <hr>
                <section id="more-rows">
                </section>
            @else
                <label>paragraph</label>
                <input type="text" name="paragraph[]">

                <hr>
                <section id="more-rows">
                </section>
            @endif
            <br>
            <hr>
            <div>
                <a onclick="addRows()">+</a>
                <a onclick="removeRows()">-</a>
            </div>
            
            <input type="submit" value="güncelle">
        </form>
    @else
        <form method="post">
            @csrf
            <label>title</label>
            <input type="text" name="title"><br>
            <label>content</label>
            <input type="text" name="content"><br>
            <label>paragraph</label>
            <input type="text" name="paragraph"><br>
            <hr>
            <section id="more-rows">
            </section>
            <input type="submit" value="kaydet">
        </form>
    @endif

    <script>
        function addRows()
        {
            const moreRows = document.getElementById('more-rows');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="text" name="paragraph[]" required></div>';
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