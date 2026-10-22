/* Softwares page: search your industry, or filter by type of business.
   One filter at a time: typing searches every industry, picking a type clears the search. */
(function () {
  var list = document.getElementById('swList');
  var input = document.getElementById('swSearch');
  if (!list || !input) return;

  var items = Array.prototype.slice.call(list.children);
  var chips = Array.prototype.slice.call(document.querySelectorAll('.sw-chip'));
  var clear = document.getElementById('swClear');
  var empty = document.getElementById('swEmpty');
  var emptyTerm = document.getElementById('swEmptyTerm');
  var more = document.getElementById('swMore');
  var status = document.getElementById('swStatus');
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var group = 'all';

  function markChip(g) {
    chips.forEach(function (c) {
      c.setAttribute('aria-pressed', c.getAttribute('data-group') === g ? 'true' : 'false');
    });
  }

  // a typed word matches the start of any word in the name or its extra keywords ("ph" finds Pharmacy, not Graphics)
  function matches(li, words) {
    var hay = ' ' + li.getAttribute('data-key');
    return words.every(function (w) { return hay.indexOf(' ' + w) !== -1; });
  }

  function apply() {
    var raw = input.value.trim();
    var words = raw ? raw.toLowerCase().split(/\s+/) : [];
    var shown = 0;

    items.forEach(function (li) {
      var ok = words.length
        ? matches(li, words)
        : (group === 'all' || li.getAttribute('data-group') === group);
      li.hidden = !ok;
      if (ok) shown++;
    });

    clear.hidden = !input.value;
    empty.hidden = shown !== 0;
    if (more) more.hidden = shown === 0;
    emptyTerm.textContent = raw;          // textContent, so whatever is typed can never be run as HTML
    status.textContent = shown
      ? shown + (shown === 1 ? ' industry shown' : ' industries shown')
      : 'No industries found';
  }

  input.addEventListener('input', function () {
    if (input.value) { group = 'all'; markChip('all'); }
    apply();
  });

  input.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && input.value) {
      input.value = '';
      apply();
    } else if (e.key === 'Enter') {
      e.preventDefault();
      // exactly one match: Enter opens it
      var visible = items.filter(function (li) { return !li.hidden; });
      var a = visible.length === 1 ? visible[0].querySelector('a') : null;
      var href = a && a.getAttribute('href');
      if (href && href !== '#') window.location.href = href;
    }
  });

  clear.addEventListener('click', function () {
    input.value = '';
    apply();
    input.focus();
  });

  chips.forEach(function (chip) {
    chip.addEventListener('click', function () {
      group = chip.getAttribute('data-group');
      input.value = '';
      markChip(group);
      apply();
      // on phones the chip row scrolls sideways: keep the chosen one in view
      if (chip.scrollIntoView) chip.scrollIntoView({ block: 'nearest', inline: 'center', behavior: reduce ? 'auto' : 'smooth' });
    });
  });

  apply();
})();
