<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $i = 0;
        $i++;
        return [
            "name" => json_encode([
                "en" => $this->faker->word(),
                "ar" => $this->faker->word()
            ]),
            "desc" => json_encode([
                "en" => $this->faker->text(5000),
                "ar" => $this->faker->text(5000)
            ]),
            "img" => "skills/$i.png",
            "questions_num" => 15,
            "difficulty" => $this->faker->numberBetween(1 , 5),
            "durations_mins" => $this->faker->numberBetween(1 , 3) * 30,
        ];
    }
}
