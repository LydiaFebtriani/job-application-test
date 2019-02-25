@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Classes</h2>
            <a href="{{ route('classrooms.shownew') }}">Add New Class</a>
            <br><br>
            <table class="table-list">
                <tr>
                    <th>Name</th>
                    <th>Teacher</th>
                    <th>Students</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @forelse($classrooms_data as $classroom)
                    <tr>
                        <td>{{ $classroom[1] }}</td>
                        <td>{{ $classroom[2]}}</td>
                        <td>{{ $classroom[3]}}</td>
                        <td><a href="{{ 'classrooms/edit/'.$classroom[0] }}">Edit</a></td>
                        <td>
                            {{ Form::open(['url' => 'classrooms/delete/'.$classroom[0], 'method' => 'delete']) }}
                            <button type="submit">Delete</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @empty
                    <tr></tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection
