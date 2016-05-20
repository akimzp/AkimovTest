<?php

namespace App\Http\Controllers;

use App\Lengviche;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Countrie;
use App\Citye;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Array_;

class CountryController extends Controller
{
    public function index()
    {
        $country=Countrie::all();
        $co=Array();
        foreach ($country as $c)
            array_push($co,$c->country );

        return view('index',['country'=>$country,'co'=>$co]);
    }
    public function show($id)
    {
        $country=Countrie::where('id','=',$id)->get();
        $city=Citye::where('idcountry','=',$id)->get();
        $counter='';


        foreach ($country as $s)
        {
            if($s->id==$id)
            {
                $counter=$s->country;
            }
        }

        return view('citys',array('city'=>$city,'counter'=>$counter,'id'=>$id));
    }
    public function addform()
    {
        $countries=Countrie::all();
        $cityes=Citye::all();
        $leng=Lengviche::all();
        $country=Array();
        $len=Array();
        $city=Array();
        foreach ($countries as $c)
        {
            array_push($country, $c->country);
        }
        foreach ($cityes as $c)
        {
            array_push($city, $c->city);
        }
        foreach ($leng as $c)
        {
            array_push($len, $c->langvich);
        }


        return view('add',array('country'=>$country,'city'=>$city,'len'=>$len));
    }
    public function add(Countrie $c,Request $req)
    {
        $c->create($req->all());
        return redirect()->action('CountryController@index');
    }
    
    public function delete(Request $req)
    {

        $st=substr($req->getRequestUri(),strripos($req->getRequestUri(),'?')+1);
        
        Countrie::destroy($st);
        return redirect()->action('CountryController@index');
    }
    public function update(Request $req)
    {   $id=substr($req->getRequestUri(),strripos($req->getRequestUri(),'?')+1);

        $country=Countrie::all();
        $count='';
        foreach ($country as $s)
        {
            if($s->id==$id)
            $count=$s->country;
        }
        return view('updatecountry',array('id'=>$id,'count'=>$count));
    }
    public function reloadcountry(Request $req)
    {
        $id=substr($req->getRequestUri(),strripos($req->getRequestUri(),'?')+1);
        $country=Countrie::find($id);
        $arr=$req->all();
        $arr=array_values($arr);
        $country->country=$arr[1];
        $country->save();
        //$country->country=$reg->country;
        return redirect()->action('CountryController@index');
    }
    
}
