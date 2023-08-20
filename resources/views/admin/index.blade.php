@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-left align-items-center mb-3">
        <h1>{{ $modelName::MODEL_NAME }}</h1>
        <a href="{{ route("admin.$modelLink.create") }}"
           class="btn btn-primary m-4">Добавить {{ mb_strtolower($modelName::MODEL_NAME) }}</a>
    </div>
    <div class="text-center">
        <table class="table table-striped">
            <thead>
            <tr>
                @foreach($modelName::FIELDS as $key => $value)
                    <th scope="col">{{ $value }}</th>
                @endforeach
                <th colspan="3" class="text-center mr-3">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rows as $row)
                <tr>
                    @foreach($modelName::FIELDS as $key => $value)
                        <td>
                            {{ $row->{$key} }}
                        </td>
                    @endforeach
                    <td><a href="{{ route("admin.$modelLink.show", $row->id) }}">Посмотреть</a></td>
                    <td><a href="{{ route("admin.$modelLink.edit", $row->id) }}">Изменить</a></td>
                    <td>
                        <form action="{{ route("admin.$modelLink.destroy", $row->id) }}" method="post">
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
        {{ $rows->links() }}
    </div>
@endsection
