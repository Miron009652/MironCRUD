@extends('layouts.app')

@section('title', 'Добавить сотрудника')

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
         <form method="POST" action="{{ route('employees.store') }}">
             @csrf
                <div class="form-group">
                    <label for="employee-name">Имя</label>
                    <input type="text" name="name"
                           value="{{ old('name') }}" class="form-control" id="employee-name">
                </div>
                <div class="form-group">
                    <label for="employee-surname">Фамилия</label>
                    <input type="text" name="surname"
                           value="{{ old('surname') }}" class="form-control" id="employee-surname">
                </div>
                <div class="form-group">
                    <label for="employee-patronymic">Отчество</label>
                    <input type="text" name="patronymic"
                           value="{{ old('patronymic') }}" class="form-control" id="employee-patronymic">
                </div>
                <div class="form-group">
                    <div class="row-col-md-7">
                        <select name="gender" class="custom-select @error('gender') is-invalid @enderror">
                            <option value="">Пол</option>
                            <option value="Мужской" {{ old('gender') === 'Мужской' ? 'selected' : '' }}>Мужской</option>
                            <option value="Женский" {{ old('gender') === 'Женский' ? 'selected' : '' }}>Женский</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="employee-wages">Заработная плата</label>
                    <input type="text" name="wages"
                           value="{{ old('wages') }}" class="form-control" id="employee-wages">
                </div>
                {{--<div class="form-group">
                    <label for="department_id">Отделы</label>
                    <select multiple class="form-control" id="department_id" name="department_id[]">
                        @foreach($departments as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>--}}
                <div class="form-group"><label class="col-sm-2 control-label">Отделы</label>
                   <div class="col-sm-10">
                       @foreach($departments as $department)
                           <input type="checkbox" name="departments[]" value="{{$department->id}}">
                           <label class="">{{ucfirst($department->name)}}</label>
                       @endforeach
                   </div>
                </div>
                    <button type="submit" class="btn btn-outline-dark">Добавить сотрудника</button>
    </form>
    </div>
    </div>
@endsection
