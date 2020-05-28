<?php namespace Tests\Repositories;

use App\Models\image;
use App\Repositories\imageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class imageRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var imageRepository
     */
    protected $imageRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->imageRepo = \App::make(imageRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_image()
    {
        $image = factory(image::class)->make()->toArray();

        $createdimage = $this->imageRepo->create($image);

        $createdimage = $createdimage->toArray();
        $this->assertArrayHasKey('id', $createdimage);
        $this->assertNotNull($createdimage['id'], 'Created image must have id specified');
        $this->assertNotNull(image::find($createdimage['id']), 'image with given id must be in DB');
        $this->assertModelData($image, $createdimage);
    }

    /**
     * @test read
     */
    public function test_read_image()
    {
        $image = factory(image::class)->create();

        $dbimage = $this->imageRepo->find($image->id);

        $dbimage = $dbimage->toArray();
        $this->assertModelData($image->toArray(), $dbimage);
    }

    /**
     * @test update
     */
    public function test_update_image()
    {
        $image = factory(image::class)->create();
        $fakeimage = factory(image::class)->make()->toArray();

        $updatedimage = $this->imageRepo->update($fakeimage, $image->id);

        $this->assertModelData($fakeimage, $updatedimage->toArray());
        $dbimage = $this->imageRepo->find($image->id);
        $this->assertModelData($fakeimage, $dbimage->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_image()
    {
        $image = factory(image::class)->create();

        $resp = $this->imageRepo->delete($image->id);

        $this->assertTrue($resp);
        $this->assertNull(image::find($image->id), 'image should not exist in DB');
    }
}
