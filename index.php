<?php
$pageTitle = 'Pokiflix | Stream Smarter. Experience Better.';
$pageDescription = 'Your ultimate destination for the latest movies and series with a clean, fast, cinematic interface.';
$activeNav = 'home';
require __DIR__ . '/partials/functions.php';
require __DIR__ . '/partials/api.php';
require __DIR__ . '/partials/header.php';

$titles = require __DIR__ . '/data/titles.php';
$topRated = $titles;
usort($topRated, fn($a, $b) => $b['rating'] <=> $a['rating']);
$topRated = array_slice($topRated, 0, 8);
$featured = $titles[1]; // Midnight Protocol
$categories = [
    ['name' => 'Action', 'id' => 28, 'icon' => 'bolt', 'seed' => 'cat-action'],
    ['name' => 'Sci-Fi', 'id' => 878, 'icon' => 'rocket_launch', 'seed' => 'cat-scifi'],
    ['name' => 'Drama', 'id' => 18, 'icon' => 'theater_comedy', 'seed' => 'cat-drama'],
    ['name' => 'Thriller', 'id' => 53, 'icon' => 'visibility', 'seed' => 'cat-thriller'],
    ['name' => 'Comedy', 'id' => 35, 'icon' => 'sentiment_very_satisfied', 'seed' => 'cat-comedy'],
    ['name' => 'Documentary', 'id' => 99, 'icon' => 'travel_explore', 'seed' => 'cat-doc'],
];

// Trending: titles released/aired in the last 30 days, straight from the live catalog API.
$sinceDate = date('Y-m-d', strtotime('-30 days'));
$trendingMovies = fetch_movies([
    'limit' => 20,
    'sort' => 'release_date',
    'order' => 'desc',
    'release_date_gte' => $sinceDate,
    'released_only' => true,
]);
$trendingTv = fetch_tv([
    'limit' => 20,
    'sort' => 'first_air_date',
    'order' => 'desc',
    'first_air_date_gte' => $sinceDate,
    'released_only' => true,
]);
?>
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center pt-20 overflow-hidden" id="home">
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?= e(backdrop_url('hero-main', 1920, 1080)) ?>')"></div>
    <div class="absolute inset-0 hero-gradient"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-surface via-surface/20 to-transparent"></div>
  </div>
  <div class="relative z-10 max-w-container-max mx-auto px-gutter w-full">
    <div class="max-w-3xl">
      <span class="inline-block py-1 px-3 mb-stack-md border border-brand-red text-brand-red font-label-sm text-label-sm rounded-full tracking-widest uppercase">Premium Experience</span>
      <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg mb-stack-md leading-[1.1]">
        Stream Smarter. <br/>
        <span class="text-brand-red text-glow">Experience Better.</span>
      </h1>
      <p class="font-body-lg text-body-lg text-on-surface-variant mb-stack-lg max-w-xl">
        Your ultimate destination for the latest movies and series with a clean, fast, and cinematic interface. Designed for the obsessed, built for the future.
      </p>

      <form class="flex flex-wrap gap-3 mb-stack-lg glass-panel rounded-lg p-2 max-w-lg" role="search" onsubmit="return false;">
        <span class="material-symbols-outlined text-on-surface-variant self-center pl-2">search</span>
        <input class="flex-1 min-w-[160px] bg-transparent outline-none text-on-surface placeholder:text-on-surface-variant py-2" placeholder="Search movies, series, genres..." type="text"/>
        <button class="bg-brand-red text-white px-5 py-2 rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity">Search</button>
      </form>

      <div class="flex flex-wrap gap-stack-md">
        <a href="movies.php" class="bg-brand-red text-white px-8 py-4 rounded-lg font-label-md text-label-md hover:opacity-90 transition-all flex items-center gap-2 group">
          Get Started
          <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">play_arrow</span>
        </a>
        <a href="series.php" class="glass-panel text-white px-8 py-4 rounded-lg font-label-md text-label-md hover:bg-white/10 transition-all">
          Explore Library
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Stats strip -->
<section class="bg-surface-container-lowest border-y border-subtle py-8 reveal">
  <div class="max-w-container-max mx-auto px-gutter grid grid-cols-2 md:grid-cols-4 gap-stack-md text-center">
    <div><p class="font-display-lg text-headline-xl text-primary">50K+</p><p class="text-on-surface-variant text-sm">Titles Streaming</p></div>
    <div><p class="font-display-lg text-headline-xl text-primary">4.8<span class="text-brand-amber">&#9733;</span></p><p class="text-on-surface-variant text-sm">Average Rating</p></div>
    <div><p class="font-display-lg text-headline-xl text-primary">120+</p><p class="text-on-surface-variant text-sm">Countries Reached</p></div>
    <div><p class="font-display-lg text-headline-xl text-primary">24/7</p><p class="text-on-surface-variant text-sm">Always Streaming</p></div>
  </div>
