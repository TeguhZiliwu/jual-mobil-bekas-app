/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./public/assets/js/custom.js ***!
  \************************************/
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
(function () {
  "use strict";

  /* page loader */
  function hideLoader() {
    var loader = document.getElementById("loader");
    loader.classList.add("d-none");
  }
  window.addEventListener("load", hideLoader);
  /* page loader */

  /* tooltip */
  var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  var tooltipList = _toConsumableArray(tooltipTriggerList).map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  /* popover  */
  var popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
  var popoverList = _toConsumableArray(popoverTriggerList).map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });

  //switcher color pickers
  var pickrContainerPrimary = document.querySelector(".pickr-container-primary");
  var themeContainerPrimary = document.querySelector(".theme-container-primary");
  var pickrContainerBackground = document.querySelector(".pickr-container-background");
  var themeContainerBackground = document.querySelector(".theme-container-background");

  /* for theme primary */
  var nanoThemes = [["nano", {
    defaultRepresentation: "RGB",
    components: {
      preview: true,
      opacity: false,
      hue: true,
      interaction: {
        hex: false,
        rgba: true,
        hsva: false,
        input: true,
        clear: false,
        save: false
      }
    }
  }]];
  var nanoButtons = [];
  var nanoPickr = null;
  var _loop = function _loop() {
    var _nanoThemes$_i = _slicedToArray(_nanoThemes[_i], 2),
      theme = _nanoThemes$_i[0],
      config = _nanoThemes$_i[1];
    var button = document.createElement("button");
    button.innerHTML = theme;
    nanoButtons.push(button);
    button.addEventListener("click", function () {
      var el = document.createElement("p");
      pickrContainerPrimary.appendChild(el);

      /* Delete previous instance */
      if (nanoPickr) {
        nanoPickr.destroyAndRemove();
      }

      /* Apply active class */
      for (var _i2 = 0, _nanoButtons = nanoButtons; _i2 < _nanoButtons.length; _i2++) {
        var btn = _nanoButtons[_i2];
        btn.classList[btn === button ? "add" : "remove"]("active");
      }

      /* Create fresh instance */
      nanoPickr = new Pickr(Object.assign({
        el: el,
        theme: theme,
        "default": "#0162e8"
      }, config));

      /* Set events */
      nanoPickr.on("changestop", function (source, instance) {
        var color = instance.getColor().toRGBA();
        var html = document.querySelector("html");
        html.style.setProperty("--primary-rgb", "".concat(Math.floor(color[0]), ", ").concat(Math.floor(color[1]), ", ").concat(Math.floor(color[2])));
        /* theme color picker */
        localStorage.setItem("primaryRGB", "".concat(Math.floor(color[0]), ", ").concat(Math.floor(color[1]), ", ").concat(Math.floor(color[2])));
        updateColors();
      });
    });
    themeContainerPrimary.appendChild(button);
  };
  for (var _i = 0, _nanoThemes = nanoThemes; _i < _nanoThemes.length; _i++) {
    _loop();
  }
  nanoButtons[0].click();
  /* for theme primary */

  /* for theme background */
  var nanoThemes1 = [["nano", {
    defaultRepresentation: "RGB",
    components: {
      preview: true,
      opacity: false,
      hue: true,
      interaction: {
        hex: false,
        rgba: true,
        hsva: false,
        input: true,
        clear: false,
        save: false
      }
    }
  }]];
  var nanoButtons1 = [];
  var nanoPickr1 = null;
  var _loop2 = function _loop2() {
    var _nanoThemes2$_i = _slicedToArray(_nanoThemes2[_i3], 2),
      theme = _nanoThemes2$_i[0],
      config = _nanoThemes2$_i[1];
    var button = document.createElement("button");
    button.innerHTML = theme;
    nanoButtons1.push(button);
    button.addEventListener("click", function () {
      var el = document.createElement("p");
      pickrContainerBackground.appendChild(el);

      /* Delete previous instance */
      if (nanoPickr1) {
        nanoPickr1.destroyAndRemove();
      }

      /* Apply active class */
      for (var _i4 = 0, _nanoButtons2 = nanoButtons; _i4 < _nanoButtons2.length; _i4++) {
        var btn = _nanoButtons2[_i4];
        btn.classList[btn === button ? "add" : "remove"]("active");
      }

      /* Create fresh instance */
      nanoPickr1 = new Pickr(Object.assign({
        el: el,
        theme: theme,
        "default": "#0162e8"
      }, config));

      /* Set events */
      nanoPickr1.on("changestop", function (source, instance) {
        var color = instance.getColor().toRGBA();
        var html = document.querySelector("html");
        html.style.setProperty("--body-bg-rgb", "".concat(color[0], ", ").concat(color[1], ", ").concat(color[2]));
        document.querySelector("html").style.setProperty("--light-rgb", "".concat(color[0] + 14, ", ").concat(color[1] + 14, ", ").concat(color[2] + 14));
        document.querySelector("html").style.setProperty("--form-control-bg", "rgb(".concat(color[0] + 14, ", ").concat(color[1] + 14, ", ").concat(color[2] + 14, ")"));
        localStorage.removeItem("bgtheme");
        updateColors();
        html.setAttribute("data-theme-mode", "dark");
        html.setAttribute("data-menu-styles", "dark");
        html.setAttribute("data-header-styles", "dark");
        document.querySelector("#switcher-dark-theme").checked = true;
        localStorage.setItem("bodyBgRGB", "".concat(color[0], ", ").concat(color[1], ", ").concat(color[2]));
        localStorage.setItem("bodylightRGB", "".concat(color[0] + 14, ", ").concat(color[1] + 14, ", ").concat(color[2] + 14));
      });
    });
    themeContainerBackground.appendChild(button);
  };
  for (var _i3 = 0, _nanoThemes2 = nanoThemes; _i3 < _nanoThemes2.length; _i3++) {
    _loop2();
  }
  nanoButtons1[0].click();
  /* for theme background */

  /* header theme toggle */
  function toggleTheme() {
    var html = document.querySelector("html");
    if (html.getAttribute("data-theme-mode") === "dark") {
      html.setAttribute("data-theme-mode", "light");
      html.setAttribute("data-header-styles", "light");
      html.setAttribute("data-menu-styles", "light");
      if (!localStorage.getItem("primaryRGB")) {
        html.setAttribute("style", "");
      }
      html.removeAttribute("data-bg-theme");
      document.querySelector("#switcher-light-theme").checked = true;
      document.querySelector("#switcher-menu-light").checked = true;
      document.querySelector("html").style.removeProperty("--body-bg-rgb", localStorage.bodyBgRGB);
      checkOptions();
      html.style.removeProperty("--light-rgb");
      html.style.removeProperty("--form-control-bg");
      html.style.removeProperty("--input-border");
      document.querySelector("#switcher-header-light").checked = true;
      document.querySelector("#switcher-menu-light").checked = true;
      document.querySelector("#switcher-light-theme").checked = true;
      document.querySelector("#switcher-background4").checked = false;
      document.querySelector("#switcher-background3").checked = false;
      document.querySelector("#switcher-background2").checked = false;
      document.querySelector("#switcher-background1").checked = false;
      document.querySelector("#switcher-background").checked = false;
      localStorage.removeItem("valexdarktheme");
      localStorage.removeItem("valexMenu");
      localStorage.removeItem("valexHeader");
      localStorage.removeItem("bodylightRGB");
      localStorage.removeItem("bodyBgRGB");
      if (localStorage.getItem("valexlayout") != "horizontal") {
        html.setAttribute("data-menu-styles", "light  ");
      }
      html.setAttribute("data-header-styles", "light");
    } else {
      html.setAttribute("data-theme-mode", "dark");
      html.setAttribute("data-header-styles", "dark");
      if (!localStorage.getItem("primaryRGB")) {
        html.setAttribute("style", "");
      }
      html.setAttribute("data-menu-styles", "dark");
      document.querySelector("#switcher-dark-theme").checked = true;
      document.querySelector("#switcher-menu-dark").checked = true;
      document.querySelector("#switcher-header-dark").checked = true;
      checkOptions();
      document.querySelector("#switcher-menu-dark").checked = true;
      document.querySelector("#switcher-header-dark").checked = true;
      document.querySelector("#switcher-dark-theme").checked = true;
      document.querySelector("#switcher-background4").checked = false;
      document.querySelector("#switcher-background3").checked = false;
      document.querySelector("#switcher-background2").checked = false;
      document.querySelector("#switcher-background1").checked = false;
      document.querySelector("#switcher-background").checked = false;
      localStorage.setItem("valexdarktheme", "true");
      localStorage.setItem("valexMenu", "dark");
      localStorage.setItem("valexHeader", "dark");
      localStorage.removeItem("bodylightRGB");
      localStorage.removeItem("bodyBgRGB");
    }
  }
  var layoutSetting = document.querySelector(".layout-setting");
  layoutSetting.addEventListener("click", toggleTheme);
  /* header theme toggle */

  /* Choices JS */
  document.addEventListener("DOMContentLoaded", function () {
    var genericExamples = document.querySelectorAll("[data-trigger]");
    for (var _i5 = 0; _i5 < genericExamples.length; ++_i5) {
      var element = genericExamples[_i5];
      new Choices(element, {
        allowHTML: true,
        placeholderValue: "This is a placeholder set in the config",
        searchPlaceholderValue: "Search"
      });
    }
  });
  /* Choices JS */

  /* footer year */
  document.getElementById("year").innerHTML = new Date().getFullYear();
  /* footer year */

  /* node waves */
  Waves.attach(".btn-wave", ["waves-light"]);
  Waves.init();
  /* node waves */

  /* card with close button */
  var DIV_CARD = ".card";
  var cardRemoveBtn = document.querySelectorAll('[data-bs-toggle="card-remove"]');
  cardRemoveBtn.forEach(function (ele) {
    ele.addEventListener("click", function (e) {
      e.preventDefault();
      var $this = this;
      var card = $this.closest(DIV_CARD);
      card.remove();
      return false;
    });
  });
  /* card with close button */

  /* card with fullscreen */
  var cardFullscreenBtn = document.querySelectorAll('[data-bs-toggle="card-fullscreen"]');
  cardFullscreenBtn.forEach(function (ele) {
    ele.addEventListener("click", function (e) {
      var $this = this;
      var card = $this.closest(DIV_CARD);
      card.classList.toggle("card-fullscreen");
      card.classList.remove("card-collapsed");
      e.preventDefault();
      return false;
    });
  });
  /* card with fullscreen */

  /* count-up */
  var i = 1;
  setInterval(function () {
    document.querySelectorAll(".count-up").forEach(function (ele) {
      if (ele.getAttribute("data-count") >= i) {
        i = i + 1;
        ele.innerText = i;
      }
    });
  }, 10);
  /* count-up */

  /* back to top */
  var scrollToTop = document.querySelector(".scrollToTop");
  var $rootElement = document.documentElement;
  var $body = document.body;
  window.onscroll = function () {
    var scrollTop = window.scrollY || window.pageYOffset;
    var clientHt = $rootElement.scrollHeight - $rootElement.clientHeight;
    if (window.scrollY > 100) {
      scrollToTop.style.display = "flex";
    } else {
      scrollToTop.style.display = "none";
    }
  };
  scrollToTop.onclick = function () {
    window.scrollTo(0, 0);
  };
  /* back to top */

  /* header dropdowns scroll */

  // var myHeadernotification = document.getElementById("header-notification-scroll");
  // new SimpleBar(myHeadernotification, {
  //   autoHide: true
  // });
  var myHeaderCart = document.getElementById("header-cart-items-scroll");
  new SimpleBar(myHeaderCart, {
    autoHide: true
  });
  /* header dropdowns scroll */
})();

