<?php
require __DIR__ . '/partials/functions.php';
$titles = require __DIR__ . '/data/titles.php';
$slug = $_GET['slug'] ?? '';
$item = null;
foreach ($titles as $t) {
    if ($t['slug'] === $slug) { $item = $t; break; }
}

$pageTitle = $item ? $item['title'] . ' | Pokiflix' : 'Title Not Found | Pokiflix';
$pageDescription = $item ? $item['synopsis'] : 'The title you are looking for could not be found.';
$activeNav = '';
require __DIR__ . '/partials/header.php';

if (!$item): ?>
  <section class="pt-40 pb-24 text-center max-w-xl mx-auto px-gutter">
    <span class="material-symbols-outlined text-6xl text-brand-red mb-4 block">live_tv</span>
    <h1 class="font-display-lg text-headline-xl mb-2">Title not found</h1>
    <p class="text-on-surface-variant mb-stack-lg">We couldn't find that title in our catalog. It may have been removed or the link is incorrect.</p>
    <a href="movies.php" class="bg-brand-red text-white px-6 py-3 rounded-lg font-label-md inline-block hover:opacity-90 transition-opacity">Browse Movies</a>
  </section>
<?php else:
  $cast = ['Alex Morgan', 'Jordan Lee', 'Riley Chen', 'Sam Whitfield'];
  $similar = array_values(array_filter($titles, fn($t) => $t['genre'] === $item['genre'] && $t['slug'] !== $item['slug']));
  $similar = array_slice($similar, 0, 6);
  ?>
  <!-- Backdrop hero -->
  <section class="relative pt-20 min-h-[70vh] flex items-end overflow-hidden">
    <div class="absolute inset-0 z-0">
      <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?= e(backdrop_url($item['seed'], 1920, 1080)) ?>')"></div>
      <div class="absolute inset-0 hero-gradient"></div>
    </div>
    <div class="relative z-10 max-w-container-max mx-auto px-gutter w-full pb-16">
      <div class="flex flex-col md:flex-row gap-stack-lg items-start">
        <img src="<?= e(poster_url($item['seed'], 320, 480)) ?>" alt="<?= e($item['title']) ?> poster" class="w-40 md:w-56 rounded-xl shadow-2xl flex-shrink-0 hidden sm:block"/>
        <div class="flex-1">
          <span class="inline-block py-1 px-3 mb-stack-sm border border-brand-red text-brand-red font-label-sm text-label-sm rounded-full tracking-widest uppercase"><?= e($item['type'] === 'movie' ? 'Movie' : 'Series') ?></span>
          <h1 class="font-display-lg text-headline-xl md:text-display-lg mb-stack-md leading-[1.1]"><?= e($item['title']) ?></h1>
          <div class="flex flex-wrap items-center gap-4 text-on-surface-variant mb-stack-md">
            <span class="flex items-center gap-1 text-brand-amber font-bold"><span class="material-symbols-outlined text-lg">star</span><?= e((string)$item['rating']) ?></span>
            <span><?= e((string)$item['year']) ?></span>
            <span><?= e($item['duration']) ?></span>
            <span class="px-3 py-1 rounded-full glass-panel text-xs uppercase tracking-wide"><?= e($item['genre']) ?></span>
          </div>
          <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mb-stack-lg leading-relaxed"><?= e($item['synopsis']) ?></p>
          <div class="flex flex-wrap gap-stack-md">
            <button class="bg-brand-red text-white px-8 py-4 rounded-lg font-label-md text-label-md hover:opacity-90 transition-all flex items-center gap-2">
              <span class="material-symbols-outlined">play_arrow</span> Watch Now
            </button>
            <button class="glass-panel text-white px-8 py-4 rounded-lg font-label-md text-label-md hover:bg-white/10 transition-all flex items-center gap-2">
              <span class="material-symbols-outlined">add</span> Add to List
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Cast -->
  <section class="py-16 bg-surface-container">
    <div class="max-w-container-max mx-auto px-gutter">
      <h2 class="font-display-lg text-headline-xl mb-stack-md">Cast</h2>
      <div class="flex flex-wrap gap-stack-lg">
        <?php foreach ($cast as $i => $name): ?>
          <div class="text-center w-24">
            <img src="<?= e(poster_url('cast-' . $item['slug'] . '-' . $i, 96, 96)) ?>" alt="<?= e($name) ?>" class="w-16 h-16 rounded-full object-cover mx-auto mb-2"/>
            <p class="text-sm text-on-surface-variant"><?= e($name) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php if (!empty($similar)): ?>
  <!-- Similar Titles -->
  <section class="py-16 bg-surface">
    <div class="max-w-container-max mx-auto px-gutter">
      <h2 class="font-display-lg text-headline-xl mb-stack-md">More Like This</h2>
      <div class="flex gap-stack-md overflow-x-auto no-scrollbar snap-x pb-2">
        <?php foreach ($similar as $s) render_title_card($s); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>
<?php endif;

require __DIR__ . '/partials/footer.php';
