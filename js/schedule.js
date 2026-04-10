document.addEventListener("DOMContentLoaded", function () {
  //出勤情報の切り替え

  // 日付タブの要素を取得
  var dateTabs = document.querySelectorAll(".schedule-content__week--tab");

  // 日付タブの要素にクリックイベントを追加
  dateTabs.forEach(function (tab) {
    tab.addEventListener("click", function () {
      // すべての日付タブの背景色をリセット
      dateTabs.forEach(function (tab) {
        tab.classList.remove("selected");
      });
      // クリックされた日付タブに背景色を適用
      this.classList.add("selected");
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const radios = document.querySelectorAll('input[name="date-select"]');
  const scheduleBoxes = document.querySelectorAll(".schedule-box");

  // デフォルトでday0のボックスを表示
  scheduleBoxes.forEach((box, index) => {
    box.style.display = index === 0 ? "block" : "none";
  });

  radios.forEach((radio) => {
    radio.addEventListener("change", function () {
      const selectedIndex = this.id.replace("day", "");
      scheduleBoxes.forEach((box, index) => {
        if (index == selectedIndex) {
          box.style.display = "block"; // 選択されたボックスを表示
        } else {
          box.style.display = "none"; // 他のボックスを非表示
        }
      });
    });
  });
});
