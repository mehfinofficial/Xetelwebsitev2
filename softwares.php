<?php
$activePage = 'softwares';

if (!function_exists('e')) {
  function e($s) { return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8'); }
}

/* ---------------------------------------------------------------
   PAGE DATA: edit here, the page and its search all follow.
   'url' is the page each item opens. Leave it out (or '#') until that page exists.
   'keys' are extra words people may type (search only, never shown).
---------------------------------------------------------------- */
$groups = [
  'retail'        => 'Retail & Trade',
  'manufacturing' => 'Manufacturing',
  'health'        => 'Health & Education',
  'hospitality'   => 'Hospitality',
  'services'      => 'Services & Transport',
  'agri'          => 'Agriculture',
];

$industries = [
  ['name' => 'Accounting',        'text' => 'Billing, ledgers and GST returns for your books.', 'icon' => 'i-doc',      'group' => 'services',      'img' => 'accounting', 'keys' => 'ca chartered accountant bookkeeping tax billing'],
  ['name' => 'Pharmacy',          'text' => 'Batch, expiry and stock control for medicine stores.', 'icon' => 'i-pill',     'group' => 'health',        'img' => 'pharmacy', 'keys' => 'medical store chemist medicine drug'],
  ['name' => 'School',            'text' => 'Admissions, fees, attendance and results together.', 'icon' => 'i-cap',      'group' => 'health',        'img' => 'school', 'keys' => 'college institute education students fees coaching'],
  ['name' => 'Hotel',             'text' => 'Rooms, bookings and guest billing in one place.', 'icon' => 'i-bed',      'group' => 'hospitality',   'img' => 'hotel', 'keys' => 'resort lodge guest house rooms stay'],
  ['name' => 'Restaurant',        'text' => 'Table billing, kitchen orders and stock control.', 'icon' => 'i-utensils', 'group' => 'hospitality',   'img' => 'restaurant', 'keys' => 'cafe food dhaba kitchen dining pos'],
  ['name' => 'Transport',         'text' => 'Trips, vehicles and freight billing made simple.', 'icon' => 'i-truck',    'group' => 'services',      'img' => 'transport', 'keys' => 'logistics trucks fleet freight vehicle courier'],
  ['name' => 'Medical Lab',       'text' => 'Patient tests, reports and billing in one flow.', 'icon' => 'i-flask',    'group' => 'health',        'img' => 'medicallab', 'keys' => 'pathology diagnostic lab clinic'],
  ['name' => 'Mandi',             'text' => 'Commission, farmer accounts and daily rates managed.', 'icon' => 'i-basket',   'group' => 'agri',          'img' => 'mandi', 'keys' => 'commission agent anaj sabji grain vegetable'],
  ['name' => 'Driving Institute', 'text' => 'Learners, lessons, fees and licence tracking.', 'icon' => 'i-steer',    'group' => 'health',        'img' => 'drivinginstitue', 'keys' => 'driving school learner licence rto'],
  ['name' => 'Retail Shop',       'text' => 'Fast counter billing with stock always in sync.', 'icon' => 'i-store',    'group' => 'retail',        'img' => 'retailshop', 'keys' => 'store shop pos counter billing'],
  ['name' => 'Ecommerce',         'text' => 'Online orders, stock and invoices under one roof.', 'icon' => 'i-cart',     'group' => 'retail',        'img' => 'ecommerce', 'keys' => 'online store website marketplace'],
  ['name' => 'FMCG',              'text' => 'Distributor billing, schemes and stock tracking.', 'icon' => 'i-box',      'group' => 'retail',        'img' => 'fmcg', 'keys' => 'distributor wholesale dealer consumer goods'],
  ['name' => 'Auto Parts',        'text' => 'Spare parts stock, part numbers and quick billing.', 'icon' => 'i-wrench',   'group' => 'retail',        'img' => 'autoparts', 'keys' => 'spare parts garage automobile car bike'],
  ['name' => 'Food & Beverages',  'text' => 'Batches, raw materials and production costing.', 'icon' => 'i-cup',      'group' => 'manufacturing', 'img' => 'foodbeverages', 'keys' => 'bakery dairy snacks drinks manufacturing'],
  ['name' => 'Chemical',          'text' => 'Batch and grade records with GST billing.', 'icon' => 'i-flask',    'group' => 'manufacturing', 'img' => 'chemical', 'keys' => 'chemicals dyes industrial'],
  ['name' => 'Computer Hardware', 'text' => 'Serial numbers, warranty and stock tracking.', 'icon' => 'i-chip',     'group' => 'retail',        'img' => 'computerhardware', 'keys' => 'laptop pc it computers peripherals'],
  ['name' => 'Furniture',         'text' => 'Showroom orders, deliveries and stock records.', 'icon' => 'i-sofa',     'group' => 'retail',        'img' => 'furniture', 'keys' => 'sofa wood interior showroom'],
  ['name' => 'Book Publishing',   'text' => 'Titles, print runs, stock and distributor billing.', 'icon' => 'i-book',     'group' => 'manufacturing', 'img' => 'bookpublishing', 'keys' => 'books publisher printing press'],
  ['name' => 'Electrical',        'text' => 'Item variants, rates and quick GST invoices.', 'icon' => 'i-bolt',     'group' => 'retail',        'img' => 'electricalgoods', 'keys' => 'wires switches lighting hardware'],
  ['name' => 'Paint',             'text' => 'Shade, size and stock tracking with fast billing.', 'icon' => 'i-brush',    'group' => 'manufacturing', 'img' => 'paint', 'keys' => 'paints colour hardware'],
  ['name' => 'Mobile',            'text' => 'Handset stock, accessories and recharge billing.', 'icon' => 'i-phone',    'group' => 'retail',        'img' => 'mobileshop', 'keys' => 'mobile shop phone smartphone accessories recharge'],
  ['name' => 'Garments',          'text' => 'Size and colour stock with quick billing.', 'icon' => 'i-shirt',    'group' => 'retail',        'img' => 'garments', 'keys' => 'clothing clothes apparel textile boutique fashion'],
  ['name' => 'Jewellery',         'text' => 'Weight, purity and making charges in every bill.', 'icon' => 'i-gem',      'group' => 'retail',        'img' => 'jewellery', 'keys' => 'gold silver jeweller ornaments'],
  ['name' => 'Agriculture',       'text' => 'Seeds, fertiliser and farmer billing handled.', 'icon' => 'i-sprout',   'group' => 'agri',          'img' => 'agriculture', 'keys' => 'farm farming seeds fertilizer crop'],
  ['name' => 'Stationery',        'text' => 'A wide item range and quick counter billing.', 'icon' => 'i-pen',      'group' => 'retail',        'img' => 'stationary', 'keys' => 'books pens office supplies'],
  ['name' => 'Grocery',           'text' => 'Quick billing, expiry alerts and stock control.', 'icon' => 'i-bag',      'group' => 'retail',        'img' => 'grocery', 'keys' => 'kirana supermarket general store provisions'],
];


/* ---------------------------------------------------------------
   INDUSTRY IMAGES: drop a file named after the industry into
   assets/images/softwares/ and the card picks it up on its own.
   'Medical Lab' -> medical-lab.avif (also .webp / .png / .jpg).
   No file yet? The card shows its icon on a mint panel instead.
   Set 'img' on an industry to use a different file name.
---------------------------------------------------------------- */
$imgDir = 'assets/images/softwares/';
function industry_img($name, $override = null) {
  global $imgDir;
  $slug = $override ?: trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($name)), '-');
  foreach (['avif', 'webp', 'png', 'jpg'] as $ext) {
    if (is_file(__DIR__ . '/' . $imgDir . $slug . '.' . $ext)) return $imgDir . $slug . '.' . $ext;
  }
  return null;
}

