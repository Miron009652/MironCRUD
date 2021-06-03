@extends('layouts.app')

@section('title', 'Отделы')

@section('content')
    <a href="{{ route('departments.create') }}" class="btn btn-outline-dark ">Добавить отдел</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->get('error'))
        <div class="alert alert-danger mt-3">
            {{ session()->get('error') }}
        </div>
    @endif

    <table class="table table-hover mt-3">
        <thead class="thead-dark">
        <tr>
            <th scope="col" >Название отдела</th>
            <th scope="col" >Количество сотрудников</th>
            <th scope="col">Максимальная заработная плата</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <th scope="row">{{ $department->name }}</th>
                <td >{{ $department->employees()->count('name')}}</td>
                <td>{{ $department->employees()->max('wages')}} $</td>
                <td class="table-buttons">
                    <a href="{{ route('departments.edit', $department) }}" class="btn btn-outline-dark">
                        <i class="fa fa-pencil" aria-hidden="true"> Изменить</i>
                    </a>
                    <form method="POST" action="{{ route('departments.destroy', $department) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-dark">
                            <i class="fa fa-trash"> Удалить</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
