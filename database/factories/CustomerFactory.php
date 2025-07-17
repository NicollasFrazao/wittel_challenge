<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###########'),
            'birth_date' => $this->faker->date('Y-m-d', '-18 years'),
            'income' => $this->faker->randomFloat(2, 1000, 20000),
        ];
    }
}
