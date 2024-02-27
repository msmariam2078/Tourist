<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"=> $this->faker->name,
            "mobile"=>$this->faker->unique->phoneNumber,
            "gender"=>$this->faker->randomElement(["male","fmale"]),
            "email"=> $this->faker->unique->safeEmail,
        ];
    }
}
