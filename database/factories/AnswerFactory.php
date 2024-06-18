<?php

namespace Database\Factories;

use App\Models\AnswerRestriction;
use App\Models\Product;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_id' => Question::factory(),
            'text' => $this->faker->sentence,
        ];
    }

    /**
     * Configure the factory to include default behaviors and restrictions
     */
    public function withBehaviorsAndRestrictions()
    {
        return $this->afterCreating(function (Answer $answer) {
            $answer->behaviours()->create([
                'action' => 'recommend',
                'subject_type' => Product::class,
                'subject_id' => Product::factory()
            ]);
            $answer->restrictions()->create([
                'subject_type' => Product::class,
                'subject_id' => Product::factory(),
                'action' => AnswerRestriction::ACTION_EXCLUDE_ONE
            ]);
        });
    }
}
