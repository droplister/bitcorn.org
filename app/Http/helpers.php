<?php

/**
 * From Satoshi (divide)
 * 
 * @param  integer  $satoshi
 * @return string
 */
function fromSatoshi($satoshi)
{
    return bcdiv((int)(string)$satoshi, 100000000, 8);
}

/**
 * To Satoshi (multiply)
 * 
 * @param  float  $decimal
 * @return string
 */
function toSatoshi($decimal)
{
    return bcmul(sprintf("%.8f", (float)$decimal), 100000000, 0);
}

/**
 * Normalize Quantity
 * 
 * @param  integer  $quantity
 * @param  boolean  $divisible
 * @return string
 */
function normalizeQuantity($quantity, $divisible)
{
    return $divisible ? fromSatoshi($quantity) : sprintf("%.8f", $quantity);
}

/**
 * Validate Address
 * URL: https://github.com/niksmac/btc-validate/blob/master/src/btc-validate.php
 * 
 * @param  mixed  $address
 * @return string
 */
function validateAddress($address)
{
    $decoded = decodeBase58($address);
    $d1 = hash("sha256", substr($decoded,0,21), true);
    $d2 = hash("sha256", $d1, true);
    if(substr_compare($decoded, $d2, 21, 4)) {
        throw new \Throwable("bad digest");
    }
    return true;
}

/**
 * decodeBase58
 * URL: https://github.com/niksmac/btc-validate/blob/master/src/btc-validate.php
 * 
 * @param  string  $input
 * @return string
 */
function decodeBase58($input)
{
    $alphabet = "123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz";
    $out = array_fill(0, 25, 0);
    for($i=0;$i<strlen($input);$i++) {
        if(($p=strpos($alphabet, $input[$i]))===false) {
            throw new \Throwable("invalid character found");
        }
        $c = $p;
        for ($j = 25; $j--; ) {
            $c += (int)(58 * $out[$j]);
            $out[$j] = (int)($c % 256);
            $c /= 256;
            $c = (int)$c;
        }
        if($c != 0) {
            throw new \Throwable("address too long");
        }
    }
    $result = "";
    foreach($out as $val) {
        $result .= chr($val);
    }
    return $result;
}