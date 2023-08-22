@extends('layouts.main')
@section('content')
    <h2>Создать отзыв</h2>
    <form action="{{ route('admin.reviews.store') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="client_name">Имя клиента</label>
            <input type="text" class="form-control" id="client_name" name="client_name">
        </div>
        <div class="form-group mb-3">
            <label for="grade">Оценка</label>
            <select class="form-control" id="grade" name="grade">
                @foreach($review::getGradeMarks() as $grade)
                    <option value="{{ $grade }}">{{ $grade }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="text">Текст отзыва</label>
            <textarea class="form-control" id="text" name="text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <script src="{{ asset('/js/imageUpload.js') }}"></script>
@endsection
