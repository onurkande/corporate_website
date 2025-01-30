@extends('layouts.dynamic')

@section('content')
<div class="col-12">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Slider Yönetimi</h6>
            </div>
        </div>
        <div class="card-body px-4 pb-2">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Slider Ekleme/Düzenleme Formu -->
            <form action="{{ isset($slider) ? route('sliders.update', $slider->id) : route('sliders.store') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @if(isset($slider))
                    @method('PUT')
                @endif

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <input placeholder="Başlık" type="text" class="form-control" id="title" name="title" value="{{ isset($slider) ? $slider->title : old('title') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <input placeholder="Alt Başlık" type="text" class="form-control" id="subtitle" name="subtitle" value="{{ isset($slider) ? $slider->subtitle : old('subtitle') }}">
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-group input-group-outline my-3">
                        <textarea placeholder="Açıklama" class="form-control" id="description" name="description" rows="3">{{ isset($slider) ? $slider->description : old('description') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <input placeholder="Buton Metni" type="text" class="form-control" id="button_text" name="button_text" value="{{ isset($slider) ? $slider->button_text : old('button_text') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <input placeholder="Buton Linki" type="text" class="form-control" id="button_link" name="button_link" value="{{ isset($slider) ? $slider->button_link : old('button_link') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    @if(isset($slider) && $slider->image)
                        <div class="mb-3">
                            <img src="{{ asset('admin/sliderImage/' . $slider->image) }}" alt="Current Image" style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                <div class="col-md-3">
                    <div class="input-group input-group-outline my-3">
                        <input placeholder="Sıra" type="number" class="form-control" id="order" name="order" value="{{ isset($slider) ? $slider->order : old('order', 0) }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="input-group input-group-outline my-3">
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="1" {{ (isset($slider) && $slider->is_active) || old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ (isset($slider) && !$slider->is_active) || old('is_active') == '0' ? 'selected' : '' }}>Pasif</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{ isset($slider) ? 'Güncelle' : 'Kaydet' }}</button>
                </div>
            </form>

            <!-- Slider Listesi -->
            <div class="table-responsive mt-4">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sıra</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Resim</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Başlık</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alt Başlık</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Durum</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $slider->order }}</td>
                            <td>
                                <img src="{{asset('admin/sliderImage/'.$slider->image)}}" alt="Slider Image" style="max-width: 100px;">
                            </td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->subtitle }}</td>
                            <td>
                                @if($slider->is_active)
                                    <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                @else
                                    <span class="badge badge-sm bg-gradient-danger">Pasif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('sliders.edit', $slider) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i> Düzenle
                                </a>
                                <form action="{{ route('sliders.destroy', $slider) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu slideri silmek istediğinizden emin misiniz?')">
                                        <i class="fas fa-trash"></i> Sil
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 