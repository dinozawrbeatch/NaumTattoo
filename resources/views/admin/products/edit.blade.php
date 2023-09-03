@extends('layouts.main')
@section('content')
    <h2>Изменить товар</h2>
    <form action="{{ route('admin.products.update', $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="link">Ссылка</label>
            <input type="text" class="form-control" id="link" value="{{ $model->link }}" name="link">
            @error('link')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" id="image" name="image"
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
