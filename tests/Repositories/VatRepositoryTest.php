<?php namespace Tests\Repositories;

use App\Models\Vat;
use App\Repositories\VatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VatRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VatRepository
     */
    protected $vatRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vatRepo = \App::make(VatRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vat()
    {
        $vat = factory(Vat::class)->make()->toArray();

        $createdVat = $this->vatRepo->create($vat);

        $createdVat = $createdVat->toArray();
        $this->assertArrayHasKey('id', $createdVat);
        $this->assertNotNull($createdVat['id'], 'Created Vat must have id specified');
        $this->assertNotNull(Vat::find($createdVat['id']), 'Vat with given id must be in DB');
        $this->assertModelData($vat, $createdVat);
    }

    /**
     * @test read
     */
    public function test_read_vat()
    {
        $vat = factory(Vat::class)->create();

        $dbVat = $this->vatRepo->find($vat->id);

        $dbVat = $dbVat->toArray();
        $this->assertModelData($vat->toArray(), $dbVat);
    }

    /**
     * @test update
     */
    public function test_update_vat()
    {
        $vat = factory(Vat::class)->create();
        $fakeVat = factory(Vat::class)->make()->toArray();

        $updatedVat = $this->vatRepo->update($fakeVat, $vat->id);

        $this->assertModelData($fakeVat, $updatedVat->toArray());
        $dbVat = $this->vatRepo->find($vat->id);
        $this->assertModelData($fakeVat, $dbVat->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vat()
    {
        $vat = factory(Vat::class)->create();

        $resp = $this->vatRepo->delete($vat->id);

        $this->assertTrue($resp);
        $this->assertNull(Vat::find($vat->id), 'Vat should not exist in DB');
    }
}
