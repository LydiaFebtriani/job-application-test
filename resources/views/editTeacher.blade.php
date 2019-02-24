@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $edit_info['teacher']->name }}</h2>
            <div id="edit_teacher_form">
                {!! Form::open(['url' => 'teachers/update/'.$edit_info['teacher']->id]) !!}

                <table>
                    <tr>
                        <!-- NAME -->
                        <td>{!! Form::label('name', 'Name') !!}</td>
                        <td>{!! Form::text('name', $edit_info['teacher']->name, 
                            [
                                'required' => 'required'
                            ]) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('class', "Class") !!}</td>
                        <td>{!! Form::select('class', $edit_info['classes'], null, ['placeholder' => 'Select class']) !!}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">{!! Form::submit('EDIT') !!}</td>
                    </tr>
                </table>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