function type_img($file) {
  $dir = 'assets/images/types/';
  foreach (['avif', 'webp', 'png'] as $ext) {
    if (is_file(__DIR__ . '/' . $dir . $file . '.' . $ext)) return $dir . $file . '.' . $ext;
  }
  return null;
}

$products = [
  ['name' => 'Accounting ERP',  'img' => 'AccountingErp', 'icon' => 'i-doc',    'text' => 'Billing, inventory & GST accounting for growing businesses.'],
  ['name' => 'Pharma ERP',      'img' => 'PharmaErp', 'icon' => 'i-pill',   'text' => 'Batch, expiry & compliance-ready pharmacy management.'],
  ['name' => 'School ERP',      'img' => 'SchoolErp', 'icon' => 'i-cap',    'text' => 'Admissions, fees, attendance & results in one place.'],
  ['name' => 'Transport ERP',   'img' => 'TransportErp', 'icon' => 'i-truck',  'text' => 'Fleet, GR tracking & freight billing management.'],
  ['name' => 'Mandi ERP',       'img' => 'MandiErp', 'icon' => 'i-basket', 'text' => 'Commission agent billing for Anaj & Sabji mandis.'],
  ['name' => 'Lab ERP',         'img' => 'LabErp', 'icon' => 'i-flask',  'text' => 'Sample tracking, reports & diagnostics workflow.'],
  ['name' => 'Mobile App',      'img' => 'Mobile-App', 'icon' => 'i-phone',  'text' => 'Reports, quotations & orders right on your phone.'],
  ['name' => 'Xetel Cloud ERP', 'img' => 'CloudErp', 'icon' => 'i-cloud',  'text' => 'Access your full ERP from anywhere, securely.'],
];

