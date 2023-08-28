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
        <div class="form-group mb-3 d-none" id="js_preview">
            <img id="preview" width="100" height="100" class="img-fluid" src=""
                 alt="">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <script src="{{ asset('/js/imageUpload.js') }}"></script>
@endsection
