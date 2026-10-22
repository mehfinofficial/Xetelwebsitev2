<?php
/* ---------------------------------------------------------------
   UPDATES POSTS: add a post by adding one block to $posts.
   !! DATES ARE PLACEHOLDERS. Set the real release date on each post. !!

   slug     unique, lowercase, dashes only (used in the link: updates.php?post=slug)
   type     'new' | 'announcement' | 'soon'   (improvements count as 'new')
   date     YYYY-MM-DD (newest first; for 'soon' posts it is the expected date, used only for order)
   expected only for 'soon' posts: the text shown instead of a date, e.g. 'Expected November 2026'
   software who it is for, e.g. 'All software' or 'Pharma'
   image    file name in assets/images/whatsnew/ without the extension (leave '' for an icon panel)
   summary  one or two lines shown on the card
   body     list of blocks: ['h' => 'Heading'], ['p' => 'Paragraph'], ['ul' => ['one', 'two']]

   The filter tabs on the page only appear when posts use more than one type.
---------------------------------------------------------------- */
/* filter chips (after "All") */
$types = [
  'new'          => 'New',
  'announcement' => 'Announcements',
  'soon'         => 'Coming soon',
];
/* label on each post's tag */
$tagLabels = [
  'new'          => 'New',
  'announcement' => 'Announcement',
  'soon'         => 'Coming soon',
];

