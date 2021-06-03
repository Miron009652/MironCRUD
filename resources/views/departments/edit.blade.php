@extends('layouts.app')

@section('title', 'Редактировать отдел ')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('departments.update', $department )}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="department-name">Название отдела</label>
                    <input type="text" name="name"
                           value="{{ $department->name }}" class="form-control" id="department-name">
                </div>
                {{--<div class="form-group">
                    <label for="department-number_of_employees">Количество</label>
                    <input type="text" name="number_of_employees"
                           value="{{ $department->number_of_employees }}" class="form-control" id="department-number_of_employees">
                </div>
                <div class="form-group">
                    <label for="department-max_wages">Максимум зарплата</label>
                    <input type="text" name="max_wages"
                           value="{{ $department->max_wages }}" class="form-control" id="department-max_wages">
                </div>--}}
                <button type="submit" class="btn btn-outline-dark">Редактировать отдел</button>
            </form>
        </div>
    </div>
@endsection
