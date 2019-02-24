@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Add New Class Room</h2>
            <div id="new_classroom_form">
                {!! Form::open(['route' => 'classrooms.store']) !!}

                <!-- NAME -->
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, 
                    [
                        'placeholder' => 'Class Room Name', 
                        'required' => 'required'
                    ]) !!}

                <!-- TEACHER -->
                {!! Form::label('teacher', "Teacher") !!}
                {!! Form::select('teacher', $teachers_data, null, ['placeholder' => 'Select teacher']) !!}

                {!! Form::submit('ADD') !!}

                {!! Form::close() !!}
            </div>
            
        </div>
    </div>
</div>
@endsection
