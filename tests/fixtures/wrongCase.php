<?php

function get_amount()
{
    return amount;
}

function negate()
{
    return new Money(-1 * $amount);
}
