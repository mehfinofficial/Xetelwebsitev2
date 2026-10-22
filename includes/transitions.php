<?php /* Page-change helpers. Include inside <head> on every page, and give <main> id="main".
   1. Wait for <main> before the page transition starts (no flash of an empty page).
   2. Prefetch the next page so it is ready by the time the fade begins.
      Prefetch only (not prerender), so page scripts never run early. Unsupported browsers ignore both. */ ?>
  <link rel="expect" href="#main" blocking="render">
  <script type="speculationrules">
  {
    "prefetch": [
      {
        "where": { "selector_matches": ".bottom-nav a, .nav > a, .logo" },
        "eagerness": "eager"
      },
      {
        "where": {
          "and": [
            { "href_matches": "/*" },
            { "not": { "selector_matches": "[href^='#'], [target=_blank], [download], [rel~=nofollow]" } }
          ]
        },
        "eagerness": "moderate"
      }
    ]
  }
  </script>
