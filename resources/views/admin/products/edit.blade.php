@extends('layouts.main')
@section('content')
    <h2>Изменить товар</h2>
    <form action="{{ route('admin.products.update', $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="link">Ссылка</label>
            <input type="text" class="form-control" id="link" value="{{ $model->link }}" name="link">
        </div>
        <div class="form-group mb-3">
            <label for="image">Картинка</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ $model->image }}">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
