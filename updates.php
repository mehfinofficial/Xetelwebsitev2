<?php
$activePage = 'updates';

if (!function_exists('e')) {
  function e($s) { return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8'); }
}

require __DIR__ . '/includes/updates-data.php';

/* logo shown on every post picture (change the file name here, it is used in one place) */
const WN_LOGO = 'assets/images/logo/Xetellogo1.png';

/* image path from a file name without extension (works with avif, webp, jpg, jpeg or png) */
function wn_img($name) {
  foreach (['avif', 'webp', 'jpg', 'jpeg', 'png'] as $x) {
    if (is_file(__DIR__ . '/assets/images/whatsnew/' . $name . '.' . $x)) return 'assets/images/whatsnew/' . $name . '.' . $x;
  }
  return '';
}
function wn_date($d) { return date('j M Y', strtotime($d)); }
/* the date, or the "Expected ..." text for a coming-soon post */
function wn_when($p) {
  if ($p['type'] === 'soon') return '<span>' . e($p['expected'] ?? 'Coming soon') . '</span>';
  return '<time datetime="' . e($p['date']) . '">' . e(wn_date($p['date'])) . '</time>';
}
/* the card picture, or a quiet icon panel when a post has no image yet */
function wn_media($p, $eager) {
  $src = wn_img($p['image'] ?? '');
  if ($src) return '<span class="wn-media"><img src="' . e($src) . '" alt="" ' . ($eager ? 'fetchpriority="high"' : 'loading="lazy"') . ' decoding="async"><img class="wn-logo" src="' . WN_LOGO . '" alt="" decoding="async"><span class="wn-media-date">' . wn_when($p) . '</span></span>';
  return '<span class="wn-media wn-media--ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg><span class="wn-media-date">' . wn_when($p) . '</span></span>';
}

/* ---- which view: list, or one post (?post=slug) ---- */
$slug = isset($_GET['post']) ? (string) $_GET['post'] : '';
$post = null;
if ($slug !== '') {
  foreach ($posts as $p) { if ($p['slug'] === $slug) { $post = $p; break; } }
  if (!$post) http_response_code(404);
}

/* ---- SEO ---- */
$origin  = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');
$dir     = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
$baseUrl = $origin . $dir . '/updates.php';
if ($post) {
  $title       = $post['title'] . ' | Xetel Software';
  $description = $post['summary'];
  $pageUrl     = $baseUrl . '?post=' . rawurlencode($post['slug']);
  $ogImage     = wn_img($post['image'] ?? '') ? $origin . $dir . '/' . wn_img($post['image'] ?? '') : '';
} elseif ($slug !== '') {
  $title       = 'Update not found | Xetel Software';
  $description = 'This update could not be found.';
  $pageUrl     = $baseUrl;
  $ogImage     = '';
} else {
  $title       = 'Updates | Xetel Software';
  $description = 'New features, improvements and announcements from Xetel. See what is new and what changed in your software.';
  $pageUrl     = $baseUrl;
  $ogImage     = '';
}

$arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($title) ?></title>
  <meta name="description" content="<?= e($description) ?>">
<?php if ($slug !== '' && !$post): ?>
  <meta name="robots" content="noindex">
<?php endif; ?>
  <link rel="canonical" href="<?= e($pageUrl) ?>">
  <meta property="og:type" content="<?= $post ? 'article' : 'website' ?>">
  <meta property="og:site_name" content="Xetel Software">
  <meta property="og:title" content="<?= e($title) ?>">
  <meta property="og:description" content="<?= e($description) ?>">
  <meta property="og:url" content="<?= e($pageUrl) ?>">
<?php if ($ogImage): ?>
  <meta property="og:image" content="<?= e($ogImage) ?>">
<?php endif; ?>
  <link rel="icon" type="image/png" href="assets/images/favicon.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700&family=Sora:wght@600;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <?php require __DIR__ . "/includes/transitions.php"; ?>
  <link rel="stylesheet" href="css/updates.css">
</head>
<body>
<?php require __DIR__ . '/includes/header.php'; ?>

  <main id="main">
<?php if ($post): ?>
    <article class="wn-article" aria-labelledby="wnTitle">
      <a href="updates.php" class="wn-back"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 6l-6 6 6 6"/></svg>All updates</a>
      <div class="wn-meta">
        <span class="wn-tag wn-tag--<?= e($post['type']) ?>"><?= e($tagLabels[$post['type']]) ?></span>
        <?= wn_when($post) ?>
        <span class="wn-for"><?= e($post['software']) ?></span>
      </div>
      <h1 id="wnTitle"><?= e($post['title']) ?></h1>
      <p class="wn-lead"><?= e($post['summary']) ?></p>
<?php if (wn_img($post['image'] ?? '')): ?>
      <div class="wn-cover-wrap">
        <img class="wn-cover" src="<?= e(wn_img($post['image'] ?? '')) ?>" alt="" decoding="async">
        <img class="wn-logo" src="<?= WN_LOGO ?>" alt="" decoding="async">
      </div>
<?php endif; ?>
      <div class="wn-body">
<?php foreach ($post['body'] as $b): ?>
<?php if (isset($b['h'])): ?>
        <h2><?= e($b['h']) ?></h2>
<?php elseif (isset($b['p'])): ?>
        <p><?= e($b['p']) ?></p>
<?php elseif (isset($b['ul'])): ?>
        <ul>
<?php foreach ($b['ul'] as $li): ?>
          <li><?= e($li) ?></li>
<?php endforeach; ?>
        </ul>
<?php endif; ?>
<?php endforeach; ?>
      </div>
    </article>

<?php $more = array_values(array_filter($posts, function ($p) use ($post) { return $p['slug'] !== $post['slug']; })); $more = array_slice($more, 0, 2); ?>
<?php if ($more): ?>
    <section class="wn-more" aria-labelledby="wnMoreTitle">
      <h2 id="wnMoreTitle">More updates</h2>
      <ul class="wn-grid">
<?php foreach ($more as $p): ?>
        <li>
          <a class="wn-card" href="updates.php?post=<?= e(rawurlencode($p['slug'])) ?>">
            <?= wn_media($p, false) ?>
            <span class="wn-card-body">
              <span class="wn-card-title"><?= e($p['title']) ?></span>
              <span class="wn-card-text"><?= e($p['summary']) ?></span>
            </span>
          </a>
        </li>
<?php endforeach; ?>
      </ul>
    </section>
<?php endif; ?>

<?php elseif ($slug !== ''): ?>
    <section class="wn-hero" aria-labelledby="wnTitle">
      <h1 id="wnTitle">We couldn’t find that update</h1>
      <p>It may have been moved or removed. See everything that is new instead.</p>
      <a href="updates.php" class="wn-btn">See all updates</a>
    </section>

<?php else: ?>
    <section class="wn-hero" aria-labelledby="wnTitle" data-cta-anchor>
      <h1 id="wnTitle">What’s new with your Xetel</h1>
      <p>New features, improvements and announcements.</p>
    </section>

    <section class="wn-feed" aria-label="Updates">
<?php
  /* filter tabs only when there is more than one kind of post */
  $usedTypes = array_values(array_unique(array_column($posts, 'type')));
  $showFilter = count($usedTypes) > 1;
?>
<?php if ($showFilter): ?>
      <div class="wn-filter" role="group" aria-label="Filter updates" data-cta-anchor>
        <button type="button" class="wn-chip" data-type="all" aria-pressed="true">All</button>
<?php foreach ($types as $k => $label): if (!in_array($k, $usedTypes, true)) continue; ?>
        <button type="button" class="wn-chip" data-type="<?= e($k) ?>" aria-pressed="false"><?= e($label) ?></button>
<?php endforeach; ?>
      </div>
<?php endif; ?>

      <ul class="wn-grid" id="wnGrid">
<?php foreach ($posts as $i => $p): ?>
        <li data-type="<?= e($p['type']) ?>"<?= $i === 0 ? ' class="is-lead"' : '' ?>>
          <a class="wn-card" href="updates.php?post=<?= e(rawurlencode($p['slug'])) ?>">
            <?= wn_media($p, $i === 0) ?>
            <span class="wn-card-body">
              <span class="wn-card-title"><?= e($p['title']) ?></span>
              <span class="wn-card-text"><?= e($p['summary']) ?></span>
              <span class="wn-card-link">Read more<?= $arrow ?></span>
            </span>
          </a>
        </li>
<?php endforeach; ?>
      </ul>
      <p class="wn-empty" id="wnEmpty" hidden>Nothing here yet. Check back soon.</p>
    </section>
<?php endif; ?>

  </main>

<?php
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/lead-modal.php';
require __DIR__ . '/includes/support-modal.php';
require __DIR__ . '/includes/bottom-nav.php';
?>

  <script src="js/main.js"></script>
<?php if (!$post && $slug === ''): ?>
  <script src="js/updates.js"></script>
<?php endif; ?>
</body>
</html>