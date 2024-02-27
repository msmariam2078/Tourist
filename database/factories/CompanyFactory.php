<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'title'=>$this->faker->name(),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->phoneNumber(),
        ];
    }
}
