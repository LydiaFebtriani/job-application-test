@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Teachers</h2>
            <a href="{{ route('teachers.shownew') }}">Add New Teacher</a>
            <br><br>
            <table class="table-list">
                <tr>
                    <th>Name</th>
                    <th>Classes</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @forelse($teachers_data as $teacher)
                    <tr>
                        <td>{{ $teacher[1] }}</td>
                        <td>{{ $teacher[2] }}</td>
                        <td><a href="{{ 'teachers/edit/'.$teacher[0] }}">Edit</a></td>
                        <td>
                            {{ Form::open(['url' => 'teachers/delete/'.$teacher[0], 'method' => 'delete']) }}
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
