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
                        {{-- {{dd($row)}} --}}
                            <p>{{asset('/images/InfoBoxDownloads/'. $row['file'])}}</p>
                            <input type="hidden" name="oldFile[]" value="{{$row['file']}}">
                            <label>file</label>
                            <input type="file" name="file[]">
                            <a href="/dashboard/dynamic-edit/InfoBox-delete/{{$row['file']}}"> sil </a>
                            <br>
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