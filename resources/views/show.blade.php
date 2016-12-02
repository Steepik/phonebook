@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                    {{ $error }}
            @endforeach
        </ul>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Редактирование</div>
        <div class="panel-body">
            {!! Form::model($info, [ 'method' => 'PATCH', 'url' => $info->id ]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Имя:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lastname', 'Фамилия:') !!}
                {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('middlename', 'Отчество:') !!}
                {!! Form::text('middlename', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tel', 'Телефон:') !!}
                {!! Form::text('tel', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Сохранить', ['id' => 'btnSave', 'class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@stop