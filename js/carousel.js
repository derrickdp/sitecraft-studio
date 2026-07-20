// SiteCraft Studio — vanilla prev/next controls for the CSS scroll-snap carousels
// (pricing cards, gallery). Only loaded on index.html.

(function () {
  document.querySelectorAll('.carousel-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var track = document.getElementById(btn.dataset.carouselTarget);
      if (!track) return;
      var card = track.querySelector(':scope > *');
      var gap = 30;
      var step = card ? card.getBoundingClientRect().width + gap : track.clientWidth * 0.8;
      track.scrollBy({
        left: btn.classList.contains('carousel-btn--prev') ? -step : step,
        behavior: 'smooth'
      });
    });
  });
})();
