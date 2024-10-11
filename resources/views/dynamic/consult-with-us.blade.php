@extends('layouts.dynamic')
@section('title','CONSULT WİTH US')
@section('content')
    @if(session()->has('store'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('store') }}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000);
        </script>
    @endif

    @if(session()->has('update'))
        <div class="alert alert-info" role="alert">
            {{ session()->get('update') }}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000);
        </script>
    @endif

    @if(session()->has('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('delete') }}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000);
        </script>
    @endif

    <div class="card" style="padding: 0">
        <div class="card-header">
            <h4>Consult With Us</h4>
        </div>
        <div class="card-body">
            @if($record)
                <form method="post" action="{{url('dashboard/dynamic-edit/consultWithUs-update/'.$record->id)}}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control" value="{{$record->title}}">
                        </div>
                    </div>
                    
                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Header :</label>
                            @php
                                $header = json_decode($record->header, TRUE);
                            @endphp
                            <div class="row">
                                @foreach($header as $single)
                                <div class="col-md-1">
                                    <a href="{{url('dashboard/dynamic-edit/consultWithUs-delete/'.$single)}}"><button class="btn-danger" type="button">Sil</button></a>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="header[]" class="form-control" value="{{$single}}">
                                </div>
                                @endforeach
                            </div>
                            <section id="more-header">
                            </section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            <textarea type="text" cols="30" rows="4" name="content" class="form-control">{{$record->content}}</textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Update</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{url('dashboard/dynamic-edit/allConsultWithUs-delete/'.$record->id)}}"><button class="btn-danger btn-lg" type="button">Consult With Us Delete</button></a>
                        </div>
                    </div>
                </form>
            @else
                <form method="post" action="{{url('dashboard/dynamic-edit/consultWithUs-insert')}}">
                    @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Header :</label>
                            <input type="text" name="header[]" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-header">
                            </section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div> 
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            <textarea type="text" cols="30" rows="4" name="content" class="form-control"></textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Kaydet</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
    
    <script>
        function addRows() 
        {
            const moreHeader = document.getElementById('more-header');

            const headerRow = document.createElement("div");
            headerRow.innerHTML = '<input type="text" class="form-control" name="header[]" oninput="checkInputRowsValues()" required>';
            moreHeader.appendChild(headerRow);
        }

        function removeRows() 
        {
            const headerSection = document.getElementById("more-header");

            if (headerSection.children.length > 0) {
                headerSection.removeChild(headerSection.lastElementChild);
            }
        }
    </script>
@endsection