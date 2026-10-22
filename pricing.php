<?php
$activePage = 'pricing';

if (!function_exists('e')) {
  function e($s) { return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8'); }
}

/* ---------------------------------------------------------------
   PAGE DATA: edit here, the whole page follows.
   !! ALL PRICES AND PLAN FEATURES BELOW ARE PLACEHOLDERS. Replace them. !!
   Prices are [INR, USD] per $period. Type USD by hand, do not convert.
---------------------------------------------------------------- */
$period = 'per year';

$tiers = [
  'starter'  => ['name' => 'Starter',  'blurb' => 'For a single counter or a small team.',
                 'features' => ['1 user', '1 branch', 'Billing and inventory', 'GST invoicing', 'Email support']],
  'business' => ['name' => 'Business', 'blurb' => 'For growing businesses.', 'popular' => true,
                 'features' => ['Up to 5 users', 'Up to 3 branches', 'Everything in Starter', 'E-way bills and GSTR reconciliation', 'Mobile app and cloud backup', 'Phone support']],
  'premium'  => ['name' => 'Premium',  'blurb' => 'For multi-branch operations.',
                 'features' => ['Unlimited users', 'Unlimited branches', 'Everything in Business', 'User and role access', 'Priority support']],
];

$softwares = [
  'accounting' => ['name' => 'Accounting', 'price' => ['starter' => [4999, 59],  'business' => [9999, 119],  'premium' => [19999, 239]]],
  'pharma'     => ['name' => 'Pharma', 'price' => ['starter' => [5999, 69],  'business' => [11999, 139], 'premium' => [23999, 279]]],
  'school'     => ['name' => 'School', 'price' => ['starter' => [5999, 69],  'business' => [11999, 139], 'premium' => [23999, 279]]],
  'transport'  => ['name' => 'Transport', 'price' => ['starter' => [5999, 69],  'business' => [11999, 139], 'premium' => [23999, 279]]],
  'mandi'      => ['name' => 'Mandi', 'price' => ['starter' => [5999, 69],  'business' => [11999, 139], 'premium' => [23999, 279]]],
  'lab'        => ['name' => 'Lab', 'price' => ['starter' => [5999, 69],  'business' => [11999, 139], 'premium' => [23999, 279]]],
];

$faqs = [
  ['q' => 'Do the prices include GST?',
   'a' => 'No. Prices in rupees are shown before 18% GST, which is added at billing.'],
  ['q' => 'Which plan should I choose?',
   'a' => 'Start with the number of users and branches you have today. If you are unsure, book a demo and we will recommend one.'],
  ['q' => 'Can I see the software before I buy?',
   'a' => 'Yes. Book a demo and we will walk you through the software for your industry.'],
];

/* Indian digit grouping: 19999 -> 19,999 and 1250000 -> 12,50,000 */
function inr($n) {
  $s = (string) $n;
  if (strlen($s) > 3) {
    $head = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', substr($s, 0, -3));
    $s = $head . ',' . substr($s, -3);
  }
  return '₹' . $s;
}

/* ---- SEO ---- */
$title       = 'Pricing | Xetel Software';
$description = 'Simple pricing for every Xetel software. Choose your software and a plan, in rupees or US dollars.';
$origin      = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');
$dir         = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
$pageUrl     = $origin . $dir . '/pricing.php';
$first       = array_key_first($softwares);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($title) ?></title>
  <meta name="description" content="<?= e($description) ?>">
  <link rel="canonical" href="<?= e($pageUrl) ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Xetel Software">
  <meta property="og:title" content="<?= e($title) ?>">
  <meta property="og:description" content="<?= e($description) ?>">
  <meta property="og:url" content="<?= e($pageUrl) ?>">
  <link rel="icon" type="image/png" href="assets/images/favicon.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700&family=Sora:wght@600;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <?php require __DIR__ . "/includes/transitions.php"; ?>
  <link rel="stylesheet" href="css/pricing.css">
</head>
<body>
<?php require __DIR__ . '/includes/header.php'; ?>

  <main id="main" data-cur="inr">
    <section class="pr-hero" aria-labelledby="prTitle">
      <h1 id="prTitle">Simple pricing for your business</h1>
      <p>Choose your software, then the plan that fits.</p>
      <div class="actions">
        <a href="#contact" class="btn btn-dark" data-cta-anchor>Book a demo<span class="btn-circle" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg></span></a>
      </div>
    </section>

    <section class="pr-plans" aria-label="Plans">
      <div class="pr-chips" role="group" aria-label="Software">
<?php foreach ($softwares as $slug => $s): ?>
        <button type="button" class="pr-chip" data-sw="<?= e($slug) ?>" aria-pressed="<?= $slug === $first ? 'true' : 'false' ?>"><?= e($s['name']) ?></button>
<?php endforeach; ?>
      </div>

      <div class="pr-cur" role="group" aria-label="Region and currency">
        <button type="button" data-cur="inr" aria-pressed="true">India &amp; South Asia</button>
        <button type="button" data-cur="usd" aria-pressed="false">Other Countries</button>
      </div>

<?php foreach ($softwares as $slug => $s): ?>
      <div class="pr-grid" data-panel="<?= e($slug) ?>"<?= $slug === $first ? '' : ' hidden' ?>>
<?php foreach ($tiers as $tk => $t): $p = $s['price'][$tk]; ?>
        <article class="pr-card<?= !empty($t['popular']) ? ' is-pop' : '' ?>">
          <h2><?= e($t['name']) ?><?php if (!empty($t['popular'])): ?><span class="pr-tag">Most popular</span><?php endif; ?></h2>
          <p class="pr-blurb"><?= e($t['blurb']) ?></p>
          <p class="pr-price">
            <span class="pr-amt"><span class="c-inr"><?= e(inr($p[0])) ?></span><span class="c-usd">$<?= e($p[1]) ?></span></span>
            <span class="pr-per"><?= e($period) ?></span>
          </p>
          <p class="pr-gst">+ 18% GST</p>
          <a href="#contact" class="pr-btn">Book a demo</a>
          <ul class="pr-feats">
<?php foreach ($t['features'] as $f): ?>
            <li><?= e($f) ?></li>
<?php endforeach; ?>
          </ul>
        </article>
<?php endforeach; ?>
      </div>
<?php endforeach; ?>
    </section>

    <section class="faq pr-faq" aria-labelledby="prFaqTitle">
      <div class="feat-head">
        <h2 id="prFaqTitle">Pricing, <em>answered.</em></h2>
      </div>
      <div class="faq-list">
<?php foreach ($faqs as $f): ?>
        <details class="faq-item" name="faq">
          <summary><span><?= e($f['q']) ?></span><i class="faq-ico" aria-hidden="true"></i></summary>
          <p class="faq-a"><?= e($f['a']) ?></p>
        </details>
<?php endforeach; ?>
      </div>
    </section>

  </main>

<?php
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/lead-modal.php';
require __DIR__ . '/includes/support-modal.php';
require __DIR__ . '/includes/bottom-nav.php';
?>

  <script src="js/main.js"></script>
  <script src="js/pricing.js"></script>
</body>
</html>