/* full screen */
var elem = document.documentElement;
function openFullscreen() {
  var open = document.querySelector(".full-screen-open");
  var close = document.querySelector(".full-screen-close");
  if (!document.fullscreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.webkitRequestFullscreen) {
      /* Safari */
      elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) {
      /* IE11 */
      elem.msRequestFullscreen();
    }
    close.classList.add("d-block");
    close.classList.remove("d-none");
    open.classList.add("d-none");
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.webkitExitFullscreen) {
      /* Safari */
      document.webkitExitFullscreen();
      console.log("working");
    } else if (document.msExitFullscreen) {
      /* IE11 */
      document.msExitFullscreen();
    }
    close.classList.remove("d-block");
    open.classList.remove("d-none");
    close.classList.add("d-none");
    open.classList.add("d-block");
  }
}
/* full screen */

/* toggle switches */
var customSwitch = document.querySelectorAll(".toggle");
customSwitch.forEach(function (e) {
  return e.addEventListener("click", function () {
    e.classList.toggle("on");
  });
});
/* toggle switches */

/* header dropdown close button */

/* for cart dropdown */
var headerbtn = document.querySelectorAll(".dropdown-item-close");
headerbtn.forEach(function (button) {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    e.stopPropagation();
    button.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
    document.getElementById("cart-data").innerText = "".concat(document.querySelectorAll(".dropdown-item-close").length, " Items");
    document.getElementById("cart-icon-badge").innerText = "".concat(document.querySelectorAll(".dropdown-item-close").length);
    console.log(document.getElementById("header-cart-items-scroll").children.length);
    if (document.querySelectorAll(".dropdown-item-close").length == 0) {
      var elementHide = document.querySelector(".empty-header-item");
      var elementShow = document.querySelector(".empty-item");
      elementHide.classList.add("d-none");
      elementShow.classList.remove("d-none");
    }
  });
});
/* for cart dropdown */

/* for notifications dropdown */
var headerbtn1 = document.querySelectorAll(".dropdown-item-close1");
headerbtn1.forEach(function (button) {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    e.stopPropagation();
    button.parentNode.parentNode.parentNode.parentNode.remove();
    document.getElementById("notifiation-data").innerText = "".concat(document.querySelectorAll(".dropdown-item-close1").length, " Unread");
    document.getElementById("notification-icon-badge").innerText = "".concat(document.querySelectorAll(".dropdown-item-close1").length);
    if (document.querySelectorAll(".dropdown-item-close1").length == 0) {
      var elementHide1 = document.querySelector(".empty-header-item1");
      var elementShow1 = document.querySelector(".empty-item1");
      elementHide1.classList.add("d-none");
      elementShow1.classList.remove("d-none");
    }
  });
});
/* for notifications dropdown */
/******/ })()
;