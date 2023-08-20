@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-left align-items-center mb-3">
        <h2>{{$modelName::MODEL_NAME}}: {{ $row->id }}</h2>
        <a href="{{ route("admin.$modelLink.edit", $row->id) }}"
           class="btn btn-primary m-4">Изменить {{ mb_strtolower($modelName::MODEL_NAME) }}</a>
        <form action="{{route("admin.$modelLink.destroy", $row->id)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">
                Удалить
            </button>
        </form>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                @foreach($modelName::FIELDS as $fieldKey => $fieldName)
                    <tr>
                        <th>{{ ucfirst($fieldName) }}</th>
                        <td>{{ $row->{$fieldKey} }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
