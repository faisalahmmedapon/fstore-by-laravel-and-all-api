<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = array(
            ['name'=>'Bkash','slug'=>'bkash','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'Nagat','slug'=>'nagat','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'Upay','slug'=>'upay','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'Sure Cash','slug'=>'sure-cash','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'DBBL Mobile Banking','slug'=>'dbbl-mobile-banking','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'iPay','slug'=>'ipay','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'SSLCOMMERZ','slug'=>'sslcommerz','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'ShurjoPay','slug'=>'shurjo-pay','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'AamarPay','slug'=>'aamar-pay','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'PortWallet','slug'=>'port-wallet','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'FastSpring','slug'=>'fast-spring','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'Easy Pay Way','slug'=>'easy-pay-way','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
            ['name'=>'Payoneer','slug'=>'payoneer','avatar'=>'https://seeklogo.com/images/B/bkash-logo-250D6142D9-seeklogo.com.png'],
        );

        foreach ($payments as $payment){
            Payment::updateOrCreate($payment);
        }
    }
}
