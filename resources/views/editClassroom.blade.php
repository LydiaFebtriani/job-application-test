@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $edit_info['classroom']->name }}</h2>
            <div id="edit_classroom_form">
                {!! Form::open(['url' => 'classrooms/update/'.$edit_info['classroom']->id, 'method' => 'PUT']) !!}

                <table>
                    <tr>
                        <!-- NAME -->
                        <td>{!! Form::label('name', 'Name') !!}</td>
                        <td>{!! Form::text('name', $edit_info['classroom']->name, 
                            [
                                'required' => 'required'
                            ]) !!}</td>
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
