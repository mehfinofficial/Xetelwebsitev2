<?php /* Shared footer: gradient call-to-action on top, link columns, big faded wordmark, legal bar.
   Pages can change the CTA text before including this file:
   $ftTitle = '...';  $ftText = '...';  (both optional) */
$ftTitle = $ftTitle ?? 'Your business is ready to run simpler';
$ftText  = $ftText  ?? 'Join 25,000+ businesses that bill, track stock and file GST on Xetel. See it working for your industry, with a call back from our team.';
?>
  <footer class="ft">
    <div class="ft-cta">
      <h2><?= htmlspecialchars($ftTitle, ENT_QUOTES, 'UTF-8') ?></h2>
      <p><?= htmlspecialchars($ftText, ENT_QUOTES, 'UTF-8') ?></p>
      <div class="ft-actions">
        <a href="#contact" class="ft-btn ft-btn--dark">Book a demo</a>
        <a href="tel:+919622797999" class="ft-btn ft-btn--light">Call +91 96227 97999</a>
      </div>
    </div>

    <div class="ft-body">
      <div class="ft-inner">
        <div class="ft-brand">
          <a href="index.php" aria-label="Xetel home"><img src="assets/images/logo/Xetellogo2.png" alt="Xetel" height="30"></a>
          <p>Reliable business software for growing businesses.</p>
          <div class="ft-social">
            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M8 10.5V16M8 7.8v.01M12 16v-5.5M12 13a2.5 2.5 0 0 1 5 0V16"/></svg></a>
            <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="4"/><path d="M10.5 9.5l4 2.5-4 2.5z"/></svg></a>
          </div>
        </div>
        <nav aria-label="Software"><h3>Software</h3><ul><li><a href="#">Accounting ERP</a></li><li><a href="#">Pharma ERP</a></li><li><a href="#">School ERP</a></li><li><a href="#">Transport ERP</a></li><li><a href="#">Mandi ERP</a></li><li><a href="#">Lab ERP</a></li></ul></nav>
        <nav aria-label="Explore"><h3>Explore</h3><ul><li><a href="index.php#features">Features</a></li><li><a href="index.php#industries">Industries</a></li><li><a href="index.php#app">Mobile app</a></li><li><a href="index.php#how">How it works</a></li><li><a href="index.php#faq">FAQ</a></li></ul></nav>
        <nav aria-label="Contact"><h3>Contact</h3><ul><li><a href="mailto:hello@xetel.com">hello@xetel.com</a></li><li><a href="tel:+919622797999">+91 96227 97999</a></li><li><a href="tel:+918494001002">+91 84940 01002</a></li><li><a href="#contact">Book a demo</a></li></ul></nav>
      </div>

      <div class="ft-mark" aria-hidden="true">Xetel</div>

      <div class="ft-base">
        <span>&copy; <span id="year"><?= date('Y') ?></span> Xetel Software. All rights reserved.</span>
        <div class="ft-legal"><a href="#">Privacy</a><a href="#">Terms</a></div>
      </div>
    </div>
  </footer>