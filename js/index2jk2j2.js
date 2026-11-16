(function () {
  'use strict';

  // 1. Header fijo al hacer scroll (Vanilla JS + passive listener + rAF guard)
  var mainHeader = document.querySelector('.main-header');
  if (mainHeader) {
    var scrollThreshold = 72;
    var ticking = false;
    var isScrolled = null;

    var updateHeader = function () {
      var y = window.scrollY || window.pageYOffset || 0;
      if (y > scrollThreshold && isScrolled !== true) {
        mainHeader.classList.remove('slideInUp', 'animated');
        mainHeader.classList.add('scrollheader', 'slideInDown', 'animated');
        isScrolled = true;
      } else if (y <= scrollThreshold && isScrolled === true) {
        mainHeader.classList.remove('scrollheader', 'slideInDown', 'animated');
        mainHeader.classList.add('slideInUp', 'animated');
        isScrolled = false;
      }
      ticking = false;
    };

    window.addEventListener('scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(updateHeader);
        ticking = true;
      }
    }, { passive: true });
  }

  // Utilidad global heredada para validación numérica
  window.Numeros = function (string) {
    var out = '';
    var filtro = '1234567890';
    for (var i = 0; i < string.length; i++) {
      if (filtro.indexOf(string.charAt(i)) !== -1) {
        out += string.charAt(i);
      }
    }
    return out;
  };

  // 2. Slider Swiper (solo si el elemento y la librería están presentes en la página)
  var offerEl = document.querySelector('.offer-slider');
  if (offerEl && typeof Swiper !== 'undefined') {
    new Swiper('.offer-slider', {
      slidesPerView: 'auto',
      spaceBetween: 20,
      loop: true,
      speed: 12000,
      autoplay: { delay: 0 },
      allowTouchMove: false,
      disableOnInteraction: false
    });
  }

  // 3. Menú móvil accesible
  var navToggle = document.getElementById('nav-toggle');
  var navMenu = document.getElementById('nav-menu');
  if (navToggle && navMenu) {
    navToggle.addEventListener('click', function () {
      var open = navMenu.classList.toggle('show-menu');
      navToggle.classList.toggle('show-icon', open);
      navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  // 4. Menús desplegables (Dropdown)
  var dropdownItems = document.querySelectorAll('.dropdown__item');
  var toggleItem = function (item) {
    var dropdownContainer = item.querySelector('.dropdown__container');
    if (!dropdownContainer) return;
    if (item.classList.contains('show-dropdown')) {
      dropdownContainer.removeAttribute('style');
      item.classList.remove('show-dropdown');
    } else {
      dropdownContainer.style.height = dropdownContainer.scrollHeight + 'px';
      item.classList.add('show-dropdown');
    }
  };

  dropdownItems.forEach(function (item) {
    var dropdownButton = item.querySelector('.dropdown__button');
    if (!dropdownButton) return;
    dropdownButton.addEventListener('click', function () {
      var showDropdown = document.querySelector('.show-dropdown');
      toggleItem(item);
      if (showDropdown && showDropdown !== item) {
        toggleItem(showDropdown);
      }
    });
  });

  var mediaQuery = window.matchMedia('(min-width: 1118px)');
  var dropdownContainers = document.querySelectorAll('.dropdown__container');
  var removeStyle = function () {
    if (mediaQuery.matches) {
      dropdownContainers.forEach(function (e) { e.removeAttribute('style'); });
      dropdownItems.forEach(function (e) { e.classList.remove('show-dropdown'); });
    }
  };
  window.addEventListener('resize', removeStyle, { passive: true });
})();
