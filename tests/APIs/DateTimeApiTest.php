<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DateTime;

class DateTimeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_date_time()
    {
        $dateTime = factory(DateTime::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/date_times', $dateTime
        );

        $this->assertApiResponse($dateTime);
    }

    /**
     * @test
     */
    public function test_read_date_time()
    {
        $dateTime = factory(DateTime::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/date_times/'.$dateTime->id
        );

        $this->assertApiResponse($dateTime->toArray());
    }

    /**
     * @test
     */
    public function test_update_date_time()
    {
        $dateTime = factory(DateTime::class)->create();
        $editedDateTime = factory(DateTime::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/date_times/'.$dateTime->id,
            $editedDateTime
        );

        $this->assertApiResponse($editedDateTime);
    }

    /**
     * @test
     */
    public function test_delete_date_time()
    {
        $dateTime = factory(DateTime::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/date_times/'.$dateTime->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/date_times/'.$dateTime->id
        );

        $this->response->assertStatus(404);
    }
}
