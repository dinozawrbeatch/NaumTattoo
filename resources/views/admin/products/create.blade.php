@extends('layouts.main')
@section('content')
    <h2>Создать товар</h2>
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="link">Ссылка</label>
            <input type="text" class="form-control" id="link" name="link">
        </div>
        <div class="form-group mb-3">
            <label for="image">Картинка</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
