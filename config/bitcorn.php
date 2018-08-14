<?php

return [
    /**
     * Counterparty API
     */
    'cp' => [
        'api' => env('CP_API', 'http://public.coindaddy.io:4000/api/'),
        'user' => env('CP_USER', 'rpc'),
        'password' => env('CP_PASSWORD', '1234'),
    ],
    'deposit_address' => env('DEPOSIT_ADDRESS', '1BitcornFoundationVotingxxy262cTk'),
    'foundation_chatroom' => env('FOUNDATION_CHATROOM'),
];