<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\image;

class imageApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_image()
    {
        $image = factory(image::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/images', $image
        );

        $this->assertApiResponse($image);
    }

    /**
     * @test
     */
    public function test_read_image()
    {
        $image = factory(image::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/images/'.$image->id
        );

        $this->assertApiResponse($image->toArray());
    }

    /**
     * @test
     */
    public function test_update_image()
    {
        $image = factory(image::class)->create();
        $editedimage = factory(image::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/images/'.$image->id,
            $editedimage
        );

        $this->assertApiResponse($editedimage);
    }

    /**
     * @test
     */
    public function test_delete_image()
    {
        $image = factory(image::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/images/'.$image->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/images/'.$image->id
        );

        $this->response->assertStatus(404);
    }
}
