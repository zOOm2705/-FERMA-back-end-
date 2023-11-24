<?php

function countPromotionDays($year)
{
    $promotionDates = [];
    $countTables = 0;
    $countChairs = 0;
    
    for ($i = 2000; $i <= $year; $i++) {
        for ($month = 1; $month <= 12; $month++) {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $i);
            
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = $day . "-е " . date("M", mktime(0, 0, 0, $month, 10)) . " " . $i;
                
                if ($countTables > $countChairs && $day % 2 == 0) {
                    $promotionDates[] = $date;
                } elseif ($countChairs > $countTables && $day % 2 != 0) {
                    $promotionDates[] = $date;
                }
                
                if ($day % 2 == 0) {
                    $countChairs++;
                } else {
                    $countTables++;
                }
            }
        }
    }
    
    return $promotionDates;
}

$year = 2023;
$promotionDays = countPromotionDays($year);

foreach ($promotionDays as $date) {
    echo $date . "<br>";
}

?>