$core = [
  ['name' => 'Accounting & Billing',     'icon' => 'i-doc',     'text' => 'Create invoices, record payments and keep your ledgers up to date.'],
  ['name' => 'Inventory Management',     'icon' => 'i-box',     'text' => 'Know what is in stock, what is running low and what is selling.'],
  ['name' => 'GST & Tax Filing',         'icon' => 'i-percent', 'text' => 'GST invoicing, e-way bills and GSTR reconciliation in one click.'],
  ['name' => 'Reports & Analytics',      'icon' => 'i-chart',   'text' => 'Sales, stock and profit reports, on your desktop or your phone.'],
  ['name' => 'Multi-Branch Management',  'icon' => 'i-branch',  'text' => 'Run every location from one software, with stock and reports in one place.'],
  ['name' => 'User & Role Access',       'icon' => 'i-users',   'text' => 'Decide who can see and do what, with user and role permissions.'],
];

$faqs = [
  ['q' => 'How do I know which software is right for my business?',
   'a' => 'Search or browse your industry above, then open its page to see the features built for it. If you are still unsure, book a demo and we will show you the software for your industry.'],
  ['q' => 'My business is not listed. Can I still use Xetel?',
   'a' => 'Xetel is built for more than 35 industries, so it may still fit. Talk to us and we will tell you honestly whether it does.'],
  ['q' => 'Can I manage more than one branch?',
   'a' => 'Yes. Multi-branch management lets you run every location from one software, with stock and reports in one place.'],
  ['q' => 'Does it work offline and on my phone?',
   'a' => 'Yes. The desktop software works offline, so billing never stops when your connection does. The Xetel mobile app syncs with it, and cloud backup keeps your data safe.'],
  ['q' => 'Is Xetel ready for GST?',
   'a' => 'Yes. It handles GST invoicing, e-way bills, GST ledgers and ITC records, and reconciles GSTR-1, 2A, 2B and 3B in one click.'],
];

/* ---- SEO: title, description, canonical, schema ---- */
$title       = 'Business Software for 35+ Industries | Xetel Software';
$description = 'Find the Xetel software built for your industry. Billing, inventory and GST software for pharmacy, school, retail, hotel, transport, mandi and more.';
$origin      = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');
$dir         = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
$pageUrl     = $origin . $dir . '/softwares.php';
$homeUrl     = $origin . $dir . '/index.php';

$ldFaq = [
  '@context'   => 'https://schema.org',
  '@type'      => 'FAQPage',
  'mainEntity' => array_map(function ($f) {
    return ['@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]];
  }, $faqs),
];
$ldCrumbs = [
  '@context'        => 'https://schema.org',
  '@type'           => 'BreadcrumbList',
  'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',      'item' => $homeUrl],
    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Softwares', 'item' => $pageUrl],
  ],
];
$ldFlags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG;
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
  <link rel="stylesheet" href="css/softwares.css">
  <noscript><style>.sw-search, .sw-chips { display: none; }</style></noscript>
  <script type="application/ld+json"><?= json_encode($ldCrumbs, $ldFlags) ?></script>
  <script type="application/ld+json"><?= json_encode($ldFaq, $ldFlags) ?></script>
</head>
<body>
<?php require __DIR__ . '/includes/header.php'; ?>

  <main id="main">
    <!-- Hero: one job, help the visitor find their industry -->
    <section class="sw-hero" aria-labelledby="swTitle">
      <h1 id="swTitle">Choose Which Software You Like</h1>
      <p>Billing, inventory and GST software for 35+ industries. Find yours below</p>

      <div class="actions">
        <a href="#contact" class="btn btn-dark">Book a demo<span class="btn-circle" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg></span></a>
      </div>

      <div class="sw-search" role="search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
        <input type="text" id="swSearch" placeholder="Search your industry, e.g. pharmacy, school, hotel" aria-label="Search your industry" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" enterkeyhint="search" inputmode="search">
        <button type="button" class="sw-clear" id="swClear" aria-label="Clear search" hidden>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
        </button>
      </div>

      <div class="hero-trust">
        <div class="hero-trust-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 1l22 22M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39M10.71 5.05A16 16 0 0 1 22.58 9M1.42 9a15.91 15.91 0 0 1 4.7-2.88M8.53 16.11a6 6 0 0 1 6.95 0M12 20h.01"/></svg>
          Works offline
        </div>
        <div class="hero-trust-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 15l2 2 4-4"/></svg>
          GST ready
        </div>
        <div class="hero-trust-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/></svg>
          Mobile and cloud sync
        </div>
      </div>
    </section>

    <!-- Industry finder -->
    <section class="sw-finder" aria-labelledby="swFinderTitle">
      <h2 class="sr-only" id="swFinderTitle">Browse by industry</h2>

      <div class="sw-chips" role="group" aria-label="Filter by type of business">
        <button type="button" class="sw-chip" data-group="all" aria-pressed="true">All</button>
