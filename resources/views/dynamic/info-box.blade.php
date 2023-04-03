@extends('layouts.dynamic')
@section('title','INFO BOX')
@section('content')
    @if($record)
        <form method="post" action="InfoBox-update" enctype="multipart/form-data">
            @csrf
            <label>title</label>
            <input type="text" name="title" value="{{$record->title}}"><br>

            @if($record->rows != null)
                @php
                    $rows=json_decode($record->rows, TRUE);
                @endphp

                
                @if(is_array($rows))
                    @foreach($rows as $row)
                        <div>
                            <p>{{asset('/InfoBoxDownloads/'. $row)}}</p>
                            <input type="hidden" name="oldFile[]" value="{{$row}}">
                            <label>file</label>
                            <input type="file" name="file[]"><br>

                            {{-- <p>{{asset('/InfoBoxDownloads/'. $row['file'])}}</p>
                            <input type="hidden" name="oldfile[]" value="{{$row['file']}}">
                            <input type="file" name="file[]"> --}}
                        </div>
                        <br>
                    @endforeach                  
                @endif
                
                <section id="more-rows">
                </section>
            @else
                <div>
                    <input type="file" name="file[]">
                </div>
                <section id="more-rows">
                </section>
            @endif    
            <br>
            <div>
                <div>
                    <a onclick="addRows()">+</a>
                    <a onclick="removeRows()">-</a>
                </div>
            </div>
            <input type="submit" value="güncelle">
        </form>
    @else
        <form method="post" enctype="multipart/form-data">
            @csrf
            <label>title</label>
            <input type="text" name="title"><br>
            <label>file</label>
            <input type="file" name="file"><br>
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
            row.innerHTML = '<div><input type="file" name="file[]"></div>';
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