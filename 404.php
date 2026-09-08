<?php
require __DIR__ . '/partials/functions.php';
$pageTitle = 'Page Not Found | Pokiflix';
$pageDescription = 'The page you are looking for could not be found.';
$activeNav = '';
require __DIR__ . '/partials/header.php';
?>
<section class="pt-40 pb-24 min-h-screen flex items-center justify-center">
  <div class="text-center max-w-xl mx-auto px-gutter">
    <p class="font-display-lg text-display-lg text-brand-red text-glow mb-stack-md">404</p>
    <h1 class="font-display-lg text-headline-xl mb-stack-md">Lost the signal.</h1>
    <p class="text-on-surface-variant mb-stack-lg">The page you're looking for doesn't exist or may have moved. Let's get you back on track.</p>
    <a href="index.php" class="bg-brand-red text-white px-8 py-4 rounded-lg font-label-md text-label-md inline-flex items-center gap-2 hover:opacity-90 transition-all">
      <span class="material-symbols-outlined">home</span> Back to Home
    </a>
  </div>
</section>
<?php require __DIR__ . '/partials/footer.php'; ?>
