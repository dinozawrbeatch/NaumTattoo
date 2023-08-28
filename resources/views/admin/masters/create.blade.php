@extends('layouts.main')
@section('content')
    <h2>Создать мастера</h2>
    <form action="{{ route("admin.masters.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="form-group mb-3 d-none" id="js_preview">
            <img id="preview" width="100" height="100" class="img-fluid" src=""
                 alt="">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <script src="{{ asset('/js/imageUpload.js') }}"></script>
@endsection
