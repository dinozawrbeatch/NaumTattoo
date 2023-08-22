@extends('layouts.main')
@section('content')
    <h2>Создать тату</h2>
    <form action="{{ route('admin.tattoos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="format">Формат изображения</label>
            <select class="form-control" id="format" name="format">
                @foreach($tattoo::IMAGE_FORMATS as $imageFormat => $translation)
                    <option value="{{ $imageFormat }}">{{ $translation }}</option>
                @endforeach
            </select>
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
