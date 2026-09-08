<?php
require __DIR__ . '/partials/functions.php';
$pageTitle = 'Terms of Service | Pokiflix';
$pageDescription = 'The terms that govern use of the Pokiflix website.';
$activeNav = '';
require __DIR__ . '/partials/header.php';
?>
<section class="pt-32 pb-16 bg-surface-container-lowest border-b border-subtle">
  <div class="max-w-container-max mx-auto px-gutter">
    <h1 class="font-display-lg text-headline-xl md:text-display-lg mb-2">Terms of Service</h1>
    <p class="text-on-surface-variant">Last updated: <?= date('F Y') ?></p>
  </div>
</section>

<section class="py-16 bg-surface">
  <div class="max-w-3xl mx-auto px-gutter space-y-stack-lg text-on-surface-variant leading-relaxed">
    <p class="text-on-surface">These Terms of Service are a template and should be reviewed by a legal professional before publishing to production. By using Pokiflix, you agree to the terms below.</p>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Use of the Site</h2>
      <p>You agree to use Pokiflix only for lawful purposes and in a way that does not infringe the rights of, restrict, or inhibit anyone else's use of the site.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Accounts</h2>
      <p>If account creation is offered, you are responsible for maintaining the confidentiality of your login details and for all activity under your account.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Content</h2>
      <p>All catalog listings, titles, and imagery on this site are placeholder/demo content unless stated otherwise, and are used for illustrative purposes.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Advertising</h2>
      <p>Pokiflix is supported in part by third-party advertising. Ad networks may operate under their own separate terms and policies.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Limitation of Liability</h2>
      <p>The site is provided "as is" without warranties of any kind. We are not liable for any indirect or consequential loss arising from use of the site.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Changes to These Terms</h2>
      <p>We may update these terms from time to time. Continued use of the site after changes constitutes acceptance of the revised terms.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Contact</h2>
      <p>Questions about these terms can be sent to <a class="text-primary hover:underline" href="mailto:prishafashion2301@gmail.com">prishafashion2301@gmail.com</a>.</p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
