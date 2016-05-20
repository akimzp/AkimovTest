@extends('defoult')
@section('content')
    <div>

        <h1>Изменение города {!! $count !!}</h1>
        {!! Form::open(array('action' => array('CountryController@reloadcountry',$id))) !!}
        {!! Form::label('Дата рождения') !!}
        {!! Form::text('country',$count) !!}
        {!! Form::submit('изменить', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}




    </div>
@stop