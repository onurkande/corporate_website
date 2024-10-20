@extends('layouts.dynamic')
@section('title','COUNTER')
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
            <h3>Counter</h3>
        </div>
        <div class="card-body">

            @if($record)
                <form method="post" action="{{url('dashboard/dynamic-edit/counter-update/'.$record->id)}}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Title :</label>
                            @php
                                $title = json_decode($record->title, TRUE);
                            @endphp
                            <div class="row">
                                @foreach($title as $single)
                                <div class="col-md-1">
                                    <a href="{{url('dashboard/dynamic-edit/counter-delete/'.$single)}}"><button class="btn-danger" type="button">Sil</button></a>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="title[]" class="form-control" value="{{$single}}" oninput="checkInputRowsValues()">
                                </div>
                                @endforeach
                            </div>
                            <section id="more-title">
                            </section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Number :</label>
                            @php
                                $number = json_decode($record->number, TRUE);
                            @endphp
                            @foreach($number as $single)
                                <input type="text" name="number[]" class="form-control" value="{{$single}}" oninput="checkInputRowsValues()">
                            @endforeach
                            <section id="more-number">
                            </section>
                        </div>
                    </div>

                    <br>
                
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Update</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{url('dashboard/dynamic-edit/allCounter-delete/'.$record->id)}}"><button class="btn-danger btn-lg" type="button">Counter Delete</button></a>
                        </div>
                    </div>

                </form>
            @else
                <form method="post" action="{{url('dashboard/dynamic-edit/counter-insert')}}">

                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Title :</label>
                            <input type="text" name="title[]" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-title">
                            </section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <label>Number :</label>
                            <input type="number" name="number[]" class="form-control" oninput="checkInputRowsValues()">
                            <section id="more-number">
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
            const moreTitle = document.getElementById('more-title');
            const moreNumber = document.getElementById('more-number');

            const titleRow = document.createElement("div");
            titleRow.innerHTML = '<input type="text" class="form-control" name="title[]" oninput="checkInputRowsValues()" required>';
            moreTitle.appendChild(titleRow);

            const numberRow = document.createElement("div");
            numberRow.innerHTML = '<input type="number" class="form-control" name="number[]" oninput="checkInputRowsValues()" required>';
            moreNumber.appendChild(numberRow);
        }

        function removeRows() {
            const titleSection = document.getElementById("more-title");
            const numberSection = document.getElementById("more-number");

            if (titleSection.children.length > 0) {
                titleSection.removeChild(titleSection.lastElementChild);
            }

            if (numberSection.children.length > 0) {
                numberSection.removeChild(numberSection.lastElementChild);
            }
        }

        function checkInputRowsValues() {
            const titleInputs = document.querySelectorAll('input[name="title[]"]');
            const numberInputs = document.querySelectorAll('input[name="number[]"]');

            titleInputs.forEach((titleInput, index) => {
                const numberInput = numberInputs[index];

                if (titleInput.value === '' && numberInput.value === '') {
                    // Her iki alan da boş ise
                    titleInput.setCustomValidity('Please fill in the title');
                    numberInput.setCustomValidity('Please fill in the number');
                } else if (titleInput.value !== '' && numberInput.value === '') {
                    // Sadece number alanı boş ise
                    numberInput.setCustomValidity('Please fill in the number');
                    titleInput.setCustomValidity(''); // Önceki hatayı temizle
                } else if (titleInput.value === '' && numberInput.value !== '') {
                    // Sadece title alanı boş ise
                    titleInput.setCustomValidity('Please fill in the title');
                    numberInput.setCustomValidity(''); // Önceki hatayı temizle
                } else {
                    // Her iki alan da dolu ise
                    titleInput.setCustomValidity('');
                    numberInput.setCustomValidity('');
                }
            });
        }
    </script>

@endsection