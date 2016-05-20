@extends('defoult')
@section('content')
    <div>



        <h1>{!! $counter !!}</h1>


        <div>


            <table>
                <tr>

                    <th>Города</th>
                </tr>
                @foreach($city as $c)

                    <tr>
                        <td><a href="{{route('cityid',array($id,$c->id))}}">{{$c->city}}</a></td><td></td>
                        <td>{!! Form::open(array('action' => array('CityesController@delete', $c->id))) !!}
                            {!! Form::submit('Удалить', ['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}</td>
                        <td>{!! Form::open(array('action' => array('CityesController@update', $c->id))) !!}
                            {!! Form::submit('изменить', ['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}</td>
                    </tr>

                @endforeach



            </table>
        </div>
@stop