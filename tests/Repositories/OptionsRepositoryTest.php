<?php namespace Tests\Repositories;

use App\Models\Options;
use App\Repositories\OptionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OptionsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OptionsRepository
     */
    protected $optionsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->optionsRepo = \App::make(OptionsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_options()
    {
        $options = factory(Options::class)->make()->toArray();

        $createdOptions = $this->optionsRepo->create($options);

        $createdOptions = $createdOptions->toArray();
        $this->assertArrayHasKey('id', $createdOptions);
        $this->assertNotNull($createdOptions['id'], 'Created Options must have id specified');
        $this->assertNotNull(Options::find($createdOptions['id']), 'Options with given id must be in DB');
        $this->assertModelData($options, $createdOptions);
    }

    /**
     * @test read
     */
    public function test_read_options()
    {
        $options = factory(Options::class)->create();

        $dbOptions = $this->optionsRepo->find($options->id);

        $dbOptions = $dbOptions->toArray();
        $this->assertModelData($options->toArray(), $dbOptions);
    }

    /**
     * @test update
     */
    public function test_update_options()
    {
        $options = factory(Options::class)->create();
        $fakeOptions = factory(Options::class)->make()->toArray();

        $updatedOptions = $this->optionsRepo->update($fakeOptions, $options->id);

        $this->assertModelData($fakeOptions, $updatedOptions->toArray());
        $dbOptions = $this->optionsRepo->find($options->id);
        $this->assertModelData($fakeOptions, $dbOptions->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_options()
    {
        $options = factory(Options::class)->create();

        $resp = $this->optionsRepo->delete($options->id);

        $this->assertTrue($resp);
        $this->assertNull(Options::find($options->id), 'Options should not exist in DB');
    }
}
