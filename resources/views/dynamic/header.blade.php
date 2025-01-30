@extends('layouts.dynamic')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Header Ayarları</div>

                <div class="card-body">
                    @if($record)
                        <form method="POST" action="{{ route('headerUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Logo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="logo">
                                    @if($record->logo)
                                        <img src="{{asset('admin/headerImage/'.$record->logo)}}" alt="Current Logo" class="mt-2" style="max-width: 200px">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Adres</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" value="{{ $record->address }}">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Telefon</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phone" value="{{ $record->phone }}">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Çalışma Saatleri</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="working_hours" value="{{ $record->working_hours }}">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Sosyal Medya İkonları</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>İkon:</label>
                                            @if($record->icons)
                                                @foreach($record->icons as $key => $icon)
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <a href="{{ route('header-icon-delete', $key) }}"><button class="btn-danger" type="button">Sil</button></a>
                                                        </div>
                                                        <div class="col-md-11">
                                                            <input type="text" name="icons[]" class="form-control" value="{{ $icon }}" oninput="checkInputValues()" required>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <section id="more-icons">
                                            </section>
                                        </div>
                                        <div class="col-md-5">
                                            <label>URL:</label>
                                            @if($record->icon_urls)
                                                @foreach($record->icon_urls as $url)
                                                    <input type="text" name="icon_urls[]" class="form-control" value="{{ $url }}" oninput="checkInputValues()" required>
                                                @endforeach
                                            @endif
                                            <section id="more-urls">
                                            </section>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <a onclick="addIconRows()"><button type="button">+</button></a>
                                        <a onclick="removeIconRows()"><button type="button">-</button></a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Güncelle
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="POST" action="{{ route('headerUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Logo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="logo">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Adres</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Telefon</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Çalışma Saatleri</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="working_hours">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">Sosyal Medya İkonları</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>İkon:</label>
                                            <input type="text" name="icons[]" class="form-control" oninput="checkInputValues()" required>
                                            <section id="more-icons">
                                            </section>
                                        </div>
                                        <div class="col-md-5">
                                            <label>URL:</label>
                                            <input type="text" name="icon_urls[]" class="form-control" oninput="checkInputValues()" required>
                                            <section id="more-urls">
                                            </section>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <a onclick="addIconRows()"><button type="button">+</button></a>
                                        <a onclick="removeIconRows()"><button type="button">-</button></a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Kaydet
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addIconRows() {
        const moreIcons = document.getElementById('more-icons');
        const moreUrls = document.getElementById('more-urls');

        const iconRow = document.createElement("div");
        iconRow.innerHTML = '<input type="text" class="form-control" name="icons[]" oninput="checkInputValues()" required>';
        moreIcons.appendChild(iconRow);

        const urlRow = document.createElement("div");
        urlRow.innerHTML = '<input type="text" class="form-control" name="icon_urls[]" oninput="checkInputValues()" required>';
        moreUrls.appendChild(urlRow);
    }

    function removeIconRows() {
        const iconsSection = document.getElementById("more-icons");
        const urlsSection = document.getElementById("more-urls");

        if (iconsSection.children.length > 0) {
            iconsSection.removeChild(iconsSection.lastElementChild);
        }

        if (urlsSection.children.length > 0) {
            urlsSection.removeChild(urlsSection.lastElementChild);
        }
    }

    function checkInputValues() {
        const iconInputs = document.querySelectorAll('input[name="icons[]"]');
        const urlInputs = document.querySelectorAll('input[name="icon_urls[]"]');

        iconInputs.forEach((iconInput, index) => {
            const urlInput = urlInputs[index];

            if (iconInput.value !== '' && urlInput.value === '') {
                urlInput.setCustomValidity('Lütfen URL alanını doldurun');
            } else if (iconInput.value === '' && urlInput.value !== '') {
                iconInput.setCustomValidity('Lütfen ikon alanını doldurun');
            } else {
                iconInput.setCustomValidity('');
                urlInput.setCustomValidity('');
            }
        });
    }
</script>

@endsection
