<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_date = Carbon::now();
        DB::table('orders')->insert(
            [
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => null,
                    'status' => 'completed',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => null,
                    'status' => 'completed',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => null,
                    'status' => 'completed',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => null,
                    'status' => 'completed',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => null,
                    'status' => 'completed',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => null,
                    'status' => 'completed',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => null,
                    'status' => 'completed',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => null,
                    'status' => 'completed',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => $current_date->year . '-' . $current_date->month . '-' . $current_date->day,
                    'status' => 'pending',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => $current_date->year . '-' . $current_date->month . '-' . $current_date->day,
                    'status' => 'pending',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => $current_date->year . '-' . $current_date->month . '-' . $current_date->day,
                    'status' => 'pending',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => $current_date->year . '-' . $current_date->month . '-' . $current_date->day,
                    'status' => 'pending',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'payment_gateway' => 'paypal',
                    'appointment_date' => $current_date->year . '-' . $current_date->month . '-' . $current_date->day,
                    'status' => 'completed',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
