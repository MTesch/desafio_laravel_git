<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Demanda;
use Faker\Generator as Faker;

$factory->define(\App\Demanda::class, function (Faker $faker) {
	return [
	    'descricao' => $faker->text,
		'endereco' => $faker->address,
		'contato' => $faker->e164PhoneNumber,
		'anunciante' => $faker->randomDigit,
		'status' => $faker->randomElement($array = array ('Finalizado','Aberto'))
    ];
});
