<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Work;
use App\Models\Rest;

class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'workpart' => $this->faker->numberBetween(0,1),
            //'user_id' => $this->faker->numberBetween(1,100),
            'work_start_time' => $this->faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
            'work_end_time' => $this->faker->datetime($max = 'now', $timezone = date_default_timezone_get())
        ];
    }
}
