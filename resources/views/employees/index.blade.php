@extends('layouts.app')

@section('title', 'Сотрудники')

@section('content')
    <a href="{{ route('employees.create') }}" class="btn btn-outline-dark ">Добавить сотрудника</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-hover mt-3">
        <thead class="thead-dark">
        <tr>
            {{--<th scope="col">#</th>--}}
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Отчество</th>
            <th scope="col">Пол</th>
            <th scope="col">Заработная плата</th>
            <th scope="col">Отделы</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->surname }}</td>
            <td>{{ $employee->patronymic }}</td>
            <td>{{ $employee->gender }}</td>
            <td>{{ $employee->wages }} $</td>
            <td>{{ $employee->departments()->pluck('name')->implode(', ')}}</td>
            <td class="table-buttons">
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-outline-dark">
                    <i class="fa fa-pencil" aria-hidden="true"> Изменить</i>
                </a>
                <form method="POST" action="{{ route('employees.destroy', $employee) }}">
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
