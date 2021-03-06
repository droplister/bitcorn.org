<?php

return [
    'bc' => [
        'api' => env('BC_API'),
        'user' => env('BC_USER'),
        'password' => env('BC_PASSWORD'),
    ],
    'cb' => [
        'api' => env('XCP_CORE_CB_API', 'http://public.coindaddy.io:4100/api/'),
        'user' => env('XCP_CORE_CB_USER', 'rpc'),
        'password' => env('XCP_CORE_CB_PASSWORD', '1234'),
    ],
    'cp' => [
        'api' => env('CP_API', 'http://public.coindaddy.io:4000/api/'),
        'user' => env('CP_USER', 'rpc'),
        'password' => env('CP_PASSWORD', '1234'),
    ],
    'confirmations' => env('CONFIRMATIONS', 2),
    'contact_email' => env('CONTACT_EMAIL', 'bitcorncrops+contact@gmail.com'),
    'ballot_address' => env('BALLOT_ADDRESS', '1VoteMg3ENEknHm6WyJMcXMaFdQqz9GvQ'),
    'deposit_address' => env('DEPOSIT_ADDRESS', '1Cause3Csh36GMnDEHatN6hXyTRUCNyM8y'),
    'public_chat_id' => env('PUBLIC_CHAT_ID'),
    'private_chat_id' => env('PRIVATE_CHAT_ID'),
    'telegram_webhook' => env('TELEGRAM_WEB_HOOK'),
    'approval_route' => env('BITCORN_APPROVAL_ROUTE'),
    'queue_route' => env('BITCORN_QUEUE_ROUTE'),
    'faucet_address' => env('FAUCET_ADDRESS'),
    'faucet_private_key' => env('FAUCET_PRIVATE_KEY'),
];