</section>

<!-- Trending Now -->
<section class="py-16 bg-surface reveal" id="trending">
  <div class="max-w-container-max mx-auto px-gutter">
    <div class="mb-stack-md">
      <h2 class="font-display-lg text-headline-xl">Trending Now</h2>
      <p class="text-on-surface-variant mt-1">New releases from the last 30 days, live from our catalog.</p>
    </div>

    <div class="flex justify-between items-end mb-stack-sm mt-stack-lg">
      <h3 class="font-headline-lg text-headline-lg flex items-center gap-2"><span class="material-symbols-outlined text-brand-red">movie</span> Movies</h3>
      <div class="hidden sm:flex gap-2">
        <button data-scroll-target="row-trending-movies" data-dir="left" class="glass-panel w-10 h-10 rounded-full flex items-center justify-center hover:bg-white/10"><span class="material-symbols-outlined">chevron_left</span></button>
        <button data-scroll-target="row-trending-movies" data-dir="right" class="glass-panel w-10 h-10 rounded-full flex items-center justify-center hover:bg-white/10"><span class="material-symbols-outlined">chevron_right</span></button>
      </div>
    </div>
    <?php if (!$trendingMovies['ok']): ?>
      <p class="text-on-surface-variant py-6">Couldn't load trending movies right now.</p>
    <?php elseif (empty($trendingMovies['data'])): ?>
      <p class="text-on-surface-variant py-6">No new movie releases in the last 30 days.</p>
    <?php else: ?>
      <div id="row-trending-movies" class="flex gap-stack-md overflow-x-auto no-scrollbar snap-x pb-2">
        <?php foreach ($trendingMovies['data'] as $item) render_media_card($item, 'movie'); ?>
      </div>
    <?php endif; ?>

    <div class="flex justify-between items-end mb-stack-sm mt-stack-lg">
      <h3 class="font-headline-lg text-headline-lg flex items-center gap-2"><span class="material-symbols-outlined text-brand-red">live_tv</span> Series</h3>
      <div class="hidden sm:flex gap-2">
        <button data-scroll-target="row-trending-tv" data-dir="left" class="glass-panel w-10 h-10 rounded-full flex items-center justify-center hover:bg-white/10"><span class="material-symbols-outlined">chevron_left</span></button>
        <button data-scroll-target="row-trending-tv" data-dir="right" class="glass-panel w-10 h-10 rounded-full flex items-center justify-center hover:bg-white/10"><span class="material-symbols-outlined">chevron_right</span></button>
      </div>
    </div>
    <?php if (!$trendingTv['ok']): ?>
      <p class="text-on-surface-variant py-6">Couldn't load trending series right now.</p>
    <?php elseif (empty($trendingTv['data'])): ?>
      <p class="text-on-surface-variant py-6">No new series releases in the last 30 days.</p>
    <?php else: ?>
      <div id="row-trending-tv" class="flex gap-stack-md overflow-x-auto no-scrollbar snap-x pb-2">
        <?php foreach ($trendingTv['data'] as $item) render_media_card($item, 'tv'); ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Browse by Category -->
