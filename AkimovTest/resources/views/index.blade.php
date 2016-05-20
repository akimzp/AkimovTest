@extends('defoult')
@section('content')
    <div>
        <div>
            <div>{!! link_to_route('addform','Добавить') !!}</div>


        <table>
            <tr>
                <th>№</th>
                <th>Страны</th>
            </tr>



            @foreach($country as $c)


                <tr>
                    <td>{!! $c->id !!}</td>
                    <td><a href="{{route('countryid',$c->id)}}">{{$c->country}}</a></td><td></td>
                    <td>{!! Form::open(array('action' => array('CountryController@delete', $c->id))) !!}
                    {!! Form::submit('Удалить', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}</td>
                    <td>{!! Form::open(array('action' => array('CountryController@update', $c->id))) !!}
                        {!! Form::submit('изменить', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}</td>

                </tr>


            @endforeach

        </table>
    </div>
    <div>


        <select id="selcount" class="divsel" onchange="selcountry()">
            @foreach($country as $c)

              Выберите странну  <option value="{!! $c->id !!}">{!! $c->country !!}</option>

            @endforeach
        </select>
    </div>
        <div id="results" class="divsel">

        </div>
        <div id="tab">

        </div>

        <script>
            function selcountry() {
                $.ajax({
                    type: "GET",
                    url: './listcity',
                    data: document.getElementById('selcount').value,
                    dataType:'json',
                    success: function(res) {

                        var html_str='<select id="selleng" onchange="selleng()">';
                        for(var i=0;i<res.length;i++)
                        {
                            html_str+='<option value="'+res[i].id+'">'+res[i].city+'</option>'
                        }

                        html_str+='</select>'
                        jQuery('#results').html(html_str);
                    }
                })
            };
            function selleng() {
                $.ajax({
                    type: "GET",
                    url: './listleng',
                    data: document.getElementById('selleng').value,
                    dataType:'json',
                    success: function(res) {
                        var count=document.getElementById('selcount').selected;
                        var city=document.getElementById('selleng').value;
                        var html_str='<div><table>'
                        html_str+='<tr><th>Языки на которых разговаривают</th> </tr>'
                        html_str+='<tr><td>';

                        for(var i=0;i<res.length;i++)
                        {
                            html_str+=res[i]+'<br>';
                        }

                        html_str+='</td></tr></table></div>'

                        jQuery('#tab').html(html_str);
                    }
                })
            };
        </script>
@stop
