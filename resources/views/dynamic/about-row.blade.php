@extends('layouts.dynamic')
@section('title','ABOUT ROW')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($record)
                    <form action="aboutRow-update" method="post">
                        @csrf
                        <label>title</label>
                        <input type="text" name="title" value="{{$record->title}}">
                        <br>
                        <label>content</label>
                        <input type="text" name="content" value="{{$record->content}}">
                        <br>

                        @if($record->rows != null)
                            @php
                                $rows=json_decode($record->rows, TRUE);
                            @endphp

                            @foreach($rows as $row)
                                <label>icon</label>
                                <input type="text" name="icon[]" value="{{$row['icon']}}">
                                <br>
                                <label>header</label>
                                <input type="text" name="header[]" value="{{$row['header']}}">
                                <br>
                                <label>paragraph</label>
                                <input type="text" name="paragraph[]" value="{{$row['paragraph']}}">
                                <a href="{{route('aboutRows-delete', ['header'=>$row['header']])}}"> sil </a>
                            @endforeach

                            <hr>
                            <section id="more-rows">

                            </section>

                        @else
                                <label>icon</label>
                                <input type="text" name="icon[]">
                                <br>
                                <label>header</label>
                                <input type="text" name="header[]">
                                <br>
                                <label>paragraph</label>
                                <input type="text" name="paragraph[]">
                                <hr>
                                <section id="more-rows">
                                    
                                </section>
                        @endif
                        <br>
                        <div>
                            <a onclick="addRows()">+</a>
                            <a onclick="removeRows()">-</a>
                        </div>
                        <br>
                        <input type="submit" name="güncelle" value="güncelle">
                    </form>
                @else
                    <form method="post">
                        @csrf
                        <label>title</label>
                        <input type="text" name="title">
                        <br>
                        <label>content</label>
                        <input type="text" name="content">
                        <br>
                        <label>icon</label>
                        <input type="text" name="icon">
                        <br>
                        <label>header</label>
                        <input type="text" name="header">
                        <br>
                        <label>paragraph</label>
                        <input type="text" name="paragraph">
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
            row.innerHTML = '<div><input type="text" name="icon[]" required><input type="text" name="header[]" required><input type="text" name="paragraph[]" required></div>';
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
