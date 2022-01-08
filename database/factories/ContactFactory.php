<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        "fullname" => $this->faker->name,
        "gender" => $this->faker->numberBetween(1,2),
        "email" => $this->faker->safeEmail(),
        "postcode" => $this->faker->numberBetween(1,999)."-".$this->faker->numberBetween(1,9999),
        "address" => $this->faker->address(),
        "building_name" => $this->faker->word(),
        "opinion" => $this->faker->text(100),
        ];
    }
}
