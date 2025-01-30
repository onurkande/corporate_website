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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Footer Ayarları</h4>
                </div>
                <div class="card-body">
                    @if($record)
                        <form action="{{ route('footerUpdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="logo" class="form-control">
                                @if($record->logo)
                                    <img src="{{ asset('admin/footerImage/'.$record->logo) }}" width="100">
                                @endif
                            </div>

                            <br>

                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea name="description" class="form-control" required>{{ $record->description }}</textarea>
                            </div>

                            <br>

                            <div class="form-group">
                                <label>İletişim Öğeleri</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>İletişim Öğesi:</label>
                                        @if($record->contact_items)
                                            @foreach($record->contact_items as $key => $item)
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <a href="{{ route('footer-contact-delete', $key) }}"><button class="btn-danger" type="button">Sil</button></a>
                                                    </div>
                                                    <div class="col-md-11">
                                                        <input type="text" name="contact_items[]" class="form-control" value="{{ $item }}" oninput="checkInputValues()" required>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <section id="more-contact-items">
                                        </section>
                                    </div>
                                    <div class="col-md-5">
                                        <label>İkon:</label>
                                        @if($record->icons)
                                            @foreach($record->icons as $icon)
                                                <input type="text" name="icons[]" class="form-control" value="{{ $icon }}" oninput="checkInputValues()" required>
                                            @endforeach
                                        @endif
                                        <section id="more-icons">
                                        </section>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <a onclick="addContactRows()"><button type="button">+</button></a>
                                    <a onclick="removeContactRows()"><button type="button">-</button></a>
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <label>Etiketler</label>
                                <div class="col-md-10">
                                    @if($record->tags)
                                        @foreach($record->tags as $key => $tag)
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <a href="{{ route('footer-tag-delete', $key) }}"><button class="btn-danger" type="button">Sil</button></a>
                                                </div>
                                                <div class="col-md-11">
                                                    <input type="text" name="tags[]" class="form-control" value="{{ $tag }}" required>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <section id="more-tags">
                                    </section>
                                    <br>
                                    <div>
                                        <a onclick="addTagRows()"><button type="button">+</button></a>
                                        <a onclick="removeTagRows()"><button type="button">-</button></a>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <label>Instagram Fotoğrafları</label>
                                <div class="col-md-10">
                                    @if($record->instagram_photos)
                                        @foreach($record->instagram_photos as $key => $photo)
                                            <div class="row mb-3">
                                                <div class="col-md-1">
                                                    <a href="{{ route('footer-photo-delete', $key) }}"><button class="btn-danger" type="button">Sil</button></a>
                                                </div>
                                                <div class="col-md-11">
                                                    <img src="{{ asset('admin/footerImage/'.$photo) }}" width="100">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <input type="file" name="instagram_photos[]" class="form-control">
                                    <section id="more-photos">
                                    </section>
                                    <br>
                                    <div>
                                        <a onclick="addPhotoRows()"><button type="button">+</button></a>
                                        <a onclick="removePhotoRows()"><button type="button">-</button></a>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <label>Telif Hakkı Metni</label>
                                <input type="text" name="copyright_text" class="form-control" value="{{ $record->copyright_text }}" required>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </form>
                    @else
                        <form action="{{ route('footerUpdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="logo" class="form-control">
                            </div>

                            <br>

                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>

                            <br>

                            <div class="form-group">
                                <label>İletişim Öğeleri</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>İletişim Öğesi:</label>
                                        <input type="text" name="contact_items[]" class="form-control" oninput="checkInputValues()" required>
                                        <section id="more-contact-items">
                                        </section>
                                    </div>
                                    <div class="col-md-5">
                                        <label>İkon:</label>
                                        <input type="text" name="icons[]" class="form-control" oninput="checkInputValues()" required>
                                        <section id="more-icons">
                                        </section>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <a onclick="addContactRows()"><button type="button">+</button></a>
                                    <a onclick="removeContactRows()"><button type="button">-</button></a>
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <label>Etiketler</label>
                                <div class="col-md-10">
                                    <input type="text" name="tags[]" class="form-control" required>
                                    <section id="more-tags">
                                    </section>
                                    <br>
                                    <div>
                                        <a onclick="addTagRows()"><button type="button">+</button></a>
                                        <a onclick="removeTagRows()"><button type="button">-</button></a>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <label>Instagram Fotoğrafları</label>
                                <div class="col-md-10">
                                    <input type="file" name="instagram_photos[]" class="form-control">
                                    <section id="more-photos">
                                    </section>
                                    <br>
                                    <div>
                                        <a onclick="addPhotoRows()"><button type="button">+</button></a>
                                        <a onclick="removePhotoRows()"><button type="button">-</button></a>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <label>Telif Hakkı Metni</label>
                                <input type="text" name="copyright_text" class="form-control" required>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addContactRows() {
        const moreContactItems = document.getElementById('more-contact-items');
        const moreIcons = document.getElementById('more-icons');

        const contactRow = document.createElement("div");
        contactRow.innerHTML = '<input type="text" class="form-control" name="contact_items[]" oninput="checkInputValues()" required>';
        moreContactItems.appendChild(contactRow);

        const iconRow = document.createElement("div");
        iconRow.innerHTML = '<input type="text" class="form-control" name="icons[]" oninput="checkInputValues()" required>';
        moreIcons.appendChild(iconRow);
    }

    function removeContactRows() {
        const contactItemsSection = document.getElementById("more-contact-items");
        const iconsSection = document.getElementById("more-icons");

        if (contactItemsSection.children.length > 0) {
            contactItemsSection.removeChild(contactItemsSection.lastElementChild);
        }

        if (iconsSection.children.length > 0) {
            iconsSection.removeChild(iconsSection.lastElementChild);
        }
    }

    function addTagRows() {
        const moreTags = document.getElementById('more-tags');
        const tagRow = document.createElement("div");
        tagRow.innerHTML = '<input type="text" class="form-control" name="tags[]" required>';
        moreTags.appendChild(tagRow);
    }

    function removeTagRows() {
        const tagsSection = document.getElementById("more-tags");
        if (tagsSection.children.length > 0) {
            tagsSection.removeChild(tagsSection.lastElementChild);
        }
    }

    function addPhotoRows() {
        const morePhotos = document.getElementById('more-photos');
        const photoRow = document.createElement("div");
        photoRow.innerHTML = '<input type="file" class="form-control" name="instagram_photos[]">';
        morePhotos.appendChild(photoRow);
    }

    function removePhotoRows() {
        const photosSection = document.getElementById("more-photos");
        if (photosSection.children.length > 0) {
            photosSection.removeChild(photosSection.lastElementChild);
        }
    }

    function checkInputValues() {
        const contactInputs = document.querySelectorAll('input[name="contact_items[]"]');
        const iconInputs = document.querySelectorAll('input[name="icons[]"]');

        contactInputs.forEach((contactInput, index) => {
            const iconInput = iconInputs[index];

            if (contactInput.value !== '' && iconInput.value === '') {
                iconInput.setCustomValidity('Lütfen ikon alanını doldurun');
            } else if (contactInput.value === '' && iconInput.value !== '') {
                contactInput.setCustomValidity('Lütfen iletişim öğesi alanını doldurun');
            } else {
                contactInput.setCustomValidity('');
                iconInput.setCustomValidity('');
            }
        });
    }
</script>

@endsection
