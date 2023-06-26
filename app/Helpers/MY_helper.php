<?php
function format_rupiah($nominal)
{
    // return 'Rp. ' . number_format($nominal, 0, ',', '.');
    return CURRENCY_SYMBOL . '. ' . number_format($nominal, 0, ',', '.');
    // return CURRENCY_SYMBOL . '. ' . number_to_currency($nominal, CURRENCY_CODE, null, 2);
}
