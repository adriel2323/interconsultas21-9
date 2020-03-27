<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReceiptsApiTest extends TestCase
{
    use MakeReceiptsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateReceipts()
    {
        $receipts = $this->fakeReceiptsData();
        $this->json('POST', '/api/v1/receipts', $receipts);

        $this->assertApiResponse($receipts);
    }

    /**
     * @test
     */
    public function testReadReceipts()
    {
        $receipts = $this->makeReceipts();
        $this->json('GET', '/api/v1/receipts/'.$receipts->id);

        $this->assertApiResponse($receipts->toArray());
    }

    /**
     * @test
     */
    public function testUpdateReceipts()
    {
        $receipts = $this->makeReceipts();
        $editedReceipts = $this->fakeReceiptsData();

        $this->json('PUT', '/api/v1/receipts/'.$receipts->id, $editedReceipts);

        $this->assertApiResponse($editedReceipts);
    }

    /**
     * @test
     */
    public function testDeleteReceipts()
    {
        $receipts = $this->makeReceipts();
        $this->json('DELETE', '/api/v1/receipts/'.$receipts->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/receipts/'.$receipts->id);

        $this->assertResponseStatus(404);
    }
}
