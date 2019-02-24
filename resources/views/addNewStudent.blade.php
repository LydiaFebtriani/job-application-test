@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Add New Student</h2>
            <div id="new_student_form">
                {!! Form::open(['route' => 'students.store']) !!}

                <table>
                    <tr>
                        <!-- NAME -->
                        <td>{!! Form::label('name', 'Name') !!}</td>
                        <td>{!! Form::text('name', null, 
                            [
                                'placeholder' => 'Student Name', 
                                'required' => 'required'
                            ]) !!}</td>
                    </tr>

                    <tr>
                        <!-- CLASS -->
                        <td>{!! Form::label('class', "Class") !!}</td>
                        <td>{!! Form::select('class', $classes_data, null, ['placeholder' => 'Select class (optional)']) !!}</td>
                    </tr>

                    <tr>
                        <td colspan="2" style="text-align: center;">{!! Form::submit('ADD') !!}</td>
                    </tr>
                </table>

                {!! Form::close() !!}
            </div>
            
        </div>
    </div>
</div>
@endsection
