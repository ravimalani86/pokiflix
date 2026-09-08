<?php
/** Shared helpers for rendering catalog cards and small UI bits. */

function poster_url(string $seed, int $w = 400, int $h = 600): string
{
    return "https://picsum.photos/seed/{$seed}/{$w}/{$h}";
}

function backdrop_url(string $seed, int $w = 1600, int $h = 900): string
{
    return "https://picsum.photos/seed/{$seed}-bg/{$w}/{$h}";
}

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

/**
 * Renders a card for a live API catalog item (movie or tv, as returned by
 * fetch_movies()/fetch_tv() in partials/api.php). Links out to TMDB for
 * details since the catalog API only returns list-level fields (no
 * synopsis/cast), and we don't want to fabricate info about real titles.
 */
function render_media_card(array $item, string $mediaType): void
{
    $title = $mediaType === 'tv' ? ($item['name'] ?? 'Untitled') : ($item['title'] ?? 'Untitled');
    $date = $mediaType === 'tv' ? ($item['first_air_date'] ?? '') : ($item['release_date'] ?? '');
    $year = $date ? substr($date, 0, 4) : '';
    $genres = $item['genres'] ?? [];
    $rating = (float)($item['vote_average'] ?? 0);
    $poster = $item['poster_url'] ?? null;
    $detailUrl = 'https://www.themoviedb.org/' . ($mediaType === 'tv' ? 'tv' : 'movie') . '/' . e((string)($item['tmdb_id'] ?? ''));
    ?>
    <a href="<?= e($detailUrl) ?>" target="_blank" rel="noopener" class="group relative flex-shrink-0 w-[160px] sm:w-[190px] snap-start">
        <div class="relative aspect-[2/3] rounded-lg overflow-hidden card-glow transition-all duration-300 bg-surface-container-high">
            <?php if ($poster): ?>
                <img alt="<?= e($title) ?> poster" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="<?= e($poster) ?>"/>
            <?php else: ?>
                <div class="w-full h-full flex items-center justify-center bg-surface-container-highest text-on-surface-variant">
                    <span class="material-symbols-outlined text-4xl"><?= $mediaType === 'tv' ? 'live_tv' : 'movie' ?></span>
                </div>
            <?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-4 flex flex-col justify-end">
                <?php if (!empty($genres)): ?>
                    <span class="text-brand-red font-bold text-xs uppercase tracking-wide"><?= e($genres[0]) ?></span>
                <?php endif; ?>
                <h4 class="text-white font-bold text-sm leading-snug mt-1"><?= e($title) ?></h4>
                <span class="text-on-surface-variant text-xs mt-1"><?= e($year) ?></span>
            </div>
            <?php if ($rating > 0): ?>
                <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-sm rounded-full px-2 py-0.5 flex items-center gap-1 text-xs font-semibold text-amber-400">
                    <span class="material-symbols-outlined text-sm" style="font-size:14px;">star</span><?= e(number_format($rating, 1)) ?>
                </div>
            <?php endif; ?>
        </div>
        <p class="mt-2 text-sm font-medium text-on-surface truncate group-hover:text-primary transition-colors"><?= e($title) ?></p>
    </a>
    <?php
}

function render_title_card(array $item): void
{
    $poster = poster_url($item['seed']);
    ?>
    <a href="title.php?slug=<?= e($item['slug']) ?>" class="group relative flex-shrink-0 w-[160px] sm:w-[190px] snap-start">
        <div class="relative aspect-[2/3] rounded-lg overflow-hidden card-glow transition-all duration-300 bg-surface-container-high">
            <img alt="<?= e($item['title']) ?> poster" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="<?= e($poster) ?>"/>
            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-4 flex flex-col justify-end">
                <span class="text-brand-red font-bold text-xs uppercase tracking-wide"><?= e($item['genre']) ?></span>
                <h4 class="text-white font-bold text-sm leading-snug mt-1"><?= e($item['title']) ?></h4>
                <span class="text-on-surface-variant text-xs mt-1"><?= e((string)$item['year']) ?> &middot; <?= e($item['duration']) ?></span>
            </div>
            <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-sm rounded-full px-2 py-0.5 flex items-center gap-1 text-xs font-semibold text-amber-400">
                <span class="material-symbols-outlined text-sm" style="font-size:14px;">star</span><?= e((string)$item['rating']) ?>
            </div>
        </div>
        <p class="mt-2 text-sm font-medium text-on-surface truncate group-hover:text-primary transition-colors"><?= e($item['title']) ?></p>
    </a>
    <?php
}
