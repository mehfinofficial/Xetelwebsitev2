/* Updates page: filter by type. The newest visible post is always shown large.
   ?type=soon preselects a filter. */
(function () {
  var grid = document.getElementById('wnGrid');
  var chips = Array.prototype.slice.call(document.querySelectorAll('.wn-chip'));
  var empty = document.getElementById('wnEmpty');
  if (!grid || !chips.length) return;

  var items = Array.prototype.slice.call(grid.children);

  function apply(type) {
    var lead = true, shown = 0;
    chips.forEach(function (c) { c.setAttribute('aria-pressed', c.getAttribute('data-type') === type ? 'true' : 'false'); });
    items.forEach(function (li) {
      var ok = type === 'all' || li.getAttribute('data-type') === type;
      li.hidden = !ok;
      li.classList.toggle('is-lead', ok && lead);
      if (ok) { lead = false; shown++; }
    });
    if (empty) empty.hidden = shown !== 0;
  }

  chips.forEach(function (c) {
    c.addEventListener('click', function () { apply(c.getAttribute('data-type')); });
  });

  var t = (new URLSearchParams(window.location.search).get('type') || '').toLowerCase();
  apply(chips.some(function (c) { return c.getAttribute('data-type') === t; }) ? t : 'all');
})();