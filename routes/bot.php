<?php

Route::post(config('bitcorn.telegram_webhook'), 'TelegramController@webhookHandler');