$posts = [
  [
    'slug' => 'bill-scan',
    'type' => 'new',
    'date' => '2026-10-14',
    'software' => 'All software',
    'image' => 'BillScan',
    'title' => 'Scan a bill with your phone, see it on your computer',
    'summary' => 'Take a photo of any bill in the Xetel mobile app and it is uploaded to your PC, ready to use.',
    'body' => [
      ['p' => 'Paper bills pile up fast, and typing each one in takes time. With Bill Scan you point your phone at a bill, and the copy appears on your computer in Xetel.'],
      ['h' => 'What you get'],
      ['ul' => ['Scan any bill using your phone camera', 'The scanned bill is uploaded to your PC automatically', 'No cables, no emailing photos to yourself']],
      ['h' => 'How to use it'],
      ['p' => 'Update the Xetel mobile app and your software, then open Bill Scan in the app and scan your first bill.'],
    ],
  ],
  [
    'slug' => 'qr-code-on-bill',
    'type' => 'new',
    'date' => '2026-10-08',
    'software' => 'All software',
    'image' => 'QrcodeBill',
    'title' => 'Add a QR code to every bill',
    'summary' => 'Print a QR code on your bills so customers can scan it with their phone.',
    'body' => [
      ['p' => 'Your bills can now carry a QR code. Customers scan it with their phone, which makes your bill look professional and easier to use.'],
      ['h' => 'What you get'],
      ['ul' => ['A QR code printed on every bill', 'Works on regular printers and thermal printers', 'Nothing extra to set up for each bill']],
      ['p' => 'Update to the latest version to start using it.'],
    ],
  ],
  [
    'slug' => 'whatsapp-bill-sharing',
    'type' => 'new',
    'date' => '2026-10-01',
    'software' => 'All software',
    'image' => 'WhatsappBill',
    'title' => 'Share bills on WhatsApp, free of cost',
    'summary' => 'Send a bill straight to your customer on WhatsApp from Xetel, at no extra charge.',
    'body' => [
      ['p' => 'Customers like getting their bill on the phone they already use all day. Now you can send it on WhatsApp straight from Xetel, without any extra cost.'],
      ['h' => 'What you get'],
      ['ul' => ['Send a bill to a customer on WhatsApp in one step', 'No extra charge for sharing', 'Customers keep their bill on their phone']],
      ['p' => 'Update to the latest version and use the WhatsApp option when you save a bill.'],
    ],
  ],
  [
    'slug' => 'mobile-app-orders',
    'type' => 'new',
    'date' => '2026-09-22',
    'software' => 'Mobile app',
    'image' => 'MobileApp',
    'title' => 'Run your business from your phone',
    'summary' => 'Create orders, check stock and see reports in the Xetel mobile app, wherever you are.',
    'body' => [
      ['p' => 'Whether you are in the godown or visiting a customer, you do not have to go back to the computer to check on your business.'],
      ['h' => 'What you can do'],
      ['ul' => ['Create orders on the go', 'Check live stock and prices', 'See your business reports anytime']],
      ['p' => 'Update the app from the Play Store or App Store to get it.'],
    ],
  ],
  [
    'slug' => 'automatic-cloud-backup',
    'type' => 'new',
    'date' => '2026-09-12',
    'software' => 'All software',
    'image' => 'CloudBackup',
    'title' => 'Automatic cloud backup, every day',
    'summary' => 'Your data is saved to the cloud on its own, so a computer problem never costs you your records.',
    'body' => [
      ['p' => 'Backups are easy to forget and painful to miss. Cloud backup now runs on its own every day, so your data stays safe even if your computer fails.'],
      ['h' => 'What you get'],
      ['ul' => ['Daily automatic backup to the cloud', 'Restore your data when you need it', 'Works quietly in the background']],
      ['p' => 'Turn it on from Cloud Backup in the main menu.'],
    ],
  ],
  [
    'slug' => 'gst-returns-reconciliation',
    'type' => 'new',
    'date' => '2026-08-30',
    'software' => 'Accounting',
    'image' => 'GstReturns',
    'title' => 'GST returns and reconciliation, made simple',
    'summary' => 'Prepare your GST returns and match them against your books, without the end-of-month stress.',
    'body' => [
      ['p' => 'GST work should not take your whole weekend. Xetel Accounting now helps you prepare returns and check them against your records in one place.'],
      ['h' => 'What you get'],
      ['ul' => ['GST returns prepared from your own entries', 'GSTR reconciliation to catch mismatches early', 'E-way bills from the same software']],
      ['p' => 'Included in the latest update. Take a backup before you file, as always.'],
    ],
  ],
  [
    'slug' => 'batch-and-expiry-tracking',
    'type' => 'new',
    'date' => '2026-08-18',
    'software' => 'Pharma',
    'image' => 'ExpiryTracking',
    'title' => 'Never miss an expiry date again',
    'summary' => 'Track medicines by batch and get a warning before stock expires.',
    'body' => [
      ['p' => 'Expired stock is lost money. Xetel Pharma keeps track of every batch, so you can see what is about to expire and act on it in time.'],
      ['h' => 'What you get'],
      ['ul' => ['Stock tracked by batch and expiry date', 'Alerts before medicines expire', 'Sell older batches first with ease']],
      ['p' => 'Available in the latest Pharma update.'],
    ],
  ],
  [
    'slug' => 'fee-collection-receipts',
    'type' => 'new',
    'date' => '2026-08-05',
    'software' => 'School',
    'image' => 'FeeCollection',
    'title' => 'Collect fees and print receipts instantly',
    'summary' => 'Take a fee, print the receipt, and see who still has dues, all in a few clicks.',
    'body' => [
      ['p' => 'Fee counters get busy at the start of every term. Xetel School makes collection quick, so parents are not left waiting in a line.'],
      ['h' => 'What you get'],
      ['ul' => ['Fee collection with an instant receipt', 'A clear view of pending dues', 'Reminders for parents who have not paid']],
      ['p' => 'Available in the latest School update.'],
    ],
  ],
  [
    'slug' => 'e-way-bill',
    'type' => 'new',
    'date' => '2026-07-20',
    'software' => 'All software',
    'image' => 'EwayBill',
    'title' => 'Generate e-way bills in a few clicks',
    'summary' => 'Create an e-way bill from the invoice you already made, without leaving Xetel.',
    'body' => [
      ['p' => 'Sending goods should not mean filling the same details twice. Now you can make the e-way bill straight from your invoice.'],
      ['h' => 'What you get'],
      ['ul' => ['E-way bill created from the invoice', 'Party, item and vehicle details filled in for you', 'Everything kept together with your GST records']],
      ['p' => 'Available in the latest update.'],
    ],
  ],
  [
    'slug' => 'remote-support',
    'type' => 'new',
    'date' => '2026-07-02',
    'software' => 'All software',
    'image' => 'RemoteSupport',
    'title' => 'Stuck? We can fix it from our side',
    'summary' => 'Our support team can connect to your computer and solve the problem with you on a call.',
    'body' => [
      ['p' => 'No need to explain a problem over the phone, step by step. With remote support, our team can see your screen and fix it with you.'],
      ['h' => 'What you get'],
      ['ul' => ['Our team connects to your computer with your permission', 'Help with updates, setup and everyday questions', 'Solved on one call, without a visit']],
      ['p' => 'Open Remote Support from the More menu to get started.'],
    ],
  ],
  [
    'slug' => 'free-gst-tools',
    'type' => 'new',
    'date' => '2026-06-18',
    'software' => 'All software',
    'image' => 'GstTools',
    'title' => 'Free GST tools for everyone',
    'summary' => 'Use our GST calculator and HSN finder for free, even if you are not a Xetel customer yet.',
    'body' => [
      ['p' => 'Small GST questions come up every day. We made a few simple tools you can use any time, at no cost.'],
      ['h' => 'What you get'],
      ['ul' => ['A GST calculator for quick amounts', 'An HSN code finder', 'Free to use, nothing to install']],
      ['p' => 'Find them under Free GST Tools in the More menu.'],
    ],
  ],
  [
    'slug' => 'multi-branch-and-user-roles',
    'type' => 'new',
    'date' => '2026-06-02',
    'software' => 'All software',
    'image' => 'BranchesRoles',
    'title' => 'Many branches, one software, the right access for each person',
    'summary' => 'Run all your branches together and decide what each person on your team can see and do.',
    'body' => [
      ['p' => 'As your business grows, one counter becomes many. Xetel lets you manage every branch in one place, while each person only sees what you allow.'],
      ['h' => 'What you get'],
      ['ul' => ['All your branches in one software', 'Access set by user and role', 'Owners stay in control of sensitive reports']],
      ['p' => 'Branches and roles are part of our higher plans. See the pricing page for details.'],
    ],
  ],
  [
    'slug' => 'refer-and-earn',
    'type' => 'new',
    'date' => '2026-05-16',
    'software' => 'All software',
    'image' => 'ReferEarn',
    'title' => 'Refer a business and earn',
    'summary' => 'Know someone who needs good business software? Invite them and get rewarded.',
    'body' => [
      ['p' => 'Our best customers are the ones recommended by friends. So when you invite another business to Xetel, we want to say thank you.'],
      ['h' => 'How it works'],
      ['ul' => ['Share Xetel with a business you know', 'We help them get started', 'You get rewarded when they join']],
      ['p' => 'See Refer & Earn in the More menu for the details.'],
    ],
  ],
  [
    'slug' => 'transport-trip-billing',
    'type' => 'new',
    'date' => '2026-05-02',
    'software' => 'Transport',
    'image' => 'TransportBilling',
    'title' => 'Trip and freight billing for transporters',
    'summary' => 'Record your trips and make freight bills quickly, all in one place.',
    'body' => [
      ['p' => 'Transport work moves fast, and the paperwork has to keep up. Xetel Transport keeps your trips and freight bills together.'],
      ['h' => 'What you get'],
      ['ul' => ['Trips recorded in one list', 'Freight bills made from your trip details', 'Clear view of what each party owes you']],
      ['p' => 'Available in the latest Transport update.'],
    ],
  ],
];

/* shipped posts first (newest first), then what is coming (soonest first) */
usort($posts, function ($a, $b) {
  $as = $a['type'] === 'soon'; $bs = $b['type'] === 'soon';
  if ($as !== $bs) return $as ? 1 : -1;
  return $as ? strcmp($a['date'], $b['date']) : strcmp($b['date'], $a['date']);
});