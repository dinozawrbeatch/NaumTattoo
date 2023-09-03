@extends('layouts.main')
@section('content')
    <h2>Изменить мастера</h2>
    <form action="{{ route("admin.masters.update", $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $model->name }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $model->description }}</textarea>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="image">Изображение</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group mb-3">
            <img id="preview" width="100" height="100" class="img-fluid" src="{{ asset('storage/' . $model->image) }}"
                 alt="">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <script src="{{ asset('/js/imageUpload.js') }}"></script>
@endsection
