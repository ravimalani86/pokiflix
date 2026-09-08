<?php
/**
 * Shared browse/catalog view. Expects $catalogType ('movie'|'series'|null),
 * $catalogTitle, $catalogIntro to be set before include.
 */
require_once __DIR__ . '/functions.php';
$titles = require __DIR__ . '/../data/titles.php';

if ($catalogType !== null) {
    $titles = array_values(array_filter($titles, fn($t) => $t['type'] === $catalogType));
}

$genre = $_GET['genre'] ?? '';
$sort = $_GET['sort'] ?? '';
$query = trim($_GET['q'] ?? '');

if ($genre !== '') {
    $titles = array_values(array_filter($titles, fn($t) => strcasecmp($t['genre'], $genre) === 0));
}
if ($query !== '') {
    $titles = array_values(array_filter($titles, fn($t) => stripos($t['title'], $query) !== false));
}
if ($sort === 'rating' || $sort === 'trending') {
    usort($titles, fn($a, $b) => $b['rating'] <=> $a['rating']);
} elseif ($sort === 'year') {
    usort($titles, fn($a, $b) => $b['year'] <=> $a['year']);
} elseif ($sort === 'az') {
    usort($titles, fn($a, $b) => strcmp($a['title'], $b['title']));
}

$allGenres = ['Action', 'Sci-Fi', 'Drama', 'Thriller', 'Comedy', 'Documentary'];
?>
<section class="pt-32 pb-12 bg-surface-container-lowest border-b border-subtle">
  <div class="max-w-container-max mx-auto px-gutter">
    <h1 class="font-display-lg text-headline-xl md:text-display-lg mb-2"><?= e($catalogTitle) ?></h1>
    <p class="text-on-surface-variant max-w-2xl"><?= e($catalogIntro) ?></p>
  </div>
</section>

<section class="py-10 bg-surface">
  <div class="max-w-container-max mx-auto px-gutter">
    <form class="glass-panel rounded-xl p-4 mb-stack-lg flex flex-wrap gap-3 items-center" method="get">
      <div class="flex items-center gap-2 flex-1 min-w-[200px]">
        <span class="material-symbols-outlined text-on-surface-variant">search</span>
        <input type="text" name="q" value="<?= e($query) ?>" placeholder="Search titles..." class="flex-1 bg-transparent outline-none text-on-surface placeholder:text-on-surface-variant py-2"/>
      </div>
      <select name="genre" class="bg-surface-container-high text-on-surface rounded-lg px-4 py-2 outline-none border border-subtle">
        <option value="">All Genres</option>
        <?php foreach ($allGenres as $g): ?>
          <option value="<?= e($g) ?>" <?= $genre === $g ? 'selected' : '' ?>><?= e($g) ?></option>
        <?php endforeach; ?>
      </select>
      <select name="sort" class="bg-surface-container-high text-on-surface rounded-lg px-4 py-2 outline-none border border-subtle">
        <option value="">Sort: Featured</option>
        <option value="rating" <?= $sort === 'rating' ? 'selected' : '' ?>>Sort: Top Rated</option>
        <option value="year" <?= $sort === 'year' ? 'selected' : '' ?>>Sort: Newest</option>
        <option value="az" <?= $sort === 'az' ? 'selected' : '' ?>>Sort: A-Z</option>
      </select>
      <button class="bg-brand-red text-white px-6 py-2 rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity">Apply</button>
    </form>

    <?php if (empty($titles)): ?>
      <div class="text-center py-24">
        <span class="material-symbols-outlined text-5xl text-on-surface-variant mb-4 block">search_off</span>
        <p class="text-on-surface-variant">No titles match your filters. Try a different search or genre.</p>
      </div>
    <?php else: ?>
      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-stack-md">
        <?php foreach ($titles as $item): ?>
          <div class="w-full"><?php render_title_card($item); ?></div>
        <?php endforeach; ?>
      </div>
      <div class="flex justify-center items-center gap-2 mt-stack-lg">
        <button class="glass-panel w-10 h-10 rounded-full flex items-center justify-center opacity-40 cursor-not-allowed" disabled><span class="material-symbols-outlined">chevron_left</span></button>
        <span class="bg-brand-red text-white w-10 h-10 rounded-full flex items-center justify-center font-bold">1</span>
        <button class="glass-panel w-10 h-10 rounded-full flex items-center justify-center opacity-40 cursor-not-allowed" disabled><span class="material-symbols-outlined">chevron_right</span></button>
      </div>
    <?php endif; ?>
  </div>
</section>
