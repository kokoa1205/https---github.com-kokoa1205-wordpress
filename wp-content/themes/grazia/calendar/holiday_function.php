<?php

// 定休日の週を取得
function getBisinessHours()
{
    global $wpdb;
    $sql = "";
    $sql .= " SELECT";
    $sql .= " *";
    $sql .= " FROM";
    $sql .= " {$wpdb->prefix}shop_business_hours";
    return $wpdb->get_results($sql, ARRAY_A);
}

// 定休日の週を取得
function getHolidayWeek()
{
    global $wpdb;
    $sql = "";
    $sql .= " SELECT";
    $sql .= " week";
    $sql .= " FROM";
    $sql .= " {$wpdb->prefix}holiday_week";
    return $wpdb->get_results($sql, ARRAY_A);
}

// 定休日の曜日を取得
function getHolidayDays()
{
    global $wpdb;
    $sql = "";
    $sql .= " SELECT";
    $sql .= " day";
    $sql .= " FROM";
    $sql .= " {$wpdb->prefix}holiday_day";
    return $wpdb->get_results($sql, ARRAY_A);
}

// 定休日の取得
function getHolidays()
{
    global $wpdb;
    $sql = "";
    $sql .= " SELECT";
    $sql .= " *";
    $sql .= " FROM";
    $sql .= " {$wpdb->prefix}holiday";
    $sql .= " WHERE";
    $sql .= " year = ".date('Y');
    $sql .= " and month = ".date('n');
    return $wpdb->get_results($sql, ARRAY_A);
}

function updateBusinessHours($openHours, $closeHours)
{
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->prefix}shop_business_hours");

    // 営業時間を挿入する
    $sql = "";
    $sql .= " INSERT";
    $sql .= " INTO";
    $sql .= " {$wpdb->prefix}shop_business_hours";
    $sql .= " (start, end)";
    $sql .= " VALUES";
    $sql .= " (".$openHours.", ".$closeHours.") ";

    $results = $wpdb->query($sql);
}

// 定休日の週を更新
function updateHolidayWeek($closedWeek)
{
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->prefix}holiday_week");

    // 定休日に設定する
    $sql = "";
    $sql .= " INSERT";
    $sql .= " INTO";
    $sql .= " {$wpdb->prefix}holiday_week";
    $sql .= " (week)";
    $sql .= " VALUES";

    for ($i = 0;$i < count($closedWeek); $i++) {
        $sql .= "  (";
        $sql .= $closedWeek[$i];
        $sql .= ")";
        if ($i != count($closedWeek)-1) {
            $sql .= ", ";
        }
    }
    $results = $wpdb->query($sql);

}


// 定休日の曜日を更新
function updateHolidayDays($closedDay)
{
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->prefix}holiday_day");

    // 定休日に設定する
    $sql = "";
    $sql .= " INSERT";
    $sql .= " INTO";
    $sql .= " {$wpdb->prefix}holiday_day";
    $sql .= " (day)";
    $sql .= " VALUES";

    for ($i = 0;$i < count($closedDay); $i++) {
        $sql .= "  (";
        $sql .= $closedDay[$i];
        $sql .= ")";
        if ($i != count($closedDay)-1) {
            $sql .= ", ";
        }
    }
    $results = $wpdb->query($sql);

}

// 定休日の更新
function updateHoliday($days, $closedWeek, $closedDay)
{
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->prefix}holiday where year = ".date('Y')." and month = ".date('n'));


    $updateDays = addUpdateDayArray($days, $closedWeek, $closedDay);

    // 定休日に設定する
    $sql = "";
    $sql .= " INSERT";
    $sql .= " INTO";
    $sql .= " {$wpdb->prefix}holiday";
    $sql .= " (year, month, day)";
    $sql .= " VALUES";
    for ($i = 0;$i < count($updateDays); $i++) {
        $sql .= "  (";
        $sql .= " ".date('Y')." , ";
        $sql .= " ".date('n')." , ";
        $sql .= $updateDays[$i];
        $sql .= ")";
        if ($i != count($updateDays)-1) {
            $sql .= ", ";
        }
    }
    $results = $wpdb->query($sql);
}

// 定休日の週と曜日からの定休日を配列に追加
function addUpdateDayArray($days, $closedWeek, $closedDay)
{
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }
    $day_count = date('t', $timestamp);
    $youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
    $day_count = date('t', $timestamp);

    for ($day = 1; $day <= $day_count; $day++, $youbi++) {
        if ((isHoliday(floor($youbi/7)+1, $closedWeek) && isHolidayDays($youbi, $closedDay))) {
            array_push($days, $day);
        }
    }
    return array_unique($days);
}



// 定休日かどうかの判定
function isHoliday($num, $holidayArray)
{
    for ($i = 0; $i < count($holidayArray);$i++) {
        if ($holidayArray[$i] == $num) {
            return true;
        }
    }
    return false;
}

function isHolidayDays($num, $holidayArray)
{
    if (!($num < 6)) {
        $num = $num % 7;
    }
    for ($i = 0; $i < count($holidayArray);$i++) {
        if ($holidayArray[$i] == $num+1) {
            return true;
        }
    }
}


// カレンダーのテーブル作成
function printCalendar($holidays, $ym, $holidayWeeks, $holidayDays)
{
    // タイムゾーンを設定
    date_default_timezone_set('Asia/Tokyo');

    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }

    $today = date('Y-m-j');

    $day_count = date('t', $timestamp);

    $youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

    $weeks = [];
    $week = '';

    $week .= str_repeat('<td></td>', $youbi);

    for ($day = 1; $day <= $day_count; $day++, $youbi++) {
        $date = $ym . '-' . $day;

        if ($today == $date) {
            if (isHoliday($day, $holidays)) {
                $week .= '<td class="today text-center"><input type="checkbox" class="btn-check" id="days'.$day.'" autocomplete="off" value="'.$day.'" name="days[]" checked><label class="btn btn-outline-success" for="days'.$day.'">'.$day.'</label>';

            } else {
                $week .= '<td class="today text-center"><input type="checkbox" class="btn-check" id="days'.$day.'" autocomplete="off" value="'.$day.'" name="days[]"><label class="btn btn-outline-success" for="days'.$day.'">'.$day.'</label>';
            }
        } else {
            // if (isHoliday($day, $holidays) || (isHoliday(floor($youbi/7)+1, $holidayWeeks) && isHolidayDays($youbi, $holidayDays))) {
            if (isHoliday($day, $holidays)) {
                $week .= '<td class="text-center"><input type="checkbox" class="btn-check" id="days'.$day.'" autocomplete="off" value="'.$day.'" name="days[]" checked><label class="btn btn-outline-success" for="days'.$day.'">'.$day.'</label>';
            } else {
                $week .= '<td class="text-center"><input type="checkbox" class="btn-check" id="days'.$day.'" autocomplete="off" value="'.$day.'" name="days[]"><label class="btn btn-outline-success" for="days'.$day.'">'.$day.'</label>';
            }
        }
        $week .= '</td>';
        if ($youbi % 7 == 6 || $day == $day_count) {
            if ($day == $day_count) {
                $week .= str_repeat('<td></td>', 6 - $youbi % 7);
            }
            $weeks[] = '<tr>' . $week . '</tr>';
            $week = '';
        }
    }

    foreach ($weeks as $week) {
        echo $week;
    }


}