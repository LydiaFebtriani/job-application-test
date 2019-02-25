@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Students</h2>
            <a href="{{ route('students.shownew') }}">Add New Student</a>
            <br><br>
            <table class="table-list">
                <tr>
                    <th>Name</th>
                    <th>Classes</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @forelse($students_data as $student)
                    <tr>
                        <td>{{ $student[1] }}</td>
                        <td>{{ $student[2]}}</td>
                        <td><a href="{{ 'students/edit/'.$student[0] }}">Edit</a></td>
                        <td>
                            {{ Form::open(['url' => 'students/delete/'.$student[0], 'method' => 'delete']) }}
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
