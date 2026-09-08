<?php
require __DIR__ . '/partials/functions.php';
$pageTitle = 'FAQ | Pokiflix';
$pageDescription = 'Frequently asked questions about Pokiflix.';
$activeNav = 'faq';
require __DIR__ . '/partials/header.php';

$faqGroups = [
    'Getting Started' => [
        ['q' => 'Is Pokiflix free to use?', 'a' => 'Pokiflix offers both free access with limited features and a premium tier for an ad-free, high-definition cinematic experience across all devices.'],
        ['q' => 'Do I need to create an account?', 'a' => 'You can browse the catalog without an account, but creating one lets you save titles to your list and sync progress across devices.'],
    ],
    'Watching' => [
        ['q' => 'What devices are supported?', 'a' => 'You can stream Pokiflix on almost any device, including smartphones, tablets, smart TVs, game consoles, and web browsers.'],
        ['q' => 'How often is the library updated?', 'a' => 'Our library is updated regularly with the latest releases, indie gems, and critically acclaimed series.'],
        ['q' => 'Can I download movies for offline viewing?', 'a' => 'Yes! Premium members can download content directly to their mobile devices to enjoy seamless viewing even without an internet connection.'],
    ],
    'Billing' => [
        ['q' => 'Can I cancel anytime?', 'a' => 'Yes, premium subscriptions can be cancelled at any time with no cancellation fees.'],
        ['q' => 'Do you offer a free trial?', 'a' => 'New premium members get a free trial period before their first payment is charged.'],
    ],
];
?>
<section class="pt-32 pb-16 bg-surface-container-lowest border-b border-subtle">
  <div class="max-w-container-max mx-auto px-gutter text-center">
    <h1 class="font-display-lg text-headline-xl md:text-display-lg mb-stack-md">Frequently Asked Questions</h1>
    <p class="text-on-surface-variant max-w-2xl mx-auto">Everything you need to know about using Pokiflix.</p>
  </div>
</section>

<section class="py-24 bg-surface">
  <div class="max-w-3xl mx-auto px-gutter space-y-stack-lg">
    <?php foreach ($faqGroups as $group => $items): ?>
      <div>
        <h2 class="font-display-lg text-headline-lg text-primary mb-stack-md"><?= e($group) ?></h2>
        <div class="space-y-stack-md">
          <?php foreach ($items as $f): ?>
            <div class="glass-panel rounded-xl overflow-hidden">
              <button data-faq-toggle class="w-full px-8 py-6 flex justify-between items-center text-left hover:bg-white/5 transition-colors">
                <span class="font-headline-lg text-on-surface"><?= e($f['q']) ?></span>
                <span class="material-symbols-outlined faq-arrow transition-transform duration-300">expand_more</span>
              </button>
              <div class="faq-panel px-8 pb-6 text-on-surface-variant font-body-md">
                <?= e($f['a']) ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="text-center pt-stack-md">
      <p class="text-on-surface-variant mb-stack-md">Still have questions?</p>
      <a href="contact.php" class="bg-brand-red text-white px-8 py-4 rounded-lg font-label-md text-label-md inline-block hover:opacity-90 transition-all">Contact Support</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