<?php foreach ($groups as $slug => $label): ?>
        <button type="button" class="sw-chip" data-group="<?= e($slug) ?>" aria-pressed="false"><?= e($label) ?></button>
<?php endforeach; ?>
      </div>

      <ul class="sw-cards" id="swList">
<?php foreach ($industries as $i): $img = industry_img($i['name'], $i['img'] ?? null); ?>
        <li data-group="<?= e($i['group']) ?>" data-key="<?= e(strtolower($i['name'] . ' ' . $i['keys'])) ?>">
          <a class="sw-card" href="<?= e($i['url'] ?? '#') ?>">
<?php if ($img): ?>
            <span class="sw-card-media"><img src="<?= e($img) ?>" alt="" width="1200" height="896" loading="lazy" decoding="async"></span>
<?php else: ?>
            <span class="sw-card-media sw-card-media--icon"><span class="ind-ico"><svg aria-hidden="true"><use href="#<?= e($i['icon']) ?>"/></svg></span></span>
<?php endif; ?>
            <span class="sw-card-body">
              <span class="sw-card-name"><?= e($i['name']) ?></span>
<?php if (!empty($i['text'])): ?>
              <span class="sw-card-text"><?= e($i['text']) ?></span>
<?php endif; ?>
              <span class="sw-card-link" aria-hidden="true">Explore<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
            </span>
          </a>
        </li>
<?php endforeach; ?>
      </ul>

      <div class="sw-empty" id="swEmpty" hidden>
        <p>No industry matches &ldquo;<strong id="swEmptyTerm"></strong>&rdquo;.</p>
        <p>Tell us what your business does and we will say honestly whether Xetel fits. <a href="#contact">Talk to us</a></p>
      </div>

      <p class="ind-cta" id="swMore">Don't see your industry? <a href="#contact">Talk to us<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></p>
      <p class="sr-only" id="swStatus" role="status" aria-live="polite"></p>
    </section>

    <!-- Browse by software -->
    <section class="sw-products" aria-labelledby="swProdTitle">
      <div class="feat-head">
        <h2 id="swProdTitle">Every Xetel software, <em>in one place.</em></h2>
      </div>
      <div class="feat-grid sw-types">
<?php foreach ($products as $t): $timg = type_img($t['img']); ?>
        <a class="feat-item sw-type" href="<?= e($t['url'] ?? '#') ?>">
          <div class="feat-art">
<?php if ($timg): ?>
            <img src="<?= e($timg) ?>" alt="" width="1200" height="896" loading="lazy" decoding="async">
<?php endif; ?>
          </div>
          <div class="feat-body">
            <h3><?= e($t['name']) ?></h3>
            <p><?= e($t['text']) ?></p>
            <span class="sw-type-link" aria-hidden="true">Explore<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
          </div>
        </a>
<?php endforeach; ?>
      </div>
    </section>

    <!-- Core features -->
    <section class="sw-core" aria-labelledby="swCoreTitle">
      <div class="feat-head">
        <h2 id="swCoreTitle">Core features, <em>in every Xetel software.</em></h2>
      </div>
      <ul class="sw-core-grid">
<?php foreach ($core as $c): ?>
        <li>
          <span class="ind-ico"><svg aria-hidden="true"><use href="#<?= e($c['icon']) ?>"/></svg></span>
          <h3><?= e($c['name']) ?></h3>
          <p><?= e($c['text']) ?></p>
        </li>
<?php endforeach; ?>
      </ul>
    </section>

    <!-- FAQ -->
    <section class="faq sw-faq" aria-labelledby="swFaqTitle">
      <div class="feat-head">
        <h2 id="swFaqTitle">Choosing a software, <em>answered.</em></h2>
      </div>
      <div class="faq-list">
<?php foreach ($faqs as $f): ?>
        <details class="faq-item" name="faq">
          <summary><span><?= e($f['q']) ?></span><i class="faq-ico" aria-hidden="true"></i></summary>
          <p class="faq-a"><?= e($f['a']) ?></p>
        </details>
<?php endforeach; ?>
      </div>
      <p class="faq-more">Still have a question? <a href="#contact">Talk to us</a></p>
    </section>

    <!-- Closing call to action (same card as the homepage) -->
  </main>

<?php
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/lead-modal.php';
require __DIR__ . '/includes/support-modal.php';
require __DIR__ . '/includes/bottom-nav.php';
?>

  <script src="js/main.js"></script>
  <script src="js/softwares.js"></script>
</body>
</html>