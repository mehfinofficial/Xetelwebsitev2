<?php /* Mobile bottom nav + More drawer. Set $activePage ('home','softwares','pricing','updates') before including. */
$activePage = $activePage ?? ''; ?>
  <!-- Mobile drawer overlay (outside the header so its backdrop-filter can't trap it) -->
  <div class="drawer-overlay" id="drawerOverlay"></div>

  <nav class="bottom-nav" id="bottomNav" aria-label="Mobile">
    <div class="more-sheet" id="drawer" aria-label="More options" inert>
    <div class="more-inner">
      <a href="training.php" class="more-tile" style="--i:0"><span class="more-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="3"/><path d="M10 9.5l5 2.5-5 2.5z"/></svg></span><span class="more-txt"><b>Training</b><small>Videos & guides</small></span></a>
      <a href="downloads.php" class="more-tile" style="--i:1"><span class="more-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 4v11m0 0l-4-4m4 4l4-4M5 20h14"/></svg></span><span class="more-txt"><b>Downloads</b><small>Software & setup</small></span></a>
      <a href="release-notes.php" class="more-tile" style="--i:2"><span class="more-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l2.2 5.3 5.3 2.2-5.3 2.2L12 18l-2.2-5.3L4.5 10.5l5.3-2.2z"/></svg></span><span class="more-txt"><b>What’s New</b><small>Release notes</small></span></a>
      <a href="remote-support.php" class="more-tile" style="--i:3"><span class="more-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8M12 16v4"/></svg></span><span class="more-txt"><b>Remote Support</b><small>Support Tool's</small></span></a>
      <a href="refer-and-earn.php" class="more-tile" style="--i:4"><span class="more-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3.5" y="8.5" width="17" height="4" rx="1"/><path d="M5 12.5V20h14v-7.5M12 8.5V20M12 8.5C10 8.5 7.5 7.8 7.5 6a2 2 0 013.4-1.4L12 8.5zm0 0c2 0 4.5-.7 4.5-2.5a2 2 0 00-3.4-1.4z"/></svg></span><span class="more-txt"><b>Refer &amp; Earn</b><small>Invite a business</small></span></a>
      <a href="gst-tools.php" class="more-tile" style="--i:5"><span class="more-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="3" width="14" height="18" rx="2.5"/><path d="M8.5 7.5h7M9 12h.01M12 12h.01M15 12h.01M9 16h.01M12 16h.01M15 16h.01"/></svg></span><span class="more-txt"><b>Free GST Tools</b><small>Calculator, HSN finder</small></span></a>
      <a href="index.php#app" class="more-tile" style="--i:6"><span class="more-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="7" y="2.5" width="10" height="19" rx="2.5"/><path d="M11 18.5h2"/></svg></span><span class="more-txt"><b>Get the App</b><small>Play Store & App Store</small></span></a>
      <a href="backup-restore.php" class="more-tile" style="--i:7"><span class="more-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 18a4.5 4.5 0 01-.6-8.96A6 6 0 0118 10.5 3.75 3.75 0 0117.25 18z"/></svg></span><span class="more-txt"><b>Cloud Backup</b><small>Take Cloud Backup</small></span></a>
    </div>
  </div>
    <a href="index.php"<?= $activePage === 'home' ? ' class="active"' : '' ?>>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12l-2 0l9 -9l9 9l-2 0"/><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/></svg>
      <span>Home</span>
    </a>
    <a href="softwares.php"<?= $activePage === 'softwares' ? ' class="active"' : '' ?>>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/><path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/><path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/><path d="M14 7l6 0"/><path d="M17 4l0 6"/></svg>
      <span>Softwares</span>
    </a>
    <a href="pricing.php"<?= $activePage === 'pricing' ? ' class="active"' : '' ?>>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/><path d="M7 9l11 0"/></svg>
      <span>Pricing</span>
    </a>
    <a href="updates.php"<?= $activePage === 'updates' ? ' class="active"' : '' ?>>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l2.2 5.3 5.3 2.2-5.3 2.2L12 18l-2.2-5.3L4.5 10.5l5.3-2.2z"/></svg>
      <span>Updates</span>
    </a>
    <button type="button" class="more-btn" id="moreBtn" aria-expanded="false" aria-controls="drawer">
      <span class="more-icon">
        <svg class="ico-dots" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="5" cy="5" r="2.2"/><circle cx="12" cy="5" r="2.2"/><circle cx="19" cy="5" r="2.2"/><circle cx="5" cy="12" r="2.2"/><circle cx="12" cy="12" r="2.2"/><circle cx="19" cy="12" r="2.2"/><circle cx="5" cy="19" r="2.2"/><circle cx="12" cy="19" r="2.2"/><circle cx="19" cy="19" r="2.2"/></svg>
        <svg class="ico-x" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
      </span>
      <span class="more-label">More</span>
    </button>
    
  </nav>