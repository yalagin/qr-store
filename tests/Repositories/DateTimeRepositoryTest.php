<?php namespace Tests\Repositories;

use App\Models\DateTime;
use App\Repositories\DateTimeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DateTimeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DateTimeRepository
     */
    protected $dateTimeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dateTimeRepo = \App::make(DateTimeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_date_time()
    {
        $dateTime = factory(DateTime::class)->make()->toArray();

        $createdDateTime = $this->dateTimeRepo->create($dateTime);

        $createdDateTime = $createdDateTime->toArray();
        $this->assertArrayHasKey('id', $createdDateTime);
        $this->assertNotNull($createdDateTime['id'], 'Created DateTime must have id specified');
        $this->assertNotNull(DateTime::find($createdDateTime['id']), 'DateTime with given id must be in DB');
        $this->assertModelData($dateTime, $createdDateTime);
    }

    /**
     * @test read
     */
    public function test_read_date_time()
    {
        $dateTime = factory(DateTime::class)->create();

        $dbDateTime = $this->dateTimeRepo->find($dateTime->id);

        $dbDateTime = $dbDateTime->toArray();
        $this->assertModelData($dateTime->toArray(), $dbDateTime);
    }

    /**
     * @test update
     */
    public function test_update_date_time()
    {
        $dateTime = factory(DateTime::class)->create();
        $fakeDateTime = factory(DateTime::class)->make()->toArray();

        $updatedDateTime = $this->dateTimeRepo->update($fakeDateTime, $dateTime->id);

        $this->assertModelData($fakeDateTime, $updatedDateTime->toArray());
        $dbDateTime = $this->dateTimeRepo->find($dateTime->id);
        $this->assertModelData($fakeDateTime, $dbDateTime->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_date_time()
    {
        $dateTime = factory(DateTime::class)->create();

        $resp = $this->dateTimeRepo->delete($dateTime->id);

        $this->assertTrue($resp);
        $this->assertNull(DateTime::find($dateTime->id), 'DateTime should not exist in DB');
    }
}
