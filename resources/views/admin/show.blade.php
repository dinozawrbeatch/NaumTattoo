@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-left align-items-center mb-3">
        <h2>{{$modelName::MODEL_NAME}}: {{ $row->id }}</h2>
        <a href="{{ route("admin.$modelLink.edit", $row->id) }}"
           class="btn btn-primary m-4">Изменить {{ mb_strtolower($modelName::MODEL_NAME) }}</a>
        <form action="{{route("admin.$modelLink.destroy", $row->id)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">
                Удалить
            </button>
        </form>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                @foreach($modelName::FIELDS as $fieldKey => $fieldName)
                    <tr>
                        @if ($fieldKey === 'image')
                            <img class="img-thumbnail" src="{{ asset('storage/' . $row->{$fieldKey}) }}" alt=""
                                 width="200" height="200">
                            @continue
                        @endif
                        <th>{{ ucfirst($fieldName) }}</th>
                        <td>{{ $row->{$fieldKey} }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
