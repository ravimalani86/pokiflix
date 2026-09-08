<?php
/**
 * Shared browse view backed by the live catalog API.
 * Expects $catalogMediaType ('movie'|'tv'), $catalogTitle, $catalogIntro
 * to be set before include.
 */
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/api.php';
$genreMap = require __DIR__ . '/../data/genres.php';
$genres = $genreMap[$catalogMediaType];

$page = max(1, (int)($_GET['page'] ?? 1));
$search = trim($_GET['q'] ?? '');
$genreId = (int)($_GET['genre'] ?? 0);
$sortKey = $_GET['sort'] ?? 'popularity';

$payload = [
    'page' => $page,
    'limit' => 20,
    'order' => 'desc',
    'released_only' => true,
    'include_total' => true,
];
if ($search !== '') $payload['search'] = $search;
if ($genreId > 0) $payload['genre_id'] = [$genreId];

if ($sortKey === 'top_rated') {
    $payload['sort'] = 'vote_average';
    $payload['vote_count_gte'] = 20;
} elseif ($sortKey === 'newest') {
    $payload['sort'] = $catalogMediaType === 'tv' ? 'first_air_date' : 'release_date';
} else {
    $sortKey = 'popularity';
    $payload['sort'] = 'popularity';
}

$result = $catalogMediaType === 'tv' ? fetch_tv($payload) : fetch_movies($payload);
$items = $result['data'];
$totalPages = max(1, (int)$result['total_pages']);
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
        <input type="text" name="q" value="<?= e($search) ?>" placeholder="Search titles..." class="flex-1 bg-transparent outline-none text-on-surface placeholder:text-on-surface-variant py-2"/>
      </div>
      <select name="genre" class="bg-surface-container-high text-on-surface rounded-lg px-4 py-2 outline-none border border-subtle">
        <option value="0">All Genres</option>
        <?php foreach ($genres as $id => $name): ?>
          <option value="<?= $id ?>" <?= $genreId === $id ? 'selected' : '' ?>><?= e($name) ?></option>
        <?php endforeach; ?>
      </select>
      <select name="sort" class="bg-surface-container-high text-on-surface rounded-lg px-4 py-2 outline-none border border-subtle">
        <option value="popularity" <?= $sortKey === 'popularity' ? 'selected' : '' ?>>Sort: Most Popular</option>
        <option value="newest" <?= $sortKey === 'newest' ? 'selected' : '' ?>>Sort: Newest</option>
        <option value="top_rated" <?= $sortKey === 'top_rated' ? 'selected' : '' ?>>Sort: Top Rated</option>
      </select>
      <button class="bg-brand-red text-white px-6 py-2 rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity">Apply</button>
    </form>

    <?php if (!$result['ok']): ?>
      <div class="text-center py-24">
        <span class="material-symbols-outlined text-5xl text-brand-red mb-4 block">cloud_off</span>
        <p class="text-on-surface-variant">We couldn't reach the catalog service right now. Please try again shortly.</p>
      </div>
    <?php elseif (empty($items)): ?>
      <div class="text-center py-24">
        <span class="material-symbols-outlined text-5xl text-on-surface-variant mb-4 block">search_off</span>
        <p class="text-on-surface-variant">No titles match your filters. Try a different search or genre.</p>
      </div>
    <?php else: ?>
      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-stack-md">
        <?php foreach ($items as $item): ?>
          <div class="w-full"><?php render_media_card($item, $catalogMediaType); ?></div>
        <?php endforeach; ?>
      </div>
      <?php
      $baseParams = ['q' => $search ?: null, 'genre' => $genreId ?: null, 'sort' => $sortKey];
      $mkLink = function (int $p) use ($baseParams) {
          $params = $baseParams;
          $params['page'] = $p;
          return '?' . http_build_query(array_filter($params, fn($v) => $v !== null && $v !== ''));
      };
      ?>
      <div class="flex justify-center items-center gap-2 mt-stack-lg">
        <?php if ($page > 1): ?>
          <a href="<?= e($mkLink($page - 1)) ?>" class="glass-panel w-10 h-10 rounded-full flex items-center justify-center hover:bg-white/10"><span class="material-symbols-outlined">chevron_left</span></a>
        <?php else: ?>
          <span class="glass-panel w-10 h-10 rounded-full flex items-center justify-center opacity-40 cursor-not-allowed"><span class="material-symbols-outlined">chevron_left</span></span>
        <?php endif; ?>
        <span class="bg-brand-red text-white px-4 h-10 rounded-full flex items-center justify-center font-bold text-sm">Page <?= $page ?> of <?= min($totalPages, 500) ?></span>
        <?php if ($page < $totalPages): ?>
          <a href="<?= e($mkLink($page + 1)) ?>" class="glass-panel w-10 h-10 rounded-full flex items-center justify-center hover:bg-white/10"><span class="material-symbols-outlined">chevron_right</span></a>
        <?php else: ?>
          <span class="glass-panel w-10 h-10 rounded-full flex items-center justify-center opacity-40 cursor-not-allowed"><span class="material-symbols-outlined">chevron_right</span></span>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
