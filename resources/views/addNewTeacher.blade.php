@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Add New Teacher</h2>
            <div id="new_teacher_form">
                {!! Form::open(['route' => 'teachers.store']) !!}

                <!-- NAME -->
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, 
                    [
                        'placeholder' => 'Teacher Name', 
                        'required' => 'required'
                    ]) !!}

                <!-- CLASS -->
                <!-- {!! Form::label('class', "Class") !!}
                {!! Form::select('class', [1,2,3], null, ['placeholder' => 'Select class (optional)']) !!} -->

                {!! Form::submit('ADD') !!}

                {!! Form::close() !!}
            </div>
            
        </div>
    </div>
</div>
@endsection
