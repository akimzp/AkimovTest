<?php

namespace App\Http\Controllers;

use App\Citye;
use App\Countrie;
use App\Countries_lagviche;
use App\Countries_lengviche;
use App\Lengviche;
use Illuminate\Http\Request;

use App\Http\Requests;
use PhpParser\Node\Expr\Array_;



class CityesController extends Controller
{
    public function listcity(Request $req)
    {
        $req=$req->all();
        $req=array_keys($req);
        $citys=Citye::where('idcountry','=',$req[0])->get();
        $items=Array();

        return json_encode($citys);
    }
    public function listleng(Request $req)
    {
        $req=$req->all();
        $req=array_keys($req);
        $spis=Countries_lengviche::where('idcountry','=',$req)->get();
        $city=Citye::where('id','=',$req)->get();

        //dd($spis);
        $leng=Lengviche::all();
        $counter=Array();


        foreach ($leng as $l)
        {
            foreach ($spis as $s)
            {
                if($l->id==$s->idlengvich)
                {
                    //dd($s);
                    array_push($counter,$l->langvich );
                }
            }
        }
//dd($counter);
        foreach ($city as $ci)
            $c=$ci->city;

        return json_encode($counter);
    }
    public function show($id,$idc)
    {
        $spis=Countries_lengviche::where('idcountry','=',$idc)->get();
        $city=Citye::where('id','=',$idc)->get();

        //dd($spis);
        $leng=Lengviche::all();
        $counter=Array();


        foreach ($leng as $l)
        {
            foreach ($spis as $s)
            {
                if($l->id==$s->idlengvich)
                {
                    //dd($s);
                    array_push($counter,$l->langvich );
                }
            }
        }
//dd($counter);
        foreach ($city as $ci)
        $c=$ci->city;
        //dd($c);
        return view('lang',array('counter'=>$counter,'c'=>$c));
    }
    public function delete(Request $req)
    {

        $st=substr($req->getRequestUri(),strripos($req->getRequestUri(),'?')+1);

        Citye::destroy($st);
        return redirect()->action('CountryController@index');
    }
    public function update(Request $req)
    {   $id=substr($req->getRequestUri(),strripos($req->getRequestUri(),'?')+1);

        $country=Citye::all();
        $count='';
        foreach ($country as $s)
        {
            if($s->id==$id)
                $count=$s->city;
        }
        return view('updatecity',array('id'=>$id,'count'=>$count));
    }
    public function reloadcountry(Request $req)
    {
        $id=substr($req->getRequestUri(),strripos($req->getRequestUri(),'?')+1);
        $country=Citye::find($id);
        $arr=$req->all();
        $arr=array_values($arr);
        $country->city=$arr[1];
        $country->save();
        //$country->country=$reg->country;
        return redirect()->action('CountryController@index');
    }
    public function addcity(Citye $c,Request $request)
    {

        $countries=Countrie::all();
        $ca=Array();
        foreach ($countries as $c)
    {
        array_push($ca, $c->id);
    }
        $arr=Array();
        $arr=$request->all();
        $arr=array_values($arr);
        $ar=new Citye();
        $ar->city=$arr[1];
        $ar->idcountry=$ca[$arr[2]];
        $ar->save();

        return redirect()->action('CountryController@index');
    }
    public function addlengvich(Request $req)
    {
        $arr=Array();
        $arr=$req->all();
        $arr=array_values($arr);
        $con_leng=new Countries_lengviche();
        $cit=Citye::all();
        $ca=Array();
        foreach ($cit as $c)
        {
            array_push($ca, $c->id);
        }
        $con_leng->idcountry=$ca[$arr[1]];
        $cit=Lengviche::all();
        $ca=Array();
        foreach ($cit as $c)
        {
            array_push($ca, $c->id);
        }
            $con_leng->idlengvich=$ca[$arr[2]];
        $con_leng->save();
        return redirect()->action('CountryController@index');
    }
}
