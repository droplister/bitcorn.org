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