(function () {
  var header = document.getElementById('header');
  var triggers = Array.prototype.slice.call(document.querySelectorAll('.has-dropdown'));
  var groups = Array.prototype.slice.call(document.querySelectorAll('.panel-group'));
  var plainLinks = document.querySelectorAll('.nav > a');
  var desktop = window.matchMedia('(min-width: 721px)');
  var hero = document.querySelector('.hero, .sw-hero');
  var heroCta = document.querySelector('.hero .btn-dark, .sw-hero .btn-dark');
  // any page can name its own trigger: the header CTA appears once this element has scrolled away
  var anchor = document.querySelector('[data-cta-anchor]');
  // true while the footer call to action is on screen (the header CTA would only repeat it)
  var ftVisible = false;

  // stagger the dropdown items (capped so long lists don't drag)
  groups.forEach(function (g) {
    Array.prototype.forEach.call(g.querySelectorAll('a'), function (a, i) {
      a.style.setProperty('--i', Math.min(i, 10) * 0.6);
    });
  });

  // show the header CTA once the hero has scrolled away
  function onScroll() {
    // inner pages have no hero: keep the header "Book a demo" visible there instead of crashing
    var ref = anchor || hero;
    header.classList.toggle('scrolled', !ftVisible && (ref ? ref.getBoundingClientRect().bottom < 100 : true));
    // mobile: transparent header at the very top, glass once scrolling starts
    header.classList.toggle('is-scrolled', window.scrollY > 4);
    // mobile: show the header CTA only once the hero CTA has scrolled out of view
    var mobRef = anchor || heroCta;
    var mobShow = mobRef ? mobRef.getBoundingClientRect().bottom < 64 : !hero;
    header.classList.toggle('show-mobile-cta', !ftVisible && mobShow);
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // hide the header CTA while the footer CTA (its heading or buttons) is in view.
  // rootMargin: ignore the strip behind the fixed header, so it only counts once it is really visible
  var ftTargets = Array.prototype.slice.call(document.querySelectorAll('.ft-cta h2, .ft-actions'));
  if (ftTargets.length && 'IntersectionObserver' in window) {
    var ftSeen = [];
    var ftObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        var i = ftSeen.indexOf(en.target);
        if (en.isIntersecting && i === -1) ftSeen.push(en.target);
        else if (!en.isIntersecting && i !== -1) ftSeen.splice(i, 1);
      });
      ftVisible = ftSeen.length > 0;
      onScroll();
    }, { rootMargin: '-72px 0px 0px 0px' });
    ftTargets.forEach(function (t) { ftObserver.observe(t); });
  }

  function openPanel(name) {
    header.classList.add('open');
    groups.forEach(function (g) {
      g.classList.toggle('active', g.getAttribute('data-panel') === name);
    });
    triggers.forEach(function (t) {
      var on = t.getAttribute('data-panel') === name;
      t.classList.toggle('is-open', on);
      t.setAttribute('aria-expanded', on);
    });
  }

  function closePanel() {
    header.classList.remove('open');
    groups.forEach(function (g) { g.classList.remove('active'); });
    triggers.forEach(function (t) {
      t.classList.remove('is-open');
      t.setAttribute('aria-expanded', 'false');
    });
  }

  triggers.forEach(function (t) {
    var name = t.getAttribute('data-panel');
    t.addEventListener('mouseenter', function () {
      if (desktop.matches) openPanel(name);
    });
    t.addEventListener('click', function () {
      if (!desktop.matches) return;
      if (t.classList.contains('is-open')) closePanel();
      else openPanel(name);
    });
  });

  Array.prototype.forEach.call(plainLinks, function (a) {
    a.addEventListener('mouseenter', closePanel);
  });

  header.addEventListener('mouseleave', closePanel);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closePanel();
  });

  header.querySelector('.header-panel').addEventListener('click', function (e) {
    if (e.target.closest('a')) closePanel();
  });

  desktop.addEventListener('change', closePanel);

  var bottomLinks = document.querySelectorAll('#bottomNav > a');
  Array.prototype.forEach.call(bottomLinks, function (a) {
    a.addEventListener('click', function () {
      Array.prototype.forEach.call(bottomLinks, function (l) { l.classList.remove('active'); });
      a.classList.add('active');
    });
  });

  // typewriter word in the hero headline
  var typedEl = document.querySelector('.typed-text');
  if (typedEl) {
    var list = ['accounting', 'pharmacies', 'restaurants', 'hotels', 'schools', 'transport'];
    var wi = 0, ci = list[0].length, deleting = false;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function tick() {
      var word = list[wi];
      var delay;
      if (reduce) {                       // no typing: just swap the word
        wi = (wi + 1) % list.length;
        typedEl.textContent = list[wi];
        return setTimeout(tick, 2400);
      }
      if (!deleting) {
        ci++;
        typedEl.textContent = word.slice(0, ci);
        if (ci === word.length) { deleting = true; delay = 1600; }   // hold the finished word
        else delay = 90;
      } else {
        ci--;
        typedEl.textContent = word.slice(0, ci);
        if (ci === 0) { deleting = false; wi = (wi + 1) % list.length; delay = 350; }
        else delay = 50;
      }
      setTimeout(tick, delay);
    }
    setTimeout(tick, 1800);               // first word stays visible briefly, then it starts deleting
    deleting = true;
  }

  // trust stats: count up once when scrolled into view (final value is already in the HTML)
  var stats = document.querySelectorAll('.trust-stat strong[data-count]');
  if (stats.length && 'IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        io.unobserve(en.target);
        var el = en.target;
        var end = parseFloat(el.getAttribute('data-count'));
        var dec = parseInt(el.getAttribute('data-decimals') || '0', 10);
        var suf = el.getAttribute('data-suffix') || '';
        var t0 = performance.now(), dur = 1400;
        (function step(now) {
          var p = Math.min((now - t0) / dur, 1);
          var v = end * (1 - Math.pow(1 - p, 3));
          el.textContent = v.toLocaleString('en-IN', { minimumFractionDigits: dec, maximumFractionDigits: dec }) + suf;
          if (p < 1) requestAnimationFrame(step);
        })(t0);
      });
    }, { threshold: 0.6 });
    Array.prototype.forEach.call(stats, function (s) { io.observe(s); });
  }

  // scroll reveal: sections fade/slide in as they enter the viewport
  if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    var targets = document.querySelectorAll(
      '.trust-stats, .feat-head > *, .ind-list li, .sw-cards li, .ind-cta, .bills-panel, .steps-list li, .feat-item, .app-head > h2, .app-head > p, .app-phone, .app-feats li, .testimonials .feat-head > *, .t-grid, .cta h2, .cta p, .cta-actions, .faq .feat-head > *, .faq-item, .faq-more'
    );
    document.documentElement.classList.add('reveal-on');
    var ro = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        var t = en.target;
        t.classList.add('in');
        ro.unobserve(t);
        // once settled, drop the reveal classes so the element's own hover styles work normally
        setTimeout(function () { t.classList.remove('reveal', 'in'); t.style.removeProperty('--d'); }, 1600);
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -6% 0px' });
    Array.prototype.forEach.call(targets, function (el, i) {
      // already on screen when the page opens: leave it alone, the page transition is its entrance
      // (otherwise it fades in a second time right after the cross-fade and looks jumpy)
      var r = el.getBoundingClientRect();
      if (r.top < window.innerHeight * 0.94 && r.bottom > 0) return;
      el.classList.add('reveal');
      // stagger siblings (cards in a grid, lines in the CTA)
      var idx = Array.prototype.indexOf.call(el.parentNode.children, el);
      var delay = Math.min(idx, 5) * 90;
      if (el.parentNode.classList.contains('sw-cards')) {
        // grid of cards: delay by column, so every row ripples in left to right
        var cols = getComputedStyle(el.parentNode).gridTemplateColumns.split(' ').length;
        var seen = 0;
        for (var k = 0; k < idx; k++) if (!el.parentNode.children[k].hidden) seen++;
        delay = (seen % cols) * 90;
      }
      el.style.setProperty('--d', delay + 'ms');
      ro.observe(el);
    });
  }

  // app phone video: plays once when scrolled into view, then rests on the final frame
  (function () {
    var wrap = document.querySelector('.app-phone');
    var v = wrap && wrap.querySelector('video');
    if (!v || !('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    wrap.classList.add('vid-live');
    v.addEventListener('playing', function () { wrap.classList.add('vid-on'); }, { once: true });
    var io = new IntersectionObserver(function (es) {
      if (!es[0].isIntersecting) return;
      io.disconnect();
      var p = v.play();
      if (p && p.catch) p.catch(function () { wrap.classList.remove('vid-live'); });   // autoplay blocked: show the poster
    }, { threshold: 0.35 });
    io.observe(v);
  })();

  // testimonials: spotlight carousel (centre card in focus, infinite loop, auto-rotates)
  (function () {
    var section = document.querySelector('.testimonials');
    var track = section && section.querySelector('.t-grid');
    var cards = track ? Array.prototype.slice.call(track.querySelectorAll('.t-card')) : [];
    var n = cards.length;
    if (n < 3) return;

    var DUR = 5500, active = 0, timer = null;
    var hover = false, focused = false, inView = false;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    section.classList.add('t-live');
    section.style.setProperty('--dur', DUR + 'ms');
    track.setAttribute('tabindex', '0');
    track.setAttribute('role', 'group');
    track.setAttribute('aria-roledescription', 'carousel');
    track.setAttribute('aria-label', 'Customer testimonials');

    var nav = document.createElement('div');
    nav.className = 't-dots';
    var dots = cards.map(function (c, i) {
      var b = document.createElement('button');
      b.type = 'button';
      b.className = 't-dot';
      b.setAttribute('aria-label', 'Show testimonial ' + (i + 1) + ' of ' + n);
      b.addEventListener('click', function () { go(i); });
      nav.appendChild(b);
      return b;
    });
    track.insertAdjacentElement('afterend', nav);

    function canPlay() { return inView && !hover && !focused && !reduce && !document.hidden; }

    function schedule() {
      clearTimeout(timer);
      section.classList.remove('t-playing');
      if (!canPlay()) return;
      void section.offsetWidth;                 // restart the dot fill animation
      section.classList.add('t-playing');
      timer = setTimeout(function () { go(active + 1); }, DUR);
    }

    function render() {
      cards.forEach(function (c, i) {
        var d = i - active;
        if (d > n / 2) d -= n;
        if (d < -n / 2) d += n;
        c.style.setProperty('--d', d);
        var p = d === 0 ? 'c' : (Math.abs(d) === 1 ? 'n' : 'f');
        c.setAttribute('data-pos', p);
        c.setAttribute('aria-hidden', p === 'c' ? 'false' : 'true');
      });
      dots.forEach(function (b, i) {
        b.classList.toggle('on', i === active);
        if (i === active) b.setAttribute('aria-current', 'true'); else b.removeAttribute('aria-current');
      });
      schedule();
    }

    function go(i) { active = (i % n + n) % n; render(); }

    // click a faded side card to bring it to the centre
    var moved = 0;
    cards.forEach(function (c, i) {
      c.addEventListener('click', function () {
        if (moved < 10 && c.getAttribute('data-pos') === 'n') go(i);
      });
    });

    // swipe / drag
    var startX = null;
    track.addEventListener('pointerdown', function (e) { startX = e.clientX; moved = 0; });
    track.addEventListener('pointermove', function (e) { if (startX !== null) moved = Math.abs(e.clientX - startX); });
    track.addEventListener('pointerup', function (e) {
      if (startX === null) return;
      var dx = e.clientX - startX;
      startX = null;
      if (Math.abs(dx) > 45) go(active + (dx < 0 ? 1 : -1));
    });
    track.addEventListener('pointercancel', function () { startX = null; });

    track.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowRight') { go(active + 1); e.preventDefault(); }
      if (e.key === 'ArrowLeft') { go(active - 1); e.preventDefault(); }
    });

    // pause while hovering / keyboard-focused / off-screen / tab hidden
    track.addEventListener('pointerenter', function (e) { if (e.pointerType === 'mouse') { hover = true; schedule(); } });
    track.addEventListener('pointerleave', function () { hover = false; schedule(); });
    section.addEventListener('focusin', function (e) { focused = e.target.matches(':focus-visible'); schedule(); });
    section.addEventListener('focusout', function () { focused = false; schedule(); });
    document.addEventListener('visibilitychange', schedule);
    if ('IntersectionObserver' in window) {
      new IntersectionObserver(function (es) { inView = es[0].isIntersecting; schedule(); }, { threshold: 0.35 }).observe(track);
    }

    render();
  })();

  // mobile "More" sheet: the bottom nav's "More" tab stretches the nav's sheet upward.
  // While it is open the highlight moves to "More"; closing hands it back to the active page tab.
  (function () {
    var btn = document.getElementById('moreBtn');
    var sheet = document.getElementById('drawer');
    var overlay = document.getElementById('drawerOverlay');
    var nav = document.getElementById('bottomNav');
    if (!btn || !sheet || !overlay || !nav) return;
    var label = btn.querySelector('.more-label');

    function setOpen(open) {
      sheet.classList.toggle('open', open);
      overlay.classList.toggle('show', open);
      nav.classList.toggle('more-open', open);
      btn.classList.toggle('is-open', open);
      if (open) sheet.removeAttribute('inert'); else sheet.setAttribute('inert', '');
      btn.setAttribute('aria-expanded', open);
      if (label) label.textContent = open ? 'Close' : 'More';
      document.documentElement.style.overflow = open ? 'hidden' : '';
    }

    btn.addEventListener('click', function () { setOpen(!sheet.classList.contains('open')); });
    overlay.addEventListener('click', function () { setOpen(false); });
    sheet.addEventListener('click', function (e) { if (e.target.closest('a')) setOpen(false); });
    // any other tap inside the nav closes the sheet (the More tab itself toggles it above)
    nav.addEventListener('click', function (e) { if (!e.target.closest('#moreBtn')) setOpen(false); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && sheet.classList.contains('open')) { setOpen(false); btn.focus(); } });
    desktop.addEventListener('change', function () { if (desktop.matches) setOpen(false); });
  })();

  // lead modal: every "Book a demo" / "Contact" link opens a simple number box
  (function () {
    var modal = document.getElementById('lead');
    if (!modal) return;
    var form = document.getElementById('leadForm');
    var done = document.getElementById('leadDone');
    var input = document.getElementById('leadPhone');
    var field = input.closest('.lead-field');
    var err = document.getElementById('leadErr');
    var closeBtn = document.getElementById('leadClose');
    var submit = form.querySelector('.lead-submit');
    var lastFocus = null;

    // Where the number is sent. Paste a form endpoint here (Formspree, Google Apps Script, your own API).
    // It receives a JSON POST: { phone, page }. While empty, every request is simply accepted (nothing is saved yet).
    var LEAD_ENDPOINT = '';

    var MIN_SEND_MS = 800;    // the button spins at least this long so the "sending" step is felt
    var DONE_MS = 4500;       // how long the thank-you screen stays before the popup closes
    var session = 0;          // bumps on every open/close so late timers from an old session do nothing
    var timers = [];
    function later(fn, ms) { timers.push(setTimeout(fn, ms)); }
    function clearLater() { timers.forEach(clearTimeout); timers = []; }

    function open(trigger) {
      lastFocus = trigger || document.activeElement;
      session++; clearLater();
      form.hidden = false; done.hidden = true;
      form.classList.remove('leaving'); form.removeAttribute('aria-busy');
      form.parentNode.style.minHeight = '';
      input.value = '';
      err.textContent = ''; field.classList.remove('invalid');
      submit.disabled = false; submit.classList.remove('is-loading');
      modal.removeAttribute('inert');
      modal.classList.add('open');
      document.documentElement.style.overflow = 'hidden';
      // focus the dialog itself (not the input) so the mobile keyboard stays closed until the user taps the field
      modal.setAttribute('tabindex', '-1');
      modal.style.outline = 'none';
      modal.focus({ preventScroll: true });
    }
    function close() {
      session++; clearLater();
      modal.classList.remove('open');
      modal.setAttribute('inert', '');
      document.documentElement.style.overflow = '';
      if (lastFocus && lastFocus.focus) lastFocus.focus({ preventScroll: true });
    }

    document.addEventListener('click', function (e) {
      var a = e.target.closest('a[href="#contact"]');
      if (!a) return;
      e.preventDefault();
      open(a);
    });
    closeBtn.addEventListener('click', close);
    modal.addEventListener('click', function (e) { if (e.target === modal) close(); });
    document.addEventListener('keydown', function (e) {
      if (!modal.classList.contains('open')) return;
      if (e.key === 'Escape') { close(); return; }
      if (e.key !== 'Tab') return;
      var f = Array.prototype.filter.call(modal.querySelectorAll('button, input:not(.lead-hp)'), function (el) { return !el.disabled && el.offsetParent !== null; });
      if (!f.length) return;
      var first = f[0], last = f[f.length - 1];
      if (e.shiftKey && document.activeElement === first) { last.focus(); e.preventDefault(); }
      else if (!e.shiftKey && document.activeElement === last) { first.focus(); e.preventDefault(); }
    });

    input.addEventListener('input', function () {
      var v = input.value.replace(/\D/g, '');
      if (v.length > 10 && v.indexOf('91') === 0) v = v.slice(2);   // pasted +91 number
      input.value = v.slice(0, 10);
      if (field.classList.contains('invalid')) { field.classList.remove('invalid'); err.textContent = ''; }
    });

    function showDone() {
      input.value = '';                                             // clear the number once it's been sent
      var body = form.parentNode;
      body.style.minHeight = body.offsetHeight + 'px';              // hold the card height so nothing jumps
      form.classList.add('leaving');                                // form fades up and out
      later(function () {
        form.hidden = true; form.classList.remove('leaving');
        form.removeAttribute('aria-busy');
        submit.classList.remove('is-loading'); submit.disabled = false;
        done.style.setProperty('--done-ms', DONE_MS + 'ms');
        done.hidden = false;                                        // un-hiding plays the success animation
        modal.focus({ preventScroll: true });                       // the focused button just disappeared
        later(close, DONE_MS);
      }, 300);
    }

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (form.elements.company.value) return;                      // honeypot: bots only
      var phone = input.value;
      if (!/^[6-9]\d{9}$/.test(phone)) {
        field.classList.add('invalid');
        err.textContent = 'Please enter a valid 10-digit mobile number.';
        input.focus();
        return;
      }

      var mine = session, started = Date.now();
      submit.disabled = true;
      submit.classList.add('is-loading');                           // spinner inside the button
      form.setAttribute('aria-busy', 'true');
      input.blur();                                                 // drops the mobile keyboard so the result is visible

      // wait out the minimum "sending" time, then run the step (ignored if the popup was closed meanwhile)
      function afterMin(fn) {
        later(function () { if (mine === session) fn(); }, Math.max(0, MIN_SEND_MS - (Date.now() - started)));
      }
      function fail() {
        submit.disabled = false; submit.classList.remove('is-loading');
        form.removeAttribute('aria-busy');
        err.textContent = 'Something went wrong. Please try again.';
      }

      if (LEAD_ENDPOINT) {
        fetch(LEAD_ENDPOINT, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
          body: JSON.stringify({ phone: '+91' + phone, page: location.href })
        }).then(function (r) {
          if (!r.ok) throw new Error('bad status');
          afterMin(showDone);
        }).catch(function () {
          afterMin(fail);
        });
      } else {
        // TODO: database not connected yet. Every request is accepted for now; set LEAD_ENDPOINT above to start saving numbers.
        afterMin(showDone);
      }
    });
  })();

  // support modal: header "Support" opens call / WhatsApp / live chat options
  (function () {
    var modal = document.getElementById('support');
    if (!modal) return;
    var closeBtn = document.getElementById('supClose');
    var chatBtn = document.getElementById('supChat');
    var lastFocus = null;

    function open(trigger) {
      lastFocus = trigger || document.activeElement;
      modal.removeAttribute('inert');
      modal.classList.add('open');
      document.documentElement.style.overflow = 'hidden';
      modal.setAttribute('tabindex', '-1');
      modal.style.outline = 'none';
      modal.focus({ preventScroll: true });
    }
    function close() {
      modal.classList.remove('open');
      modal.setAttribute('inert', '');
      document.documentElement.style.overflow = '';
      if (lastFocus && lastFocus.focus) lastFocus.focus({ preventScroll: true });
    }

    document.addEventListener('click', function (e) {
      var a = e.target.closest('a[href="#support"]');
      if (!a) return;
      e.preventDefault();
      open(a);
    });
    closeBtn.addEventListener('click', close);
    modal.addEventListener('click', function (e) { if (e.target === modal) close(); });
    document.addEventListener('keydown', function (e) {
      if (!modal.classList.contains('open')) return;
      if (e.key === 'Escape') { close(); return; }
      if (e.key !== 'Tab') return;
      var f = Array.prototype.filter.call(modal.querySelectorAll('a[href], button'), function (el) { return !el.disabled && el.offsetParent !== null; });
      if (!f.length) return;
      var first = f[0], last = f[f.length - 1];
      if (e.shiftKey && document.activeElement === first) { last.focus(); e.preventDefault(); }
      else if (!e.shiftKey && document.activeElement === last) { first.focus(); e.preventDefault(); }
    });

    // Live chat: not built yet. When the chat widget is ready, define window.openLiveChat
    // (or listen for the "xetel:livechat" event) and it will be called from here.
    chatBtn.addEventListener('click', function () {
      if (typeof window.openLiveChat === 'function') { close(); window.openLiveChat(); }
      else document.dispatchEvent(new CustomEvent('xetel:livechat'));
    });
  })();

  var yr = document.getElementById('year');
  if (yr) yr.textContent = new Date().getFullYear();
})();

// bottom nav: light up the tapped tab at once, so the page change never shows its icon in the old (dark) colour
(function () {
  var nav = document.getElementById('bottomNav');
  if (!nav) return;
  var tabs = Array.prototype.filter.call(nav.children, function (el) { return el.tagName === 'A'; });
  var original = tabs.filter(function (t) { return t.classList.contains('active'); });

  function setActive(list) {
    tabs.forEach(function (t) { t.classList.toggle('active', list.indexOf(t) !== -1); });
  }

  nav.addEventListener('click', function (e) {
    var a = e.target.closest('a[href]');
    if (!a || a.parentNode !== nav) return;                      // only the four main tabs, not the More drawer tiles
    if (e.defaultPrevented || e.button || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
    var href = a.getAttribute('href');
    if (!href || href.charAt(0) === '#') return;
    nav.classList.add('is-leaving');                              // no colour fade, the switch is instant
    setActive([a]);
  });

  // coming back with the Back button can restore this page from memory: put the real tab back
  window.addEventListener('pageshow', function (e) {
    if (e.persisted) { nav.classList.remove('is-leaving'); setActive(original); }
  });
})();