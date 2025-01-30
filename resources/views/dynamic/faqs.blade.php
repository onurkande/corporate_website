@extends('layouts.dynamic')
@section('title','FAQS')
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
            <h4>About Row</h4>
        </div>
        <div class="card-body">

            @if($record != null)
                <form method="post" action="{{url('dashboard/dynamic-edit/faqs-update/'.$record->id)}}">
                    @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control" value="{{$record->title}}">
                        </div>
                    </div>

                    <br>

                    <div>
                        <a onclick="addUpdateRows()"><button type="button">+</button></a>
                        <a onclick="removeUpdateRows()"><button type="button">-</button></a>
                    </div>

                    <br>

                    @php
                        $header = json_decode($record->header, TRUE);
                        $content = json_decode($record->content, TRUE);
                    @endphp
                    @foreach($header as $key=>$single)
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Header :</label>
                                <div class="row">
                                    <div class="col-md-1">
                                        <a href="{{url('dashboard/dynamic-edit/faqs-delete/'.$single)}}"><button class="btn-danger" type="button">Sil</button></a>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="header[]" class="form-control" value="{{$single}}" oninput="checkInputRowsValues()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Content :</label>
                                <textarea cols="30" rows="4" name="content[]" class="form-control" oninput="checkInputRowsValues()">{{$content[$key]}}</textarea>
                            </div>
                        </div>
                        <br>
                    @endforeach


                    <section id="more-updateRows"></section>
                    

                    <br>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Update</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{url('dashboard/dynamic-edit/allFaqs-delete/'.$record->id)}}"><button class="btn-danger btn-lg" type="button">faqs Delete</button></a>
                        </div>
                    </div>

                </form>
            @else
                <form method="post" action="{{url('dashboard/dynamic-edit/faqs-insert')}}">
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
                            <section id="more-header"></section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            <textarea cols="30" rows="4" name="content[]" class="form-control" oninput="checkInputRowsValues()"></textarea>
                            <section id="more-content"></section>
                        </div>
                    </div>

                    <br>

                    <section id="more-rows"></section>

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
        const moreRows = document.getElementById('more-rows');

        const Rows = document.createElement("div");
        Rows.innerHTML = `
            <div class="row">
                <div class="col-md-4">
                    <label for="">Header :</label>
                    <input type="text" name="header[]" class="form-control" oninput="checkInputRowsValues()">
                </div>
                <div class="col-md-4">
                    <label for="">Content :</label>
                    <textarea cols="30" rows="4" name="content[]" class="form-control" oninput="checkInputRowsValues()"></textarea>
                </div>
            </div>
            <br>
        `;
        moreRows.appendChild(Rows);
    }

    function removeRows() {
        const rowsSection = document.getElementById('more-rows');

        // Son satır kaldırılıyor
        if (rowsSection.children.length > 0) {
            rowsSection.removeChild(rowsSection.lastElementChild);
        }
    }

    function checkInputRowsValues() {
        const headerInputs = document.querySelectorAll('input[name="header[]"]');
        const contentInputs = document.querySelectorAll('textarea[name="content[]"]');

        headerInputs.forEach((headerInput, index) => {
            const contentInput = contentInputs[index];

            if (headerInput.value !== '' && contentInput.value === '') {
                contentInput.setCustomValidity('Please fill in the content');
            } else if (headerInput.value === '' && contentInput.value !== '') {
                headerInput.setCustomValidity('Please fill in the header');
            } else if (headerInput.value === '' && contentInput.value === '') {
                headerInput.setCustomValidity('Please fill in the header');
                contentInput.setCustomValidity('Please fill in the content');
            } else {
                headerInput.setCustomValidity('');
                contentInput.setCustomValidity('');
            }
        });
    }
</script>

<script>
    function addUpdateRows() {
        const moreRows = document.getElementById('more-updateRows');

        const Rows = document.createElement("div");
        Rows.innerHTML = `
            <div class="row">
                <div class="col-md-4">
                    <label for="">Header :</label>
                    <input type="text" name="header[]" class="form-control" oninput="checkInputRowsValues()">
                </div>
                <div class="col-md-4">
                    <label for="">Content :</label>
                    <textarea cols="30" rows="4" name="content[]" class="form-control" oninput="checkInputRowsValues()"></textarea>
                </div>
            </div>
            <br>
        `;
        moreRows.appendChild(Rows);
    }

    function removeUpdateRows() {
        const rowsSection = document.getElementById('more-updateRows');

        // Son satır kaldırılıyor
        if (rowsSection.children.length > 0) {
            rowsSection.removeChild(rowsSection.lastElementChild);
        }
    }

    function checkInputRowsValues() {
        const headerInputs = document.querySelectorAll('input[name="header[]"]');
        const contentInputs = document.querySelectorAll('textarea[name="content[]"]');

        headerInputs.forEach((headerInput, index) => {
            const contentInput = contentInputs[index];

            if (headerInput.value !== '' && contentInput.value === '') {
                contentInput.setCustomValidity('Please fill in the content');
            } else if (headerInput.value === '' && contentInput.value !== '') {
                headerInput.setCustomValidity('Please fill in the header');
            } else if (headerInput.value === '' && contentInput.value === '') {
                headerInput.setCustomValidity('Please fill in the header');
                contentInput.setCustomValidity('Please fill in the content');
            } else {
                headerInput.setCustomValidity('');
                contentInput.setCustomValidity('');
            }
        });
    }
</script>



@endsection