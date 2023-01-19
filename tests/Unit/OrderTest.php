<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * @group passing
     * Tests the api GET /api/order/{order}
     */
    public function test_getOrderDetail()
    {
        return $this->get('/api/order/1')
            ->assertStatus(200);
//            ->assertJsonStructure([
//                "id" => 1,
//                "payment_gateway" => "paypal",
//                "appointment_date" => null,
//                "status" => "pending",
//                "created_at" => "2023-01-18T17:07:10.000000Z",
//                "updated_at" => "2023-01-18T18:04:29.000000Z"
//            ]);
    }

    /**
     * @group passing
     * Tests the api POST /api/order/all
     */
    public function test_getAllOrders()
    {
        $data = [
            "pagination" => [
                "perPage" => 10
            ],
            "limit" => 0,
            "offset" => 4,
            "sorting" => [
                "order" => "desc",
                "column" => "id"
            ]
        ];
        return $this->post('/api/order/all', $data, ["Accept" => "application/json"])
            ->assertStatus(200);
    }

    /**
     * @group passing
     * Tests the api POST /api/order/updateStatus/{order}
     */
    public function test_updateStatus()
    {
        $data = [
            "status" => "pending"
        ];
        return $this->post('/api/order/updateStatus/1', $data, ["Accept" => "application/json"])
            ->assertStatus(200);
    }
}
