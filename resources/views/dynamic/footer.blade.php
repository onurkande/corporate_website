@extends('layouts.dynamic')
@section('footer','FOOTER')
@section('content')
    @if($infoRecord)
        <form action="InfoRows-update" method="post">
            @csrf
            <label>title1</label>
            <input type="text" name="title1" value="{{$infoRecord->title1}}"><br>
            @if($infoRecord->inforows != null)
                @php
                    $inforows=json_decode($infoRecord->inforows, TRUE);
                @endphp
                
                @foreach($inforows as $inforow)
                    <label>info</label>
                    <input type="text" name="info[]" value="{{$inforow['info']}}">
                    <a href="{{route('inforows-delete', ['info'=>$inforow['info']])}}"> sil </a><br>
                @endforeach
                <hr>
                <section id="more-inforows">
                </section>
            @else
                <label>info</label>
                <input type="text" name="info[]"><br>
                <hr>
                <section id="more-inforows">
                </section>
            @endif
            <div>
                <a onclick="addinforows()">+</a>
                <a onclick="removeinforows()">-</a>
            </div>
            
            <input type="submit" value="güncelle">
        </form>
    @else
        <form method="post">
            @csrf
            <label>title1</label>
            <input type="text" name="title1"><br>
            <label>info</label>
            <input type="text" name="info"><br>
            <section id="more-inforows">
            </section>
            <input type="submit" value="kaydet">
        </form>
    @endif

    <br>

    <form method="post">
        @csrf
        <label>title2</label>
        <input type="text" name="title2"><br>
        <label>tag</label>
        <input type="text" name="tag"><br>
        <input type="submit" value="kaydet">
    </form>

    <br>

    <form method="post">
        @csrf
        <label>title3</label>
        <input type="text" name="title3"><br>
        <label>image</label>
        <input type="text" name="image"><br>
        <input type="submit" value="kaydet">
    </form>

    <br>

    <form method="post">
        @csrf
        <label>title4</label>
        <input type="text" name="title4"><br>
        <input type="submit" value="kaydet">
    </form>

    <script>
        function addinforows()
        {
            const moreinforows = document.getElementById('more-inforows');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="text" name="info[]" required></div>';
            moreinforows.appendChild(row);
        }

        function removeinforows()
        {
            const columnSection = document.getElementById("more-inforows");
            const lastColumn = columnSection.querySelector("div:last-child");
            lastColumn.parentElement.removeChild(lastColumn);
        }
    </script>
@endsection