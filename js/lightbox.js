// SiteCraft Studio — native <dialog>-based gallery lightbox with prev/next.
// Only loaded on index.html. Hooks into existing <a href="img/siteN.png"> gallery
// links without requiring any change to that markup.

(function () {
  var dialog = document.getElementById('lightbox');
  var img = document.getElementById('lightbox-img');
  var links = Array.prototype.slice.call(document.querySelectorAll('.tm-gallery-item-link'));
  if (!dialog || !img || !links.length) return;

  var currentIndex = 0;

  function show(index) {
    currentIndex = (index + links.length) % links.length;
    var link = links[currentIndex];
    img.src = link.getAttribute('href');
    img.alt = link.querySelector('img') ? link.querySelector('img').alt : '';
  }

  links.forEach(function (link, index) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      show(index);
      dialog.showModal();
    });
  });

  dialog.addEventListener('click', function (e) {
    if (e.target === dialog) dialog.close();
  });

  var closeBtn = dialog.querySelector('.lightbox-close');
  if (closeBtn) closeBtn.addEventListener('click', function () { dialog.close(); });

  var prevBtn = dialog.querySelector('.lightbox-nav--prev');
  var nextBtn = dialog.querySelector('.lightbox-nav--next');
  if (prevBtn) prevBtn.addEventListener('click', function () { show(currentIndex - 1); });
  if (nextBtn) nextBtn.addEventListener('click', function () { show(currentIndex + 1); });

  dialog.addEventListener('keydown', function (e) {
    if (e.key === 'ArrowLeft') show(currentIndex - 1);
    if (e.key === 'ArrowRight') show(currentIndex + 1);
  });
})();
