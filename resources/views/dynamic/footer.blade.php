@extends('layouts.dynamic')
@section('footer','FOOTER')
@section('content')
    {{-- INFO --}}
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
        <form action="InfoRows-store" method="post">
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

    <br><br>

    @if ($tagRecord)
        <form method="post">
            @csrf
            <label>title2</label>
            <input type="text" name="title2"><br>
        @if($infoRecord->inforows != null)
                @php
                    $inforows=json_decode($infoRecord->inforows, TRUE);
                @endphp
                
                @foreach($inforows as $inforow)
                @endforeach
            <label>tag</label>
            <input type="text" name="tag[]"><br>
            <input type="submit" value="güncelle">
        </form>
    @else
        <form method="post">
            @csrf
            <label>title2</label>
            <input type="text" name="title2"><br>
            <label>tag</label>
            <input type="text" name="tag"><br>
            <input type="submit" value="kaydet">
        </form>
    @endif

            @if($tagsRecord->tagsrows != null)
                @php
                    $tagsrows=json_decode($tagsRecord->tagsrows, TRUE);
                @endphp
                
                @foreach($tagsrows as $tagsrow)
                    <label>tag</label>
                    <input type="text" name="tag[]" value="{{$tagsrow['tag']}}">
                    <a href="{{route('tagsrows-delete', ['tag'=>$tagsrow['tag']])}}"> sil </a><br>
                @endforeach
                <hr>
                <section id="more-tagsrow">
                </section>
            @else
                <label>tag</label>
                <input type="text" name="tag[]"><br>
                <hr>
                <section id="more-tagsrow">
                </section>
            @endif
            <div>
                <a onclick="addtagsrow()">+</a>
                <a onclick="removetagsrow()">-</a>
            </div>
            <input type="submit" value="güncelle">
        </form>
    @else
        <form action="TagsRows-store" method="post">
            @csrf
            <label>title2</label>
            <input type="text" name="title2"><br>
            <label>tag</label>
            <input type="text" name="tag"><br>
            <input type="submit" value="kaydet">
        </form>
    @endif

    <br><br>

    {{-- IMAGE --}}
    @if($imageRecord)
        <form method="post" action="ImageRows-update" enctype="multipart/form-data">
            @csrf
            <label>title3</label>
            <input type="text" name="title3" value="{{$imageRecord->title3}}"><br>

            @if($imageRecord->imagerows != null)
                @php
                    $imagerows=json_decode($imageRecord->imagerows, TRUE);
                @endphp
                
                @foreach($imagerows as $imagerow)
                    <br>
                    <img src="{{ asset('/images/'. $imagerow['image']) }}" alt="Resim" width="200">
                    <input type="hidden" name="oldImage[]" value="{{$imagerow['image']}}">
                    <input type="file" name="image[]">
                    <a href="/dashboard/dynamic-edit/ImageRows-delete/{{$imagerow['image']}}"> sil </a><br>
                @endforeach
                <hr>
                <section id="more-imagerow">
                </section>
            @else
                <label>image</label>
                <input type="file" name="image[]"><br>
                <section id="more-imagerow">
                </section>
            @endif
            <div>
                <a onclick="addimagerow()">+</a>
                <a onclick="removeimagerow()">-</a>
            </div>

            <input type="submit" value="güncelle">
        </form>
    @else
       <form action="ImageRows-store" method="post" enctype="multipart/form-data">
            @csrf
            <label>title3</label>
            <input type="text" name="title3"><br>
            <label>image</label>
            <input type="file" name="image"><br>
            <input type="submit" value="kaydet">
        </form> 
    @endif


    <br><br>

    {{-- TITLE4 --}}
    @if($title4Record)
        <form method="post" action="title4-update">
            @csrf
            <label>title4</label>
            <input type="text" name="title4" value="{{$title4Record->title4}}"><br>
            <input type="submit" value="güncelle">
        </form>
    @else
        <form action="title4-store" method="post">
            @csrf
            <label>title4</label>
            <input type="text" name="title4"><br>
            <input type="submit" value="kaydet">
        </form>
    @endif
    


    {{-- ====== SCRİPT ====== --}}

    {{-- info script --}}
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

    {{-- tag script --}}
    <script>
        function addtagsrow()
        {
            const moretagsrow = document.getElementById('more-tagsrow');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="text" name="tag[]" required></div>';
            moretagsrow.appendChild(row);
        }

        function removetagsrow()
        {
            const columnSection = document.getElementById("more-tagsrow");
            const lastColumn = columnSection.querySelector("div:last-child");
            lastColumn.parentElement.removeChild(lastColumn);
        }
    </script>

    {{-- image script --}}
    <script>
        function addimagerow()
        {
            const moreimagerow = document.getElementById('more-imagerow');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="file" name="image[]" required></div>';
            moreimagerow.appendChild(row);
        }

        function removeimagerow()
        {
            const columnSection = document.getElementById("more-imagerow");
            const lastColumn = columnSection.querySelector("div:last-child");
            lastColumn.parentElement.removeChild(lastColumn);
        }
    </script>
@endsection