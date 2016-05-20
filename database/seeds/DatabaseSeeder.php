<?php

use Illuminate\Database\Seeder;
use App\Countrie;
use App\Citye;
use App\Lengviche;
use App\Countries_lengviche;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Countrie::create([
            'country'=>'Украина',
        ]);
        Countrie::create([
            'country'=>'Польша',
        ]);
        Countrie::create([
            'country'=>'Германия',
        ]);
        Countrie::create([
            'country'=>'Англия',
        ]);

        Citye::create([
           'city'=>'Запорожье',
            'idcountry'=> 1,
        ]);
        Citye::create([
            'city'=>'днепропетровск',
            'idcountry'=> 1,
        ]);
        Citye::create([
            'city'=>'Броцлав',
            'idcountry'=> 2,
        ]);
        Citye::create([
            'city'=>'Варшава',
            'idcountry'=> 2,
        ]);
        Citye::create([
            'city'=>'Мюнхен',
            'idcountry'=> 3,
        ]);
        Citye::create([
            'city'=>'Берлин',
            'idcountry'=> 3,
        ]);
        Citye::create([
            'city'=>'Лондон',
            'idcountry'=> 4,
        ]);
        Citye::create([
            'city'=>'Бирмингем',
            'idcountry'=> 4,
        ]);
        Lengviche::create([
            'langvich'=>'Украинский'
        ]);
        Lengviche::create([
            'langvich'=>'Русский'
        ]);
        Lengviche::create([
            'langvich'=>'Немецкий'
        ]);
        Lengviche::create([
            'langvich'=>'Итольянский'
        ]);
        Lengviche::create([
            'langvich'=>'Французкий'
        ]);
        Lengviche::create([
            'langvich'=>'Арабский'
        ]);

    }
}
