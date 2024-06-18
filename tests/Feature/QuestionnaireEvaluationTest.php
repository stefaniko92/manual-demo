<?php

namespace Tests\Feature;

use App\Models\Answer;
use App\Models\Product;
use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionnaireEvaluationTest extends TestCase
{
    use RefreshDatabase;

    public function test_questionnaire_answers_processing()
    {
        // Create a questionnaire
        $questionnaire = Questionnaire::factory()->create();

        // Create a question linked to the questionnaire
        $question = Question::factory()->create(['questionnaire_id' => $questionnaire->id]);

        // Create products that could potentially be recommended
        $product1 = Product::factory()->create(['name' => 'Product 1']);
        $product2 = Product::factory()->create(['name' => 'Product 2']);

        // Create answers with behaviors and restrictions
        $answer1 = Answer::factory()->create(['question_id' => $question->id]);
        $answer2 = Answer::factory()->create(['question_id' => $question->id]);

        // Assuming the existence of a method to attach behaviors and restrictions
        $answer1->behaviours()->create([
            'action' => 'recommend',
            'subject_type' => Product::class,
            'subject_id' => $product1->id
        ]);
        $answer2->behaviours()->create([
            'subject_type' => Product::class,
            'action' => 'exclude_all'
        ]);

        $response = $this->postJson('/api/evaluate-answers', [
            'answers' => [$answer1->id, $answer2->id]
        ]);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'data' => [
                ['id' => $product1->id, 'name' => $product1->name] // Assuming this product is recommended
            ],
            'message' => 'Recommended products returned successfully'
        ]);
    }

    public function test_exclude_all_products_behavior()
    {
        // Create a questionnaire
        $questionnaire = Questionnaire::factory()->create();

        // Create a question linked to the questionnaire
        $question = Question::factory()->create(['questionnaire_id' => $questionnaire->id]);

        // Create products that could potentially be recommended
        $product1 = Product::factory()->create(['name' => 'Product 1']);
        $product2 = Product::factory()->create(['name' => 'Product 2']);

        // Create answers with behaviors and restrictions
        $answer1 = Answer::factory()->create(['question_id' => $question->id]);
        $answer2 = Answer::factory()->create(['question_id' => $question->id]);

        // Assuming the existence of a method to attach behaviors and restrictions
        $answer1->behaviours()->create([
            'action' => 'recommend',
            'subject_type' => Product::class,
            'subject_id' => $product1->id
        ]);
        $answer2->behaviours()->create([
            'subject_type' => Product::class,
            'action' => 'exclude_all'
        ]);

        $response = $this->postJson('/api/evaluate-answers', [
            'answers' => [$answer1->id, $answer2->id]
        ]);

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'data' => [
                ['id' => $product1->id, 'name' => $product1->name] // Adjust this based on actual behavior
            ],
            'message' => 'Recommended products returned successfully'
        ]);
    }
}
