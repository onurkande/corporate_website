@extends('layouts.dynamic')
@section('title','CONTACT US ROW')
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
    <div class="card">
        <div class="card-header">
            <h4>About Row</h4>
        </div>
        <div class="card-body">

            @if($record)
                <form method="post" action="{{url('dashboard/dynamic-edit/ContactUsRow-update/'.$record->id)}}">
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
                            <label>Content :</label>
                            <textarea type="text" cols="30" rows="4" name="content" class="form-control">{{$record->content}}</textarea>
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
                                    <a href="{{url('dashboard/dynamic-edit/ContactUsRow-delete/'.$single)}}"><button class="btn-danger" type="button">Sil</button></a>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="header[]" class="form-control" value="{{$single}}" oninput="checkInputRowsValues()">
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
                        <div class="col-md-4">
                            <label>Paragraph :</label>
                            @php
                                $paragraph = json_decode($record->paragraph, TRUE);
                            @endphp
                            @foreach($paragraph as $single)
                                <input type="text" name="paragraph[]" class="form-control" value="{{$single}}" oninput="checkInputRowsValues()">
                            @endforeach
                            <section id="more-paragraph">
                            </section>
                        </div>
                        <div class="col-md-4">
                            <label>Icon :</label>
                            @php
                                $icon = json_decode($record->icon, TRUE);
                            @endphp
                            @foreach($icon as $single)
                                <input type="text" name="icon[]" class="form-control" value="{{$single}}" oninput="checkInputRowsValues()">
                            @endforeach
                            <section id="more-icon">
                            </section>
                        </div>
                    </div>

                    <br>
                
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Update</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{url('dashboard/dynamic-edit/allContactUsRow-delete/'.$record->id)}}"><button class="btn-danger btn-lg" type="button">Contact Us Row Delete</button></a>
                        </div>
                    </div>
                    
                </form>
            @else
                <form method="post" action="{{url('dashboard/dynamic-edit/ContactUsRow-insert')}}">
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
                            <label for="">Content :</label>
                            <textarea type="text" cols="30" rows="4" name="content" class="form-control"></textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Header :</label>
                            <input type="text" name="header[]" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-header">
                            </section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <label>Paragraph :</label>
                            <input type="text" name="paragraph[]" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-paragraph">
                            </section>
                        </div>
                        <div class="col-md-4">
                            <label>Icon :</label>
                            <input type="text" name="icon[]" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-icon">
                            </section>
                        </div>
                    </div>

                    <br>
                    
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Submit</button>
                        </div>
                    </div>
                </form>
            @endif
		        
        </div>
    </div>

    <script>
        function addRows() {
            const moreHeader = document.getElementById('more-header');
            const moreParagraph = document.getElementById('more-paragraph');
            const moreIcon = document.getElementById('more-icon');
    
            const headerRow = document.createElement("div");
            headerRow.innerHTML = '<input type="text" class="form-control" name="header[]" oninput="checkInputRowsValues()" required>';
            moreHeader.appendChild(headerRow);
    
            const paragraphRow = document.createElement("div");
            paragraphRow.innerHTML = '<input type="text" class="form-control" name="paragraph[]" oninput="checkInputRowsValues()" required>';
            moreParagraph.appendChild(paragraphRow);
    
            const iconRow = document.createElement("div");
            iconRow.innerHTML = '<input type="text" class="form-control" name="icon[]" oninput="checkInputRowsValues()" required>';
            moreIcon.appendChild(iconRow);
        }
    
        function removeRows() {
            const headerSection = document.getElementById("more-header");
            const paragraphSection = document.getElementById("more-paragraph");
            const iconSection = document.getElementById("more-icon");
    
            if (headerSection.children.length > 0) {
                headerSection.removeChild(headerSection.lastElementChild);
            }
    
            if (paragraphSection.children.length > 0) {
                paragraphSection.removeChild(paragraphSection.lastElementChild);
            }
    
            if (iconSection.children.length > 0) {
                iconSection.removeChild(iconSection.lastElementChild);
            }
        }
    
        function checkInputRowsValues() {
            const headerInputs = document.querySelectorAll('input[name="header[]"]');
            const paragraphInputs = document.querySelectorAll('input[name="paragraph[]"]');
            const iconInputs = document.querySelectorAll('input[name="icon[]"]');
    
            headerInputs.forEach((headerInput, index) => {
                const paragraphInput = paragraphInputs[index];
                const iconInput = iconInputs[index];
    
                if (headerInput.value !== '' && (paragraphInput.value === '' || iconInput.value === '')) {
                    paragraphInput.setCustomValidity('Please fill in the paragraph and icon');
                    iconInput.setCustomValidity('Please fill in the paragraph and icon');
                } else if (headerInput.value === '' && (paragraphInput.value !== '' || iconInput.value !== '')) {
                    headerInput.setCustomValidity('Please fill in the header');
                } else {
                    headerInput.setCustomValidity('');
                    paragraphInput.setCustomValidity('');
                    iconInput.setCustomValidity('');
                }
            });
        }
    </script>
@endsection