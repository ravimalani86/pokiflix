<?php
$pageTitle = 'Series | Pokiflix';
$pageDescription = 'Browse the full Pokiflix TV series catalog by genre, rating, and air date.';
$activeNav = 'series';
require __DIR__ . '/partials/header.php';

$catalogMediaType = 'tv';
$catalogTitle = 'Series';
$catalogIntro = 'Binge-worthy series and originals, updated with new seasons regularly.';
require __DIR__ . '/partials/live-catalog.php';

require __DIR__ . '/partials/footer.php';
