@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Students</h2>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Teacher</th>
                    <th>Students</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @forelse($classrooms_data as $classroom)
                    <tr>
                        <td>{{ $classroom[0] }}</td>
                        <td>{{ $classroom[1]}}</td>
                        <td>{{ $classroom[2]}}</td>
                        <td><a href="">Edit</a></td>
                        <td><a href="">Delete</a></td>
                    </tr>
                    @empty
                    <tr></tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection
