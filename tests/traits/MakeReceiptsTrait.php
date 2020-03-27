<?php

use Faker\Factory as Faker;
use App\Models\Accounting\Receipts;
use App\Repositories\Accounting\ReceiptsRepository;

trait MakeReceiptsTrait
{
    /**
     * Create fake instance of Receipts and save it in database
     *
     * @param array $receiptsFields
     * @return Receipts
     */
    public function makeReceipts($receiptsFields = [])
    {
        /** @var ReceiptsRepository $receiptsRepo */
        $receiptsRepo = App::make(ReceiptsRepository::class);
        $theme = $this->fakeReceiptsData($receiptsFields);
        return $receiptsRepo->create($theme);
    }

    /**
     * Get fake instance of Receipts
     *
     * @param array $receiptsFields
     * @return Receipts
     */
    public function fakeReceipts($receiptsFields = [])
    {
        return new Receipts($this->fakeReceiptsData($receiptsFields));
    }

    /**
     * Get fake data of Receipts
     *
     * @param array $postFields
     * @return array
     */
    public function fakeReceiptsData($receiptsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'number' => $fake->word,
            'amount' => $fake->randomDigitNotNull,
            'company' => $fake->word,
            'comments' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $receiptsFields);
    }
}
