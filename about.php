<?php
require __DIR__ . '/partials/functions.php';
$pageTitle = 'About | Pokiflix';
$pageDescription = 'Learn about the mission and story behind Pokiflix.';
$activeNav = 'about';
require __DIR__ . '/partials/header.php';
?>
<section class="pt-32 pb-16 bg-surface-container-lowest border-b border-subtle">
  <div class="max-w-container-max mx-auto px-gutter text-center">
    <h1 class="font-display-lg text-headline-xl md:text-display-lg mb-stack-md">About Pokiflix</h1>
    <p class="text-on-surface-variant max-w-2xl mx-auto">We're building the cleanest, fastest way to discover what to watch next.</p>
  </div>
</section>

<section class="py-24 bg-surface">
  <div class="max-w-container-max mx-auto px-gutter">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-lg items-center">
      <div class="relative rounded-xl overflow-hidden shadow-2xl group">
        <img alt="Pokiflix team at work" loading="lazy" class="w-full aspect-[16/9] object-cover transition-transform duration-700 group-hover:scale-110" src="<?= e(backdrop_url('about-story')) ?>"/>
        <div class="absolute inset-0 bg-brand-red/10 mix-blend-overlay"></div>
      </div>
      <div class="lg:pl-16">
        <span class="text-brand-red font-label-md tracking-widest uppercase text-sm">Our Story</span>
        <h2 class="font-display-lg text-headline-xl text-primary mt-2 mb-stack-md">Built for the obsessed</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-stack-md leading-relaxed">
          Pokiflix started as a simple idea: streaming discovery had become slow, cluttered, and full of noise. We stripped it back to what actually matters - fast browsing, a clean cinematic interface, and recommendations that make sense.
        </p>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-stack-lg leading-relaxed">
          Today we're a small, focused team building an ad-supported platform that stays free to use while respecting your time and your screen.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="py-24 bg-surface-container">
  <div class="max-w-container-max mx-auto px-gutter">
    <div class="text-center mb-stack-lg">
      <h2 class="font-display-lg text-headline-xl mb-4">What We Stand For</h2>
      <div class="w-20 h-1.5 bg-brand-red mx-auto"></div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
      <?php
      $values = [
          ['icon' => 'speed', 'title' => 'Speed First', 'desc' => 'Every screen is built to load fast and stay out of your way.'],
          ['icon' => 'visibility', 'title' => 'Clarity', 'desc' => 'No dark patterns, no confusing menus - just what you came to watch.'],
          ['icon' => 'diversity_3', 'title' => 'Community', 'desc' => 'Built with feedback from real viewers who wanted something better.'],
      ];
      foreach ($values as $v): ?>
        <div class="glass-panel p-8 rounded-xl text-center">
          <div class="w-14 h-14 rounded-lg bg-surface-container-highest flex items-center justify-center mb-stack-md mx-auto">
            <span class="material-symbols-outlined text-3xl text-brand-red"><?= $v['icon'] ?></span>
          </div>
          <h3 class="font-headline-lg text-headline-lg mb-2"><?= e($v['title']) ?></h3>
          <p class="text-on-surface-variant"><?= e($v['desc']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="py-16 bg-surface-container-lowest">
  <div class="max-w-container-max mx-auto px-gutter grid grid-cols-2 md:grid-cols-4 gap-stack-md text-center">
    <div><p class="font-display-lg text-headline-xl text-primary">50K+</p><p class="text-on-surface-variant text-sm">Titles Streaming</p></div>
    <div><p class="font-display-lg text-headline-xl text-primary">120+</p><p class="text-on-surface-variant text-sm">Countries Reached</p></div>
    <div><p class="font-display-lg text-headline-xl text-primary">4.8<span class="text-brand-amber">&#9733;</span></p><p class="text-on-surface-variant text-sm">Average Rating</p></div>
    <div><p class="font-display-lg text-headline-xl text-primary">2024</p><p class="text-on-surface-variant text-sm">Founded</p></div>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
