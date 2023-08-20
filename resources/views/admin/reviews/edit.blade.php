@extends('layouts.main')
@section('content')
    <h2>Изменить отзыв</h2>
    <form action="{{ route('admin.reviews.update', $model->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="client_name">Имя клиента</label>
            <input type="text" class="form-control" id="client_name" value="{{ $model->client_name }}"
                   name="client_name">
        </div>
        <div class="form-group mb-3">
            <label for="grade">Оценка</label>
            <select class="form-control" id="grade" name="grade">
                @foreach($model::getGradeMarks() as $grade)
                    <option value="{{ $grade }}"
                        {{ $model->grade == $grade ? ' selected': ''}}>
                        {{ $grade }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="text">Текст отзыва</label>
            <textarea class="form-control" id="text" name="text">{{ $model->text }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
