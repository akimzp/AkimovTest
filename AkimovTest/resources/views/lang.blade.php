@extends('defoult')
@section('content')
    <div>



        <h1></h1>


        <div>


            <table>
                <tr>

                    <th>Языки на которых разговаривают в городе {!! $c !!}</th>
                </tr>
                @foreach($counter as $c)

                    <tr>
                        <td><a>{{$c}}</a></td><td></td>

                    </tr>

                @endforeach



            </table>
        </div>
@stop