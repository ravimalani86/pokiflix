<?php
$pageTitle = 'Movies | Pokiflix';
$pageDescription = 'Browse the full Pokiflix movie catalog by genre, rating, and release year.';
$activeNav = 'movies';
require __DIR__ . '/partials/header.php';

$catalogMediaType = 'movie';
$catalogTitle = 'Movies';
$catalogIntro = 'Feature films across every genre, from blockbuster action to quiet indie drama.';
require __DIR__ . '/partials/live-catalog.php';

require __DIR__ . '/partials/footer.php';
