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

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Header :</label>
                            @php
                                $header = json_decode($record->header, TRUE);
                            @endphp
                            <div class="row">
                                @foreach($header as $single)
                                <div class="col-md-1">
                                    <a href="{{url('dashboard/dynamic-edit/faqs-delete/'.$single)}}"><button class="btn-danger" type="button">Sil</button></a>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" name="header[]" class="form-control" value="{{$single}}" oninput="checkInputRowsValues()">
                                </div>
                                @endforeach
                            </div>
                            <section id="more-header"></section>
                            <br>
                            <div>
                                <a onclick="addRows()"><button type="button">+</button></a>
                                <a onclick="removeRows()"><button type="button">-</button></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            @php
                                $content = json_decode($record->content, TRUE);
                            @endphp
                            @foreach($content as $single)
                                <textarea cols="30" rows="4" name="content[]" class="form-control" oninput="checkInputRowsValues()">{{$single}}</textarea>
                            @endforeach
                            <section id="more-content"></section>
                        </div>
                    </div>

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
        const moreContent = document.getElementById('more-content');

        // Yeni Header satırı ekleniyor
        const headerRow = document.createElement("div");
        headerRow.innerHTML = '<input type="text" class="form-control" name="header[]" oninput="checkInputRowsValues()" required>';
        moreHeader.appendChild(headerRow);

        // Yeni Content satırı ekleniyor
        const contentRow = document.createElement("div");
        contentRow.innerHTML = '<textarea cols="30" rows="4" class="form-control" name="content[]" oninput="checkInputRowsValues()" required></textarea>';
        moreContent.appendChild(contentRow);
    }

    function removeRows() {
        const headerSection = document.getElementById("more-header");
        const contentSection = document.getElementById("more-content");

        // Son header satırı kaldırılıyor
        if (headerSection.children.length > 0) {
            headerSection.removeChild(headerSection.lastElementChild);
        }

        // Son content satırı kaldırılıyor
        if (contentSection.children.length > 0) {
            contentSection.removeChild(contentSection.lastElementChild);
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


<!-- <script>
    function addRowsUpdate() {
        const moreRowsUpdate = document.getElementById('more-rowsUpdate');

        // Yeni bir satır (row) oluşturuluyor
        const newRow = document.createElement("div");
        newRow.className = "row";
        newRow.innerHTML = `
            <div class="col-md-1">
                <button class="btn-danger" type="button" onclick="removeThisRow(this)">Sil</button>
            </div>
            <div class="col-md-11">
                <input type="text" name="header[]" class="form-control" oninput="checkInputRowsValues()" required>
            </div>
            <div class="col-md-4">
                <label for="">Content :</label>
                <textarea cols="30" rows="4" name="content[]" class="form-control" oninput="checkInputRowsValues()" required></textarea>
            </div>
        `;
        moreRowsUpdate.appendChild(newRow);
    }

    function removeRowsUpdate() {
        const moreRowsUpdate = document.getElementById('more-rowsUpdate');

        // Son satır kaldırılıyor
        if (moreRowsUpdate.children.length > 0) {
            moreRowsUpdate.removeChild(moreRowsUpdate.lastElementChild);
        }
    }

    // Belirli bir satırı silmek için fonksiyon
    function removeThisRow(button) {
        const rowToRemove = button.closest('.row');
        if (rowToRemove) {
            rowToRemove.remove();
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
</script> -->



@endsection