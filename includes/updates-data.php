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
    'date' => '2025-01-15',
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
    'date' => '2025-01-03',
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

  /* ---- backdated posts (order here does not matter, the list is sorted by date below) ---- */
  [
    'slug' => 'barcode-scan-mobile',
    'type' => 'new',
    'date' => '2026-07-11',
    'software' => 'Mobile app',
    'image' => 'barcodescan',
    'title' => 'Scan a barcode with your phone, in one tap',
    'summary' => 'Point your phone at any barcode in the Xetel mobile app and the item comes up right away.',
    'body' => [
      ['p' => 'Typing item names or codes slows down a busy counter. Now you can scan the barcode with your phone camera and reach the item straight away.'],
      ['h' => 'What you get'],
      ['ul' => ['Scan a barcode using your phone camera', 'Find the item in one tap', 'No separate scanner needed']],
      ['p' => 'Update the Xetel mobile app from the Play Store or App Store to use it.'],
    ],
  ],
  [
    'slug' => 'medicine-sales-summary',
    'type' => 'new',
    'date' => '2026-04-21',
    'software' => 'Pharma',
    'image' => 'doctorpresciptionsummary',
    'title' => 'Medicine-wise sales summary in one screen',
    'summary' => 'See how much of each medicine you sold, together in one summary.',
    'body' => [
      ['p' => 'Knowing which medicines sell and which sit on the shelf helps you buy better. Xetel Pharma now puts every medicine’s sales together in one summary.'],
      ['h' => 'What you get'],
      ['ul' => ['Sales of every medicine listed in one place', 'Quickly see which medicines sell the most', 'Spot slow-moving items early']],
      ['p' => 'Available in the latest Pharma update.'],
    ],
  ],
  [
    'slug' => 'daily-analysis-mobile',
    'type' => 'new',
    'date' => '2026-03-24',
    'software' => 'Mobile app',
    'image' => 'dailyanalysis',
    'title' => 'Check your day’s business from your phone',
    'summary' => 'See today’s sales and key numbers in the Xetel mobile app, without opening your computer.',
    'body' => [
      ['p' => 'You should not have to wait until you are back at the computer to know how the day went. The daily analysis is now in your pocket.'],
      ['h' => 'What you get'],
      ['ul' => ['Daily analysis of your sales on your phone', 'Key numbers clear at a glance', 'Check it any time of the day']],
      ['p' => 'Update the Xetel mobile app from the Play Store or App Store to use it.'],
    ],
  ],
  [
    'slug' => 'doctor-performance-report',
    'type' => 'new',
    'date' => '2026-02-17',
    'software' => 'Lab',
    'image' => 'doctorreferrals',
    'title' => 'See how each referring doctor is performing',
    'summary' => 'Weekly and monthly reports show which doctors send you the most patients.',
    'body' => [
      ['p' => 'For a lab, referring doctors matter. Xetel Lab now shows you how each doctor is performing, so you know who to thank and who to follow up with.'],
      ['h' => 'What you get'],
      ['ul' => ['Doctor-wise performance report', 'Weekly and monthly views', 'Easy to compare one doctor with another']],
      ['p' => 'Available in the latest Lab update.'],
    ],
  ],
  [
    'slug' => 'school-transport-costs',
    'type' => 'new',
    'date' => '2026-01-13',
    'software' => 'School',
    'image' => 'schooltransport',
    'title' => 'Track bus fuel, repairs and trip costs',
    'summary' => 'Keep every school bus’s fuel, repairs and running costs in one place.',
    'body' => [
      ['p' => 'School buses cost real money to run, and the bills are easy to lose track of. Xetel School now keeps the transport costs together.'],
      ['h' => 'What you get'],
      ['ul' => ['Fuel entries for each bus', 'Repair and maintenance costs recorded', 'A clear view of what each bus costs to run']],
      ['p' => 'Available in the latest School update.'],
    ],
  ],
  [
    'slug' => 'parent-app',
    'type' => 'new',
    'date' => '2025-11-18',
    'software' => 'School',
    'image' => 'parentschoolapp',
    'title' => 'Parents see attendance, fees and notices in an app',
    'summary' => 'Parents can check attendance, fee status and school notices on their own phone.',
    'body' => [
      ['p' => 'Parents always want to know how their child is doing at school. Now they can see it themselves, without calling the office.'],
      ['h' => 'What you get'],
      ['ul' => ['Attendance for their child', 'Fee status, paid or due', 'School notices as soon as they are sent']],
      ['p' => 'Available in the latest School update.'],
    ],
  ],
  [
    'slug' => 'student-parent-messages',
    'type' => 'new',
    'date' => '2025-09-30',
    'software' => 'School',
    'image' => 'studentsms',
    'title' => 'Message parents and class groups in one go',
    'summary' => 'Send a message to a whole class or group of parents at once.',
    'body' => [
      ['p' => 'Calling or messaging parents one by one takes hours. Now one message can reach a whole class.'],
      ['h' => 'What you get'],
      ['ul' => ['Send one message to many parents', 'Message by class group', 'Useful for notices, holidays and reminders']],
      ['p' => 'Available in the latest School update.'],
    ],
  ],
  [
    'slug' => 'report-card-one-click',
    'type' => 'new',
    'date' => '2025-08-12',
    'software' => 'School',
    'image' => 'schoolreportscard',
    'title' => 'Make report cards for all students in one click',
    'summary' => 'Make report cards for the whole class from the marks you have already entered.',
    'body' => [
      ['p' => 'Report card time is stressful for every school. With Xetel School, one click makes the report cards for all your students.'],
      ['h' => 'What you get'],
      ['ul' => ['One click makes every student’s report card', 'Built from the marks you have already entered', 'Ready to print']],
      ['p' => 'Available in the latest School update.'],
    ],
  ],
  [
    'slug' => 'lab-report-whatsapp',
    'type' => 'new',
    'date' => '2025-06-24',
    'software' => 'Lab',
    'image' => 'labreportwhatsapp',
    'title' => 'Send lab reports on WhatsApp in one click',
    'summary' => 'Send a patient’s report straight to their WhatsApp from Xetel, with no printing needed.',
    'body' => [
      ['p' => 'Patients do not want to come back just to pick up a report. Now you can send it to their WhatsApp directly from Xetel Lab.'],
      ['h' => 'What you get'],
      ['ul' => ['Send the report in one click', 'No printing or emailing needed', 'The patient keeps the report on their phone']],
      ['p' => 'Available in the latest Lab update.'],
    ],
  ],
  [
    'slug' => 'monthly-sales-summary',
    'type' => 'new',
    'date' => '2025-05-06',
    'software' => 'All software',
    'image' => 'monthlysummary',
    'title' => 'Monthly sales summary, ready in one click',
    'summary' => 'Get a clear summary of the whole month’s sales without adding up bills by hand.',
    'body' => [
      ['p' => 'At the end of the month you want one clear picture of how the business did. Now Xetel makes the monthly sales summary for you.'],
      ['h' => 'What you get'],
      ['ul' => ['The whole month’s sales in one report', 'Totals clear at a glance', 'No adding up bills by hand']],
      ['p' => 'Update to the latest version to start using it.'],
    ],
  ],
  [
    'slug' => 'low-stock-alert',
    'type' => 'new',
    'date' => '2025-03-18',
    'software' => 'All software',
    'image' => 'lowstockalert',
    'title' => 'Get a low stock alert before you run out',
    'summary' => 'Xetel flags items that are running low, so you can reorder in time.',
    'body' => [
      ['p' => 'Running out of a fast-selling item means lost sales. Xetel now tells you when stock is getting low, before it is gone.'],
      ['h' => 'What you get'],
      ['ul' => ['Items running low are flagged for you', 'Reorder before a customer finds the shelf empty', 'Works with the stock you already track']],
      ['p' => 'Update to the latest version to start using it.'],
    ],
  ],
  [
    'slug' => 'mandi-billing',
    'type' => 'new',
    'date' => '2025-01-28',
    'software' => 'Mandi',
    'image' => 'mandisoftware',
    'title' => 'Billing built for mandi: weigh, bill, done',
    'summary' => 'Xetel Mandi brings weighing and billing together for mandi traders.',
    'body' => [
      ['p' => 'Mandi work is fast and every kilo counts. Xetel Mandi is made for the way mandi traders weigh and bill.'],
      ['h' => 'What you get'],
      ['ul' => ['Billing made for mandi trading', 'Weight-based items billed quickly', 'A clear bill ready in a few steps']],
      ['p' => 'Available as Xetel Mandi.'],
    ],
  ],
];

/* shipped posts first (newest first), then what is coming (soonest first) */
usort($posts, function ($a, $b) {
  $as = $a['type'] === 'soon'; $bs = $b['type'] === 'soon';
  if ($as !== $bs) return $as ? 1 : -1;
  return $as ? strcmp($a['date'], $b['date']) : strcmp($b['date'], $a['date']);
});