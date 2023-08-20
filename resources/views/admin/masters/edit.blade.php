@extends('layouts.main')
@section('content')
    <h2>Изменить мастера</h2>
    <form action="{{ route("admin.masters.update", $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $model->name }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $model->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary my-3">Сохранить</button>
    </form>
@endsection
