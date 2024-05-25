<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'ic' => $this->faker->numberBetween(00000000000, 999999999999), // Ensure realistic range
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail(),
            'mobileno' => $this->faker->phoneNumber, // Use phoneNumber for mobile number
        ];
    }
}
