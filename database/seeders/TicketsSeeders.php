<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    $cityNames = [
		    "Москва", "Санкт-Петербург", "Новосибирск", "Екатеринбург", "Нижний Новгород", "Казань", "Челябинск", "Омск", "Самара",
		    "Ростов-на-Дону", "Уфа", "Красноярск", "Пермь", "Воронеж", "Волгоград", "Краснодар", "Саратов", "Тюмень", "Тольятти",
		    "Ижевск", "Ульяновск", "Барнаул", "Владивосток", "Ярославль", "Иркутск", "Томск", "Тула", "Калининград", "Курск",
		    "Белгород", "Сочи", "Ставрополь", "Тверь", "Киров", "Хабаровск", "Оренбург", "Тамбов", "Благовещенск", "Архангельск",
		    "Кемерово", "Якутск", "Астрахань", "Владимир", "Пенза", "Рязань", "Нижневартовск", "Сургут", "Курган", "Чебоксары"
	    ];

	    $randomData = [];

	    for ($i = 0; $i < 50; $i++) {
		    $data = [
			    "nn1" => $cityNames[array_rand($cityNames)],
			    "nn2" => $cityNames[array_rand($cityNames)],
			    "time" => sprintf("%02d:%02d", rand(0, 23), rand(0, 59)),
			    "date" => date("Y-m-d", strtotime("+" . rand(1, 30) . " days")),
		    ];

		    $randomData[] = $data;
	    }



        DB::table("tickets")->insert($randomData);
    }
}
