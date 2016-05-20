@extends('defoult')
@section('content')
<h1>Добавление</h1>
    <div>
        <h3>страну</h3>
        {!! Form::open(array('action' => array('CountryController@add'))) !!}
        {!! Form::label('Введите название страны') !!}
        {!! Form::text('country') !!}
        {!! Form::submit('Добавить', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <div>
        <h3>город</h3>
        {!! Form::open(array('action' => array('CityesController@addcity'))) !!}
        {!! Form::label('Введите название города') !!}
        {!! Form::text('country') !!}
        {!! Form::select('sel',$country) !!}
        {!! Form::submit('Добавить', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <div>
        <h3>язык</h3>
        {!! Form::open(array('action' => array('CityesController@addlengvich'))) !!}
        {!! Form::label('Выберите язык язык') !!}
        {!! Form::select('selcity',$city) !!}
        {!! Form::select('selcountry',$len) !!}
        {!! Form::submit('Добавить', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

@stop
