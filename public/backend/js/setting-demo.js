"use strict";

// Setting Color

$(window).resize(function () {
  $(window).width();
});

getCheckmark();

$(".changeBodyBackgroundFullColor").on("click", function () {
  if ($(this).attr("data-color") == "default") {
    $("body").removeAttr("data-background-full");
  } else {
    $("body").attr("data-background-full", $(this).attr("data-color"));
  }

  $(this).parent().find(".changeBodyBackgroundFullColor").removeClass("selected");
  $(this).addClass("selected");
  layoutsColors();
  getCheckmark();
});

$(".changeLogoHeaderColor").on("click", function () {
  var color = $(this).attr("data-color");

  if (color == "default") {
    $(".logo-header").removeAttr("data-background-color");
  } else {
    $(".logo-header").attr("data-background-color", color);
    localStorage.setItem("logoHeaderColor", color); // SIMPAN
  }

  $(this).parent().find(".changeLogoHeaderColor").removeClass("selected");
  $(this).addClass("selected");

  customCheckColor();
  layoutsColors();
  getCheckmark();
});

$(".changeTopBarColor").on("click", function () {
  var color = $(this).attr("data-color");

  if (color == "default") {
    $(".main-header .navbar-header").removeAttr("data-background-color");
    localStorage.removeItem("topBarColor"); // Hapus jika default
  } else {
    $(".main-header .navbar-header").attr("data-background-color", color);
    localStorage.setItem("topBarColor", color); // SIMPAN warna
  }

  $(this).parent().find(".changeTopBarColor").removeClass("selected");
  $(this).addClass("selected");
  layoutsColors();
  getCheckmark();
});


$(".changeSideBarColor").on("click", function () {
  var color = $(this).attr("data-color");

  if (color == "default") {
    $(".sidebar").removeAttr("data-background-color");
    localStorage.removeItem("sideBarColor"); // Hapus jika default
  } else {
    $(".sidebar").attr("data-background-color", color);
    localStorage.setItem("sideBarColor", color); // Simpan warna sidebar
  }

  $(this).parent().find(".changeSideBarColor").removeClass("selected");
  $(this).addClass("selected");
  layoutsColors();
  getCheckmark();
});

$(".changeBackgroundColor").on("click", function () {
  $("body").removeAttr("data-background-color");
  $("body").attr("data-background-color", $(this).attr("data-color"));
  $(this).parent().find(".changeBackgroundColor").removeClass("selected");
  $(this).addClass("selected");
  getCheckmark();
});

function customCheckColor() {
  var logoHeader = $(".logo-header").attr("data-background-color");
  if (logoHeader !== "white") {
    $(".logo-header .navbar-brand").attr("src", $(".navbar-brand").data("logo-light"));
  } else {
    $(".logo-header .navbar-brand").attr("src", $(".navbar-brand").data("logo-dark"));
  }
}

var toggle_customSidebar = false,
  custom_open = 0;

if (!toggle_customSidebar) {
  var toggle = $(".custom-template .custom-toggle");

  toggle.on("click", function () {
    if (custom_open == 1) {
      $(".custom-template").removeClass("open");
      toggle.removeClass("toggled");
      custom_open = 0;
    } else {
      $(".custom-template").addClass("open");
      toggle.addClass("toggled");
      custom_open = 1;
    }
  });
  toggle_customSidebar = true;
}

function getCheckmark() {
  var checkmark = `<i class="gg-check"></i>`;
  $(".btnSwitch").find("button").empty();
  $(".btnSwitch").find("button.selected").append(checkmark);
}

$(document).ready(function () {
  var logoColor = localStorage.getItem("logoHeaderColor");
  if (logoColor) {
    $(".logo-header").attr("data-background-color", logoColor);
    $(".changeLogoHeaderColor[data-color='" + logoColor + "']").addClass("selected");
    customCheckColor();
  }

  var topBarColor = localStorage.getItem("topBarColor");
  if (topBarColor) {
    $(".main-header .navbar-header").attr("data-background-color", topBarColor);
    $(".changeTopBarColor[data-color='" + topBarColor + "']").addClass("selected");
  }

  var sideBarColor = localStorage.getItem("sideBarColor");
  if (sideBarColor) {
    $(".sidebar").attr("data-background-color", sideBarColor);
    $(".changeSideBarColor[data-color='" + sideBarColor + "']").addClass("selected");
  }

  getCheckmark();
});

function updateTopbarTextColor() {
  var topBarColor = $(".main-header .navbar-header").attr("data-background-color");

  if (topBarColor === "dark" || topBarColor === "dark2") {
    $(".dynamic-text").css("color", "#ffffff");
  } else {
    $(".dynamic-text").css("color", "#000000");
  }
}

$(document).ready(function () {
  updateTopbarTextColor();
});

$(".changeTopBarColor").on("click", function () {
  updateTopbarTextColor();
});

document.querySelectorAll('.changeLogoHeaderColor').forEach(button => {
  button.addEventListener('click', function () {
    const color = this.getAttribute('data-color');
    const textElement = document.getElementById('headerText');

    if (color === 'white') {
      textElement.classList.remove('text-white');
      textElement.classList.add('text-dark');
    } else {
      textElement.classList.remove('text-dark');
      textElement.classList.add('text-white');
    }
  });
});

function updateLogoTextColor() {
  var bgColor = $(".logo-header").attr("data-background-color");

  if (bgColor === "white") {
    $(".text-logo").removeClass("text-white").addClass("text-dark");
  } else {
    $(".text-logo").removeClass("text-dark").addClass("text-white");
  }
}

$(document).ready(function () {
  updateLogoTextColor();
});

$(".changeLogoHeaderColor").on("click", function () {
  var selectedColor = $(this).data("color");
  $(".logo-header").attr("data-background-color", selectedColor);
  updateLogoTextColor();
});
