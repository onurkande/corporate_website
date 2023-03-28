@extends('layouts.dynamic')
@section('title','HOME PAGE')
@section('content')
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($record != null)
                    <form method="post" action="faq-update">
                        @csrf
                        <div style="display:grid; grid-template-columns:1fr 1fr;">
                            <input type="text" name="title" value="{{$record->title}}">
                        </div>
                        <br>
                        @if($record->lines != null)
                            @php
                                $lines=json_decode($record->lines, TRUE);
                                //dd($lines);
                            @endphp
                            
                            @foreach($lines as $line)
                                <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr;">
                                    <input type="text" name="header[]" value="{{$line['header']}}">
                                    <input type="text" name="content[]" value="{{$line['content']}}">
                                    <a href="{{route('faq-delete', ['header'=>$line['header']])}}"> sil </a>
                                </div>
                                <br>
                            @endforeach
                            <hr>
                            <section id="more-lines">
                                
                            </section>
                        @else
                            <div>
                                <input type="text" name="header[]">
                                <input type="text" name="content[]">
                            </div>
                            <hr>
                            <section id="more-lines">
                                
                            </section>
                        @endif
                            <div>
                                <a onclick="addLines()">+</a>
                                <a onclick="removeLines()">-</a>
                            </div>
                            <br>
                            <input type="submit" value="güncelle">
                    </form>
                @else
                    <form method="post">
                        @csrf
                        <input type="text" name="title">
                        <input type="text" name="header">
                        <input type="text" name="content">
                        <section id="more-lines">
                                
                        </section>
                        <input type="submit" value="kaydet">
                    </form>
                @endif
            </div>
        </div>
    </div> --}}
    <h1>
    HOŞGELDİN ADMİN
    </h1>
    {{-- <script>
        function addLines()
        {
            const moreLines = document.getElementById('more-lines');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="text" name="header[]" required><input type="text" name="content[]" required></div>';
            moreLines.appendChild(row);
        }

        function removeLines()
        {
            const linesSection = document.getElementById("more-lines");
            const lastLines = linesSection.querySelector("div:last-child");
            lastLines.parentElement.removeChild(lastLines);
        }
    </script> --}}
@endsection