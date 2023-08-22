@extends('layouts.main')
@section('content')
    <h2>Изменить тату</h2>
    <form action="{{ route('admin.tattoos.update', $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="format">Формат изображения</label>
            <select class="form-control" id="format" name="format">
                @foreach($model::IMAGE_FORMATS as $imageFormat => $translation)
                    <option value="{{ $imageFormat }}" {{ $model->format == $imageFormat ? ' selected': '' }}>
                        {{ $translation }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="image">Изображение</label>
            <input type="file" class="form-control-file" id="image" name="image"
                   onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
        </div>
        <div class="form-group mb-3">
            <img id="preview" width="100" height="100" class="img-fluid" src="{{ asset('storage/' . $model->image) }}"
                 alt="">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <script src="{{ asset('/js/imageUpload.js') }}"></script>
@endsection
