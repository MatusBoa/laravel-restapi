<?php

namespace App\Containers\AppSection\Group\Data\Factories;

use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class GroupFactory
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GroupFactory extends Factory
{
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word,
            "description" => $this->faker->text,
        ];
    }
}
