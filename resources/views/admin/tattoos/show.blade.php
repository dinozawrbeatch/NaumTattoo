@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-left align-items-center mb-3">
        <h2>Тату: {{ $tattoo->id }}</h2>
        <a href="{{ route("admin.tattoos.edit", $tattoo->id) }}"
           class="btn btn-primary m-4">Изменить тату</a>
        <form action="{{route("admin.tattoos.destroy", $tattoo->id)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit"
                    onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">
                Удалить
            </button>
        </form>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Картинка</th>
                    <td>
                        <img class="img-thumbnail" src="{{ asset('storage/' . $tattoo->image) }}" alt=""
                             width="200" height="200">
                    </td>
                </tr>
                <tr>
                    <th>Формат</th>
                    <td>{{ $tattoo->getImageFormat() }}</td>
                </tr>
            </table>
        </div>
    </div>

@endsection
