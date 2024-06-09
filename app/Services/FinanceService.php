<?php
namespace App\Services;


class FinanceService
{
    public static function calculateIncomeTax($salary)
    {
        // If salary is >= 0 and <= 150 it will be 0% (Nill),

        // If salary is >= 151 and <= 650 it will be 10% - 15.00,

        // If salary is >= 651 and <= 1400 it will be 15% - 47.50,

        // If salary is >= 1401 and <= 2350 it will be 20% -117.50,

        // If salary is >= 2351 and <= 3550 it will be 25% - 235.00,

        // If salary is >= 3551 and <= 5000 it will be 30% - 412.5,
        
        // If salary is >= 5001 it will be 35% - 662.50
    }
}
