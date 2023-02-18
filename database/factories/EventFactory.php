<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_organizer_id' => 2,
            'category_id' => $this->faker->integer(),
            'title' => $this->faker->title(),
            'slug' => $this->faker->slug(),
            'image' => $this->faker->image(),

            'tags' => $this->faker->tag(),
            'city' => $this->faker->city(),
            'location' => $this->faker->location(),
            'link' => $this->faker->url(),
            'start_datetime' => $this->faker->date(),

            'end_datetime' => $this->faker->date(),
            'time_zone' => $this->faker->timezone(),
            'language' => $this->faker->language(),
            'description' => $this->faker->description()
        ];
    }
}
