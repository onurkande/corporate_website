@extends('layouts.dynamic')
@section('title','CONSULT WİTH US')
@section('content')
    @if($record)
        <form action="ConsultWithUs-update" method="post">
            @csrf
            <label>title</label>
            <input type="text" name="title" value="{{$record->title}}">
            <br>
            <br>

            @if ($record->rows != null)
                @php
                    $rows=json_decode($record->rows, TRUE);
                @endphp

                @foreach ($rows as $row)
                    <label>header</label>
                    <input type="text" name="header[]" value="{{$row['header']}}">
                    <label>content</label>
                    <input type="text" name="content[]" value="{{$row['content']}}">
                    <a href="{{route('ConsultWithUs-delete', ['header'=>$row['header']])}}"> sil </a>
                    <br>
                    <br>
                @endforeach

                <section id="more-rows">
                </section>
            @else
                <label>header</label>
                <input type="text" name="header[]">
                <br>
                <label>content</label>
                <input type="text" name="content[]">
                <br>
                 <section id="more-rows">
                </section>
            @endif

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
            <input type="text" name="title">
            <br>
            <label>header</label>
            <input type="text" name="header">
            <br>
            <label>content</label>
            <input type="text" name="content">
            <br>
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
            row.innerHTML = '<div><input type="text" name="header[]" required><input type="text" name="content[]" required></div>';
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