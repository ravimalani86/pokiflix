<?php
require __DIR__ . '/partials/functions.php';
$pageTitle = 'Privacy Policy | Pokiflix';
$pageDescription = 'How Pokiflix collects, uses, and protects your information.';
$activeNav = '';
require __DIR__ . '/partials/header.php';
?>
<section class="pt-32 pb-16 bg-surface-container-lowest border-b border-subtle">
  <div class="max-w-container-max mx-auto px-gutter">
    <h1 class="font-display-lg text-headline-xl md:text-display-lg mb-2">Privacy Policy</h1>
    <p class="text-on-surface-variant">Last updated: <?= date('F Y') ?></p>
  </div>
</section>

<section class="py-16 bg-surface">
  <div class="max-w-3xl mx-auto px-gutter space-y-stack-lg text-on-surface-variant leading-relaxed">
    <p class="text-on-surface">This Privacy Policy is a template and should be reviewed by a legal professional before publishing to production. It explains, in general terms, how Pokiflix ("we", "us") handles information when you use this site.</p>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Information We Collect</h2>
      <p>We may collect basic usage information such as pages visited, device and browser type, and approximate location, typically gathered automatically through standard web technologies (e.g. cookies, log files). If you contact us directly, we may also collect your name and email address.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">How We Use Information</h2>
      <p>Information collected is used to operate and improve the site, respond to inquiries, and understand aggregate usage patterns. We do not sell personal information to third parties.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Cookies &amp; Advertising</h2>
      <p>Pokiflix displays advertising served by third-party ad networks (including Google AdSense), which may use cookies or similar technologies to serve relevant ads. These third parties have their own privacy policies governing their use of such information. You can control cookies through your browser settings.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Third-Party Links</h2>
      <p>Our site may contain links to third-party websites. We are not responsible for the privacy practices or content of those external sites.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Your Choices</h2>
      <p>You may disable cookies in your browser settings and can contact us at any time to ask what information, if any, we hold about you.</p>
    </div>

    <div>
      <h2 class="font-display-lg text-headline-lg text-primary mb-stack-sm">Contact</h2>
      <p>Questions about this policy can be sent to <a class="text-primary hover:underline" href="mailto:prishafashion2301@gmail.com">prishafashion2301@gmail.com</a>.</p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
