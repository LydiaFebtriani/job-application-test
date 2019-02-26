@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Add New Class Room</h2>
            <div id="new_classroom_form">
                {!! Form::open(['route' => 'classrooms.store']) !!}

                <table>
                    <tr>
                        <!-- NAME -->
                        <td>{!! Form::label('name', 'Name') !!}</td>
                        <td>{!! Form::text('name', null, 
                            [
                                'placeholder' => 'Class Room Name', 
                                'required' => 'required'
                            ]) !!}</td>
                    </tr>

                    <tr>
                        <!-- TEACHER -->
                        <td>{!! Form::label('teacher', "Teacher") !!}</td>
                        <td>{!! Form::select('teacher', $teachers_data, null, ['placeholder' => 'Select teacher']) !!}</td>
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
