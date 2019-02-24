@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Teachers</h2>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Classes</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @forelse($teachers_data as $teacher)
                    <tr>
                        <td>{{ $teacher[0] }}</td>
                        <td>{{ $teacher[1]}}</td>
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