<section class="py-16 bg-surface-container" id="categories">
  <div class="max-w-container-max mx-auto px-gutter">
    <div class="text-center mb-stack-lg">
      <h2 class="font-display-lg text-headline-xl mb-2">Browse by Category</h2>
      <p class="text-on-surface-variant">Find exactly the mood you're in the mood for.</p>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-stack-md">
      <?php foreach ($categories as $cat): ?>
        <a href="movies.php?genre=<?= $cat['id'] ?>" class="relative rounded-xl overflow-hidden group aspect-square flex items-end p-4">
          <img alt="<?= e($cat['name']) ?>" loading="lazy" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="<?= e(backdrop_url($cat['seed'], 500, 500)) ?>"/>
          <div class="absolute inset-0 bg-black/50 group-hover:bg-brand-red/40 transition-colors"></div>
          <div class="relative z-10 flex items-center gap-2 text-white font-bold">
            <span class="material-symbols-outlined"><?= $cat['icon'] ?></span>
            <span><?= e($cat['name']) ?></span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Featured Spotlight -->
<section class="py-24 bg-surface" id="about">
  <div class="max-w-container-max mx-auto px-gutter">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-lg items-center">
      <div class="relative rounded-xl overflow-hidden shadow-2xl group">
        <img alt="<?= e($featured['title']) ?> backdrop" loading="lazy" class="w-full aspect-[16/9] object-cover transition-transform duration-700 group-hover:scale-110" src="<?= e(backdrop_url($featured['seed'])) ?>"/>
        <div class="absolute inset-0 bg-brand-red/10 mix-blend-overlay"></div>
        <a href="title.php?slug=<?= e($featured['slug']) ?>" class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
          <span class="material-symbols-outlined text-6xl text-white drop-shadow-lg">play_circle</span>
        </a>
      </div>
      <div class="lg:pl-16">
        <span class="text-brand-red font-label-md tracking-widest uppercase text-sm">Featured Original</span>
        <h2 class="font-display-lg text-headline-xl text-primary mt-2 mb-stack-md"><?= e($featured['title']) ?></h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-stack-lg leading-relaxed">
          <?= e($featured['synopsis']) ?>
        </p>
        <div class="flex items-center gap-stack-md">
          <a href="title.php?slug=<?= e($featured['slug']) ?>" class="bg-brand-red text-white px-6 py-3 rounded-lg font-label-md text-label-md hover:opacity-90 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined">play_arrow</span> Watch Now
          </a>
          <span class="text-on-surface-variant text-sm"><?= e($featured['duration']) ?> &middot; <?= e($featured['genre']) ?> &middot; <?= e((string)$featured['year']) ?></span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="py-24 bg-surface-container" id="features">
  <div class="max-w-container-max mx-auto px-gutter">
    <div class="text-center mb-stack-lg">
      <h2 class="font-display-lg text-headline-xl mb-4">Engineered for Entertainment</h2>
      <div class="w-20 h-1.5 bg-brand-red mx-auto"></div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
      <?php
      $features = [
          ['icon' => 'auto_awesome', 'title' => 'Clean UI', 'desc' => 'A minimalist design focused entirely on your content. No distractions, just movies.'],
          ['icon' => 'bolt', 'title' => 'Fast Loading', 'desc' => 'Zero lag architecture. Jump into your favorite scenes instantly without the wait.'],
          ['icon' => 'dark_mode', 'title' => 'Cinematic View', 'desc' => 'Dark mode by default, optimizing your viewing environment for high-end immersion.'],
          ['icon' => 'devices', 'title' => 'Cross-Platform', 'desc' => 'Watch anywhere, on any device. Your progress syncs across the entire ecosystem.'],
      ];
      foreach ($features as $f): ?>
        <div class="glass-panel p-8 rounded-xl hover:border-brand-red transition-all group">
          <div class="w-14 h-14 rounded-lg bg-surface-container-highest flex items-center justify-center mb-stack-md group-hover:bg-brand-red group-hover:text-white transition-colors">
            <span class="material-symbols-outlined text-3xl"><?= $f['icon'] ?></span>
          </div>
          <h3 class="font-headline-lg text-headline-lg mb-2"><?= e($f['title']) ?></h3>
          <p class="text-on-surface-variant"><?= e($f['desc']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Top Rated Row -->
<section class="py-16 bg-surface-container-lowest reveal">
  <div class="max-w-container-max mx-auto px-gutter">
    <div class="flex justify-between items-end mb-stack-md">
      <div>
        <h2 class="font-display-lg text-headline-xl">Top Rated</h2>
        <p class="text-on-surface-variant mt-1">Critically acclaimed and audience favorites.</p>
      </div>
      <a href="movies.php?sort=top_rated" class="text-brand-red font-label-md flex items-center gap-2 hover:underline">
        View All <span class="material-symbols-outlined">chevron_right</span>
      </a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-stack-md">
      <?php foreach ($topRated as $item): ?>
        <div class="w-full">
          <?php render_title_card($item); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="py-24 bg-surface reveal">
  <div class="max-w-container-max mx-auto px-gutter">
    <div class="text-center mb-stack-lg">
      <h2 class="font-display-lg text-headline-xl mb-2">Loved by Viewers</h2>
      <p class="text-on-surface-variant">Real feedback from the Pokiflix community.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-md">
      <?php
      $testimonials = [
          ['name' => 'A. Sharma', 'quote' => 'The cleanest streaming interface I have used - genuinely fast, no clutter, and the recommendations are spot on.'],
          ['name' => 'J. Rivera', 'quote' => 'Dark mode done right. It feels like a proper cinema experience straight from my browser.'],
          ['name' => 'M. Okafor', 'quote' => 'Cross-device sync just works. I start on my phone and pick up right where I left off on the TV.'],
      ];
      foreach ($testimonials as $t): ?>
        <div class="glass-panel p-8 rounded-xl">
          <div class="flex text-brand-amber mb-4">
            <span class="material-symbols-outlined">star</span><span class="material-symbols-outlined">star</span><span class="material-symbols-outlined">star</span><span class="material-symbols-outlined">star</span><span class="material-symbols-outlined">star</span>
          </div>
          <p class="text-on-surface-variant mb-stack-md leading-relaxed">&ldquo;<?= e($t['quote']) ?>&rdquo;</p>
          <p class="font-bold text-on-surface">&mdash; <?= e($t['name']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FAQ Preview -->
<section class="py-24 bg-surface-container" id="faq">
  <div class="max-w-3xl mx-auto px-gutter">
    <h2 class="font-display-lg text-headline-xl text-center mb-stack-lg">Frequently Asked Questions</h2>
    <div class="space-y-stack-md">
      <?php
      $faqs = [
          ['q' => 'Is Pokiflix free to use?', 'a' => 'Pokiflix offers both free access with limited features and a premium tier for an ad-free, high-definition cinematic experience across all devices.'],
          ['q' => 'What devices are supported?', 'a' => 'You can stream Pokiflix on almost any device, including smartphones, tablets, smart TVs, game consoles, and web browsers.'],
          ['q' => 'How often is the library updated?', 'a' => 'Our library is updated regularly with the latest releases, indie gems, and critically acclaimed series.'],
      ];
      foreach ($faqs as $f): ?>
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
    <p class="text-center mt-stack-lg">
      <a href="faq.php" class="text-brand-red font-label-md hover:underline">View full FAQ &rarr;</a>
    </p>
  </div>
</section>

<!-- CTA Banner -->
<section class="py-20 bg-brand-red relative overflow-hidden reveal">
  <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image:url('<?= e(backdrop_url('cta-banner', 1600, 500)) ?>')"></div>
  <div class="relative max-w-container-max mx-auto px-gutter text-center">
    <h2 class="font-display-lg text-headline-xl text-white mb-stack-md">Ready to start streaming?</h2>
    <p class="text-white/80 mb-stack-lg max-w-xl mx-auto">Join thousands of viewers already enjoying a faster, cleaner way to watch.</p>
    <a href="contact.php" class="inline-flex items-center gap-2 bg-white text-brand-red px-8 py-4 rounded-lg font-label-md text-label-md hover:opacity-90 transition-all">
      Get Started Free <span class="material-symbols-outlined">arrow_forward</span>
    </a>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
