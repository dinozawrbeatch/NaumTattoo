@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-left align-items-center mb-3">
        <h1>Тату</h1>
        <a href="{{ route("admin.tattoos.create") }}"
           class="btn btn-primary m-4">Добавить тату</a>
    </div>
    <div class="text-center">
        <table class="table table-striped">
            <thead>
            <tr>
                @foreach($model::FIELDS as $key => $value)
                    <th scope="col">{{ $value }}</th>
                @endforeach
                <th colspan="3" class="text-center mr-3">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tattoos as $tattoo)
                <tr>
                    <td>{{ $tattoo->id }}</td>
                    <td>
                        <img class="img-thumbnail" src="{{ asset('storage/' . $tattoo->image) }}" alt=""
                             width="100" height="100">
                    </td>
                    <td>{{ $tattoo->getImageFormat() }}</td>
                    <td><a href="{{ route("admin.tattoos.show", $tattoo->id) }}">Посмотреть</a></td>
                    <td><a href="{{ route("admin.tattoos.edit", $tattoo->id) }}">Изменить</a></td>
                    <td>
                        <form action="{{ route("admin.tattoos.destroy", $tattoo->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="text-danger border-0 bg-transparent" type="submit"
                                    onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tattoos->links() }}
    </div>
@endsection
