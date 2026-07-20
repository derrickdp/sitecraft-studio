// SiteCraft Studio — shared nav chrome: mobile menu toggle, scroll background swap,
// scrollspy active-link highlight. Safe to load on every page; sections/links that
// don't exist on a given page are simply not observed.

(function () {
  var navbar = document.querySelector('.tm-navbar');
  if (!navbar) return;

  window.addEventListener('scroll', function () {
    navbar.classList.toggle('scroll', window.scrollY > 120);
  }, { passive: true });

  var toggle = document.getElementById('navToggle');
  var menu = document.getElementById('navbarSupportedContent');
  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      var isOpen = menu.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(isOpen));
    });
    menu.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        menu.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  var navLinks = document.querySelectorAll('.tm-nav-link[href^="#"]');
  var sectionIds = Array.prototype.map.call(navLinks, function (a) {
    return a.getAttribute('href').slice(1);
  });
  var sections = sectionIds
    .map(function (id) { return document.getElementById(id); })
    .filter(Boolean);

  if (sections.length && navLinks.length && 'IntersectionObserver' in window) {
    var linkFor = function (id) {
      return document.querySelector('.tm-nav-link[href="#' + id + '"]');
    };

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        var link = linkFor(entry.target.id);
        if (!link || !entry.isIntersecting) return;
        navLinks.forEach(function (l) { l.classList.remove('current'); });
        link.classList.add('current');
      });
    }, {
      rootMargin: '-45% 0px -50% 0px',
      threshold: 0
    });

    sections.forEach(function (s) { observer.observe(s); });
  }
})();
