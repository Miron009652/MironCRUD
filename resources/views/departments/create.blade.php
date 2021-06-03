@extends('layouts.app')

@section('title', 'Добавить отдел')

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
            <form method="POST" action="{{ route('departments.store') }}">
                @csrf
                <div class="form-group">
                    <label for="department-name">Название отдела</label>
                    <input type="text" name="name"
                           value="{{ old('name') }}" class="form-control" id="department-name">
                </div>
                <button type="submit" class="btn btn-outline-dark">Добавить отдел</button>
            </form>
        </div>
    </div>
@endsection
