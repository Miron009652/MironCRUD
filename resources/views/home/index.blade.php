@extends('layouts.app')

@section('title', 'Главная')

@section('content')


    <table class="table table-hover mt-3">
      <thead class="thead-dark">
        <tr>
           <th scope="col">#</th>
             @foreach($departments as $department)
               <th scope="col">{{ $department->name }}</th>
             @endforeach
        </tr>
      </thead>
      <tbody>
      @foreach($employees as $employee)
          <tr>
              <th scope="row">{{ $employee->surname }} {{ $employee->name }}</th>
              @foreach($departments as $department)
                  <td>
                      @if($employee->departments->where('id', $department->id)->count())
                          &#10003;
                      @endif
                  </td>
              @endforeach
          </tr>
          @endforeach
      </tbody>
    </table>


@endsection
