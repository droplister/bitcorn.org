<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    // Assumes a very specific setting where these specific files persist.

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                "Bitcorn Harvest #3",
                "2,625,000 Bitcorn - What a lovely day in Autumn it will be!",
                "https://bitcorn.org/storage/events/fNg2Fz6NmAPe2JCr7f15ikr3ADJJsozGny0moJqC.jpeg",
                "https://bitcorns.com/almanac",
                "2018-10-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #4",
                "2,625,000 Bitcorn - Last harvest at this level. Halvening soon!",
                "https://bitcorn.org/storage/events/EGcAKsTaubN9nFqsCTUQOvSuSQPDAvt4vC4VkuOF.jpeg",
                "https://bitcorns.com/almanac",
                "2019-01-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #5",
                "1,312,500 Bitcorn - Harvesting has become back breaking work...",
                "https://bitcorn.org/storage/events/Wjmuakz7IvVHce4jBUbvIviG4ObTqWv4sR6TfN6Q.jpeg",
                "https://bitcorns.com/almanac",
                "2019-04-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #6",
                "1,312,500 Bitcorn - Remember 2018? Pepperidge Farms remembers...",
                "https://bitcorn.org/storage/events/ABZtytBwKBj0YvmqcvORZ9iZsIe9MUSuTXWd6CKC.jpeg",
                "https://bitcorns.com/almanac",
                "2019-07-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #7",
                "1,312,500 Bitcorn - Spooktacular harvest everyone! See you soon in 2020...",
                "https://bitcorn.org/storage/events/a9JmkLquKviuAC7emrkfe9IY0PUtZuVeu0Uzycld.jpeg",
                "https://bitcorns.com/almanac",
                "2019-10-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #8",
                "1,312,500 Bitcorn - BURRRR... I thought the future would be warmer!",
                "https://bitcorn.org/storage/events/14xL5Ta2roxBRtFi0uis9Qzzy3gHsktnx56lzk3o.jpeg",
                "https://bitcorns.com/almanac",
                "2020-01-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #9",
                "787,500 Bitcorn - Ooph! Someone check the BITCORNSILO we're running low!?",
                "https://bitcorn.org/storage/events/uAJ2L3c6azRYyTyI5FANZj4Nl4JiTrGmGrx8QRZo.jpeg",
                "https://bitcorns.com/almanac",
                "2020-04-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #10",
                "787,500 Bitcorn - If this keeps up we're going to run out of corn!",
                "https://bitcorn.org/storage/events/ksxx5ho2VLUYtZZjTbhmvB0ufYbnWVMnVI2VULrI.jpeg",
                "https://bitcorns.com/almanac",
                "2020-07-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #11",
                "787,500 Bitcorn - Autumn corn tastes better with 11 herbs and spices.",
                "https://bitcorn.org/storage/events/ka3t2sCKOMCmWQMgd891dXxd83Ket5If8tpJF6fN.jpeg",
                "https://bitcorns.com/almanac",
                "2020-10-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #12",
                "787,500 Bitcorn - Final halvening is now on the horizon. This is fine...",
                "https://bitcorn.org/storage/events/3wRU6wNaUqVP6proNvYwqAMVL70cPSyn0w34rN1n.jpeg",
                "https://bitcorns.com/almanac",
                "2021-01-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #13",
                "525,000 Bitcorn - It's a good thing that my coop is alpha... #SQUADGOALS",
                "https://bitcorn.org/storage/events/eh3evSat3inAoQ4dSRnba0ffUoIVR8Au24xwY4Cj.jpeg",
                "https://bitcorns.com/almanac",
                "2021-04-10 00:00:00"
            ],
            [
                "Bitcorn Harvest #14",
                "525,000 Bitcorn - Extreme heat and over-farming is taking its toll...",
                "https://bitcorn.org/storage/events/qgGOigYkbkjOMR5kGVpytXZGE0blXddsHd18wIV5.jpeg",
                "https://bitcorns.com/almanac",
                "2021-07-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #15",
                "525,000 Bitcorn - Denial begins to set in about who will win #BRAGGING rights.",
                "https://bitcorn.org/storage/events/7CyP2gfcWq1Lr37IxLnD2xEQAN5Jv9VjmyPtViVa.jpeg",
                "https://bitcorns.com/almanac",
                "2021-10-01 00:00:00"
            ],
            [
                "Bitcorn Harvest #16",
                "525,000 Bitcorn - The roots of all BITCORN CROPS are tapped dry. Sad!",
                "https://bitcorn.org/storage/events/knIRPINIE4RZyr0DEIx46q5y5nvyaEZNgX6rPkf0.jpeg",
                "https://bitcorns.com/almanac",
                "2022-01-01 00:00:00"
            ]
        ];

        foreach($events as $event)
        {
            Event::create([
                'name' => $event[0],
                'description' => $event[1],
                'image_url' => $event[2],
                'event_url' => $event[3],
                'scheduled_at' => $event[4],
            ]);
        }
    }
}