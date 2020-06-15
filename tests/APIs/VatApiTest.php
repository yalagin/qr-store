<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Vat;

class VatApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vat()
    {
        $vat = factory(Vat::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vats', $vat
        );

        $this->assertApiResponse($vat);
    }

    /**
     * @test
     */
    public function test_read_vat()
    {
        $vat = factory(Vat::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/vats/'.$vat->id
        );

        $this->assertApiResponse($vat->toArray());
    }

    /**
     * @test
     */
    public function test_update_vat()
    {
        $vat = factory(Vat::class)->create();
        $editedVat = factory(Vat::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vats/'.$vat->id,
            $editedVat
        );

        $this->assertApiResponse($editedVat);
    }

    /**
     * @test
     */
    public function test_delete_vat()
    {
        $vat = factory(Vat::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vats/'.$vat->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vats/'.$vat->id
        );

        $this->response->assertStatus(404);
    }
}
