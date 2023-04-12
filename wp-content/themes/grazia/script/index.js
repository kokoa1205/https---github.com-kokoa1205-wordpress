// jQuery(document).on('ready', function () {
//   jQuery(".news-slider").slick({
//     autoplay: true, // 自動でスクロール
//     swipe: true,
//     dots: true,
//     infinite: true,
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     responsive: [
//       {
//         breakpoint: 959,
//         settings: {
//           slidesToShow: 2,
//           slidesToScroll: 1,
//           infinite: true,
//           dots: true
//         }
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           slidesToShow: 1,
//           slidesToScroll: 1
//         }
//       }
//     ]
//   });
// });
jQuery(function($){
  $(".style-slider").slick({
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 3000,
    dots: true,
    arrows: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 959,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});



// jQuery(".openbtn1").click(function () {//ボタンがクリックされたら
//   jQuery(this).toggleClass('active');//ボタン自身に activeクラスを付与し
//   jQuery("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
//   jQuery(".blur-wrapper").toggleClass('mainblur');//ぼかしたいエリアにmainblurクラスを付与
// });

// jQuery("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
//   jQuery(".openbtn1").removeClass('active');//ボタンの activeクラスを除去し
//   jQuery("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスを除去し
//   jQuery(".blur-wrapper").removeClass('mainblur');//ぼかしているエリアのmainblurクラスを除去
// });

// 動きのきっかけとなるアニメーションの名前を定義
function fadeAnime() {
  // ふわっ
  jQuery('.fadeUpTrigger').each(function () { //fadeUpTriggerというクラス名が
    var elemPos = jQuery(this).offset().top - 50;//要素より、50px上の
    var scroll = jQuery(window).scrollTop();
    var windowHeight = jQuery(window).height();
    if (scroll >= elemPos - windowHeight) {
      jQuery(this).addClass('fadeUp');// 画面内に入ったらfadeUpというクラス名を追記
    } else {
      jQuery(this).removeClass('fadeUp');// 画面外に出たらfadeUpというクラス名を外す
    }
  });

  // じわっ
  jQuery('.blurTrigger').each(function () { //blurTriggerというクラス名が
    var elemPos = jQuery(this).offset().top - 50;//要素より、50px上の
    var scroll = jQuery(window).scrollTop();
    var windowHeight = jQuery(window).height();
    if (scroll >= elemPos - windowHeight) {
      jQuery(this).addClass('blur');// 画面内に入ったらblurというクラス名を追記
    } else {
      jQuery(this).removeClass('blur');// 画面外に出たらblurというクラス名を外す
    }
  });
}


// newsの文字数制限
jQuery(function () {
  var title_count = 30;
  var text_count = 35;

  // タイトルの文字制限
  jQuery('.title_limit').each(function () {
    var thisText = jQuery(this).text();
    var textLength = thisText.length;
    if (textLength > title_count) {
      var showText = thisText.substring(0, title_count);
      var insertText = showText += '…';
      jQuery(this).html(insertText);
    };
  });

  jQuery('.text_limit').each(function () {
    var thisText = jQuery(this).text();
    var textLength = thisText.length;
    if (textLength > text_count) {
      var showText = thisText.substring(0, text_count);
      var insertText = showText += '…';
      jQuery(this).html(insertText);
    };
  });
});


// // 画面をスクロールをしたら動かしたい場合の記述
// jQuery(window).scroll(function () {
//   fadeAnime();/* アニメーション用の関数を呼ぶ*/
// });// ここまで画面をスクロールをしたら動かしたい場合の記述


const week = ["日", "月", "火", "水", "木", "金", "土"];
const today = new Date();
// 月末だとずれる可能性があるため、1日固定で取得
var showDate = new Date(today.getFullYear(), today.getMonth(), 1);

// 初期表示
window.onload = function () {
  showProcess(today, calendar);
};
// 前の月表示
function prev() {
  showDate.setMonth(showDate.getMonth() - 1);
  showProcess(showDate);
}

// 次の月表示
function next() {
  showDate.setMonth(showDate.getMonth() + 1);
  showProcess(showDate);
}

// カレンダー表示
function showProcess(date) {
  var year = date.getFullYear();
  var month = date.getMonth();
  document.querySelector('#header').innerHTML = year + "年 " + (month + 1) + "月";

  var calendar = createProcess(year, month);
  document.querySelector('#calendar').innerHTML = calendar;
}

// カレンダー作成
function createProcess(year, month) {
  // 曜日
  var calendar = "<table><tr class='dayOfWeek'>";
  for (var i = 0; i < week.length; i++) {
    calendar += "<th>" + week[i] + "</th>";
  }
  calendar += "</tr>";

  var count = 0;
  var startDayOfWeek = new Date(year, month, 1).getDay();
  var endDate = new Date(year, month + 1, 0).getDate();
  var lastMonthEndDate = new Date(year, month, 0).getDate();
  var row = Math.ceil((startDayOfWeek + endDate) / week.length);

  // 1行ずつ設定
  for (var i = 0; i < row; i++) {
    calendar += "<tr>";
    // 1colum単位で設定
    for (var j = 0; j < week.length; j++) {
      if (i == 0 && j < startDayOfWeek) {
        // 1行目で1日まで先月の日付を設定
        calendar += "<td class='disabled'>" + (lastMonthEndDate - startDayOfWeek + j + 1) + "</td>";
      } else if (count >= endDate) {
        // 最終行で最終日以降、翌月の日付を設定
        count++;
        calendar += "<td class='disabled'>" + (count - endDate) + "</td>";
      } else {
        // 当月の日付を曜日に照らし合わせて設定
        count++;
        if (year == today.getFullYear()
          && month == (today.getMonth())
          && count == today.getDate()) {
          calendar += "<td class='today'>" + count + "</td>";
        } else {
          calendar += "<td>" + count + "</td>";
        }
      }
    }
    calendar += "</tr>";
  }
  return calendar;
}

// (function () {
//   window.cookieconsent.initialise({
//     "palette": {
//       "popup": {
//         "background": "#efefef",
//         "text": "#404040"
//       },
//       "button": {
//         "background": "#8ec760",
//         "text": "#ffffff"
//       }
//     },
//     "theme": "classic",
//     "position": "bottom-left",
//     "type": "opt-in"
//   });
// })();
