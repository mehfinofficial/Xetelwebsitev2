<?php /* Book a demo modal. Opens from any link with href="#contact". */ ?>
  <div class="lead" id="lead" role="dialog" aria-modal="true" aria-labelledby="leadTitle" inert>
    <div class="lead-card">
      <button type="button" class="lead-close" id="leadClose" aria-label="Close"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg></button>
      <div class="lead-media">
        <img src="assets/images/lead-modal.avif" alt="" width="1376" height="768" decoding="async">
        <img class="lead-logo" src="assets/images/logo/Xetellogo1.png" alt="Xetel" height="26">
      </div>
      <div class="lead-body">
        <form class="lead-form" id="leadForm" autocomplete="off" novalidate>
          <h2 id="leadTitle">Let&rsquo;s get you started</h2>
          <p class="lead-sub">Share your number and our team will call you back.</p>
          <label class="lead-field">
            <span class="lead-cc" aria-hidden="true">+91</span>
            <input type="text" id="leadPhone" name="lead_number" inputmode="numeric" pattern="[0-9]*" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" maxlength="10" placeholder="Mobile number" aria-label="Mobile number" aria-describedby="leadErr" required>
          </label>
          <input type="text" name="company" class="lead-hp" tabindex="-1" autocomplete="off" aria-hidden="true">
          <p class="lead-err" id="leadErr" role="alert"></p>
          <button type="submit" class="lead-submit">Request a call back</button>
          <p class="lead-note">We&rsquo;ll only use your number to contact you about Xetel.</p>
        </form>
        <div class="lead-done" id="leadDone" role="status" hidden>
          <span class="lead-tick"><i class="lead-ring" aria-hidden="true"></i><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path pathLength="1" d="M5 12.5l4.5 4.5L19 7.5"/></svg><span class="lead-burst" aria-hidden="true"><b style="--a:0deg"></b><b style="--a:45deg"></b><b style="--a:90deg"></b><b style="--a:135deg"></b><b style="--a:180deg"></b><b style="--a:225deg"></b><b style="--a:270deg"></b><b style="--a:315deg"></b></span></span>
          <h2>Thank you</h2>
          <p class="lead-sub">We&rsquo;ve got your number. Our team will call you shortly.</p>
          <span class="lead-timer" aria-hidden="true"></span>
        </div>
      </div>
    </div>
  </div>
