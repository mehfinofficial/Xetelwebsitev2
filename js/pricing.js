/* Pricing page: software grid + INR | USD switch (default INR).
   ?currency=usd and ?software=pharma preselect either one. */
(function () {
  var main = document.getElementById('main');
  var curBtns = Array.prototype.slice.call(document.querySelectorAll('.pr-cur button'));
  var chips = Array.prototype.slice.call(document.querySelectorAll('.pr-chip'));
  var panels = Array.prototype.slice.call(document.querySelectorAll('.pr-grid'));
  if (!main || !curBtns.length || !chips.length) return;

  var KEY = 'xetel_currency';
  function read() { try { return localStorage.getItem(KEY); } catch (e) { return null; } }
  function write(v) { try { localStorage.setItem(KEY, v); } catch (e) {} }

  function setCurrency(cur, save) {
    main.setAttribute('data-cur', cur);
    curBtns.forEach(function (b) { b.setAttribute('aria-pressed', b.getAttribute('data-cur') === cur ? 'true' : 'false'); });
    if (save) write(cur);
  }

  function setSoftware(slug) {
    chips.forEach(function (c) { c.setAttribute('aria-pressed', c.getAttribute('data-sw') === slug ? 'true' : 'false'); });
    panels.forEach(function (p) { p.hidden = p.getAttribute('data-panel') !== slug; });
  }

  curBtns.forEach(function (b) {
    b.addEventListener('click', function () { setCurrency(b.getAttribute('data-cur'), true); });
  });
  chips.forEach(function (c) {
    c.addEventListener('click', function () { setSoftware(c.getAttribute('data-sw')); });
  });

  // start state: the link wins, then the visitor's last choice, otherwise INR
  var params = new URLSearchParams(window.location.search);
  var cur = (params.get('currency') || '').toLowerCase();
  if (cur !== 'inr' && cur !== 'usd') cur = read();
  if (cur === 'usd') setCurrency('usd', false);

  var sw = (params.get('software') || '').toLowerCase();
  if (chips.some(function (c) { return c.getAttribute('data-sw') === sw; })) setSoftware(sw);
})();