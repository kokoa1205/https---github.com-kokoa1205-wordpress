<?php
require 'holiday_function.php';


if (isset($_POST['submit'])) {
    updateHolidayWeek($_POST['closedWeek']);
    updateHolidayDays($_POST['closedDays']);
    updateHoliday($_POST['days'], $_POST['closedWeek'], $_POST['closedDays']);
}


// 定休日の週を取得
$holidayWeeks = getHolidayWeek();
$holidayWeeks = array_column($holidayWeeks, 'week');

// 定休日の曜日を取得
$holidayDays = getHolidayDays();
$holidayDays = array_column($holidayDays, 'day');

// 曜日名を配列に
$dayNames = [
  '',
  '日',
  '月',
  '火',
  '水',
  '木',
  '金',
  '土'
];

// 定休日の日付を取得
$holidays = getHolidays();
$holidays = array_column($holidays, 'day');


//
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    $ym = date('Y-m');
}

$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

$html_title = date('Y年n月', $timestamp);

$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

?>

<style>
@media screen and (max-width: 959px) {

  label,
  button,
  th,
  tr,
  td {
    font-size: 8px !important;
  }

  .yearMonthTitle {
    font-size: 12px;
  }
}

.container {
  font-family: 'Noto Sans JP', sans-serif;
}

a {
  text-decoration: none;
}

th {
  height: 30px;
  text-align: center;
}

td {
  height: 30px;
  padding: 0;
}

.today {
  background: orange !important;
}

th:nth-of-type(1),
td:nth-of-type(1) {
  color: red;
}

th:nth-of-type(7),
td:nth-of-type(7) {
  color: blue;
}
</style>
<div class="wrap">
  <h2>定休日入力画面</h2>
  <form method="post">
    <div class="col p-3 mb-2 alert-primary text-dark rounded">
      <div class="row">
        <label class="col col-form-label fw-bold" for="inputGroupSelect01">第何週を定休日にするかを選択してください</label>
        <div class="input-group mb-3">
          <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <?php for ($i=1; $i<=6; $i++) : ?>
            <?php if (isHoliday($i, $holidayWeeks)): ?>
            <input type="checkbox" class="btn-check" id="closedWeek<?php echo $i; ?>" autocomplete="off"
              value="<?php echo $i; ?>" name="closedWeek[]" checked>
            <label class="btn btn-outline-success" for="closedWeek<?php echo $i; ?>"><?php echo $i ?>週目</label>
            <?php else: ?>
            <input type="checkbox" class="btn-check" id="closedWeek<?php echo $i; ?>" autocomplete="off"
              value="<?php echo $i; ?>" name="closedWeek[]">
            <label class="btn btn-outline-success" for="closedWeek<?php echo $i; ?>"><?php echo $i ?>週目</label>
            <?php endif; ?>
            <?php endfor; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <label class="col col-form-label fw-bold" for="inputGroupSelect01">第曜日を定休日にするかを選択してください</label>
        <div class="input-group mb-3">
          <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <?php for ($i=1; $i<count($dayNames); $i++): ?>
            <?php if (isHoliday($i, $holidayDays)): ?>
            <input type="checkbox" class="btn-check" id="closedDays<?php echo $i ?>" autocomplete="off"
              value="<?php echo $i ?>" name="closedDays[]" checked>
            <label class="btn btn-outline-success" for="closedDays<?php echo $i ?>"><?php echo $dayNames[$i] ?></label>
            <?php else: ?>
            <input type="checkbox" class="btn-check" id="closedDays<?php echo $i ?>" autocomplete="off"
              value="<?php echo $i ?>" name="closedDays[]">
            <label class="btn btn-outline-success" for="closedDays<?php echo $i ?>"><?php echo $dayNames[$i] ?></label>
            <?php endif; ?>
            <?php endfor; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="container mt-2">
          <h3 class="mb-3 yearMonthTitle"><a href="<?php echo get_the_permalink('&ym='.$prev); ?>">&lt;</a>
            <?php echo $html_title; ?> <a href="<?php echo get_the_permalink(); ?>&ym=<?php echo $next ?>">&gt;</a>
          </h3>
          <label class="col col-form-label fw-bold" for="inputGroupSelect01">定休日にする日を選択してください</label>
          <table class="table table-primary table-sm table-bordered">
            <tr>
              <th>日</th>
              <th>月</th>
              <th>火</th>
              <th>水</th>
              <th>木</th>
              <th>金</th>
              <th>土</th>
            </tr>
            <?php printCalendar($holidays, $ym, $holidayWeeks, $holidayDays); ?>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col text-end">
          <button class="btn btn-primary col-auto" type="submit" name="submit" style="min-width: 8em;">
            <i class="fas fa-check me-2"></i>登録
          </button>
        </div>
      </div>
  </form>
</div>