<?php

use App\Models\Accounting\Receipts;
use App\Repositories\Accounting\ReceiptsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReceiptsRepositoryTest extends TestCase
{
    use MakeReceiptsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReceiptsRepository
     */
    protected $receiptsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->receiptsRepo = App::make(ReceiptsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateReceipts()
    {
        $receipts = $this->fakeReceiptsData();
        $createdReceipts = $this->receiptsRepo->create($receipts);
        $createdReceipts = $createdReceipts->toArray();
        $this->assertArrayHasKey('id', $createdReceipts);
        $this->assertNotNull($createdReceipts['id'], 'Created Receipts must have id specified');
        $this->assertNotNull(Receipts::find($createdReceipts['id']), 'Receipts with given id must be in DB');
        $this->assertModelData($receipts, $createdReceipts);
    }

    /**
     * @test read
     */
    public function testReadReceipts()
    {
        $receipts = $this->makeReceipts();
        $dbReceipts = $this->receiptsRepo->find($receipts->id);
        $dbReceipts = $dbReceipts->toArray();
        $this->assertModelData($receipts->toArray(), $dbReceipts);
    }

    /**
     * @test update
     */
    public function testUpdateReceipts()
    {
        $receipts = $this->makeReceipts();
        $fakeReceipts = $this->fakeReceiptsData();
        $updatedReceipts = $this->receiptsRepo->update($fakeReceipts, $receipts->id);
        $this->assertModelData($fakeReceipts, $updatedReceipts->toArray());
        $dbReceipts = $this->receiptsRepo->find($receipts->id);
        $this->assertModelData($fakeReceipts, $dbReceipts->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteReceipts()
    {
        $receipts = $this->makeReceipts();
        $resp = $this->receiptsRepo->delete($receipts->id);
        $this->assertTrue($resp);
        $this->assertNull(Receipts::find($receipts->id), 'Receipts should not exist in DB');
    }
}
