@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Add New Teacher</h2>
            <div id="new_teacher_form">
                {!! Form::open(['route' => 'teachers.store']) !!}

                <table>
                    <tr>
                        <!-- NAME -->
                        <td>{!! Form::label('name', 'Name') !!}</td>
                        <td>{!! Form::text('name', null, 
                            [
                                'placeholder' => 'Teacher Name', 
                                'required' => 'required'
                            ]) !!}</td>
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
