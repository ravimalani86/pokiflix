<?php
/**
 * Shared <head> + top navigation.
 * Expects (all optional): $pageTitle, $pageDescription, $activeNav
 */
$pageTitle = $pageTitle ?? 'Pokiflix | Stream Smarter. Experience Better.';
$pageDescription = $pageDescription ?? 'Pokiflix is your cinematic home for movies and series - a clean, fast, ad-supported streaming discovery experience.';
$activeNav = $activeNav ?? '';

$navLinks = [
    'home'   => ['label' => 'Home',   'href' => 'index.php'],
    'movies' => ['label' => 'Movies', 'href' => 'movies.php'],
    'series' => ['label' => 'Series', 'href' => 'series.php'],
    'about'  => ['label' => 'About',  'href' => 'about.php'],
    'faq'    => ['label' => 'FAQ',    'href' => 'faq.php'],
];
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>"/>
<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22><rect width=%2224%22 height=%2224%22 rx=%226%22 fill=%22%23ff0a1f%22/><path d=%22M9 7l9 5-9 5V7z%22 fill=%22white%22/></svg>"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          "tertiary-container": "#2d97df",
          "on-primary": "#690005",
          "on-secondary-fixed-variant": "#474746",
          "tertiary-fixed-dim": "#95ccff",
          "error": "#ffb4ab",
          "secondary-container": "#474746",
          "surface-variant": "#353535",
          "secondary": "#c8c6c5",
          "primary": "#ffb4ab",
          "primary-fixed-dim": "#ffb4ab",
          "primary-fixed": "#ffdad6",
          "on-primary-fixed-variant": "#93000b",
          "surface-container-highest": "#353535",
          "text-muted": "#A0A0A0",
          "on-secondary-fixed": "#1c1b1b",
          "outline": "#b08782",
          "on-tertiary": "#003352",
          "surface-bright": "#393939",
          "on-surface": "#e2e2e2",
          "tertiary-fixed": "#cde5ff",
          "secondary-fixed": "#e5e2e1",
          "surface-dim": "#131313",
          "inverse-primary": "#c00013",
          "on-error-container": "#ffdad6",
          "on-tertiary-fixed": "#001d32",
          "text-vibrant": "#FFFFFF",
          "surface-container-high": "#2a2a2a",
          "on-background": "#e2e2e2",
          "surface-container": "#1a1a1a",
          "on-secondary": "#313030",
          "on-surface-variant": "#b7b3b2",
          "surface-container-lowest": "#080808",
          "on-tertiary-fixed-variant": "#004a75",
          "on-secondary-container": "#b7b5b4",
          "error-container": "#93000a",
          "surface-glass": "rgba(12, 12, 12, 0.7)",
          "surface": "#0c0c0c",
          "background": "#0c0c0c",
          "tertiary": "#95ccff",
          "inverse-surface": "#e2e2e2",
          "on-primary-fixed": "#410002",
          "on-primary-container": "#5c0004",
          "secondary-fixed-dim": "#c8c6c5",
          "surface-container-low": "#131313",
          "on-tertiary-container": "#002c48",
          "on-error": "#690005",
          "primary-container": "#ff544a",
          "inverse-on-surface": "#303030",
          "border-subtle": "rgba(255, 255, 255, 0.08)",
          "outline-variant": "#5f3e3b",
          "surface-tint": "#ffb4ab",
          "brand-red": "#ff0a1f",
          "brand-amber": "#ffb020"
        },
        borderRadius: { DEFAULT: "0.25rem", lg: "0.5rem", xl: "0.75rem", full: "9999px" },
        spacing: {
          "container-max": "1440px",
          gutter: "24px",
          "margin-mobile": "20px",
          "stack-lg": "32px",
          "stack-sm": "8px",
          "margin-desktop": "64px",
          "stack-md": "16px"
        },
        fontFamily: {
          "display-lg-mobile": ["Hanken Grotesk"],
          "label-md": ["Inter"],
          "headline-xl": ["Hanken Grotesk"],
          "headline-lg": ["Hanken Grotesk"],
          "body-md": ["Inter"],
          "label-sm": ["Inter"],
          "body-lg": ["Inter"],
          "display-lg": ["Hanken Grotesk"]
        },
        fontSize: {
          "display-lg-mobile": ["40px", { lineHeight: "1.2", fontWeight: "800" }],
          "label-md": ["14px", { lineHeight: "1.2", letterSpacing: "0.05em", fontWeight: "600" }],
          "headline-xl": ["32px", { lineHeight: "1.2", fontWeight: "700" }],
          "headline-lg": ["24px", { lineHeight: "1.3", fontWeight: "600" }],
          "body-md": ["16px", { lineHeight: "1.5", fontWeight: "400" }],
          "label-sm": ["12px", { lineHeight: "1.2", fontWeight: "500" }],
          "body-lg": ["18px", { lineHeight: "1.6", fontWeight: "400" }],
          "display-lg": ["64px", { lineHeight: "1.1", letterSpacing: "-0.02em", fontWeight: "800" }]
        }
      }
    }
  };
</script>
<link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body class="font-body-md text-body-md selection:bg-brand-red selection:text-white">

<header class="fixed top-0 w-full z-50 bg-surface-glass backdrop-blur-md shadow-sm border-b border-subtle">
  <div class="max-w-container-max mx-auto px-gutter flex justify-between items-center h-20">
    <a href="index.php" class="flex items-center gap-3">
      <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0">
        <rect width="24" height="24" rx="6" fill="#ff0a1f"></rect>
        <path d="M9 7l9 5-9 5V7z" fill="white"></path>
      </svg>
      <span class="font-display-lg text-headline-lg font-black text-primary tracking-tighter">Pokiflix</span>
    </a>
    <nav class="hidden md:flex items-center space-x-8 font-label-md text-label-md">
      <?php foreach ($navLinks as $key => $link): ?>
        <a class="<?= $activeNav === $key ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-on-surface transition-colors' ?>" href="<?= $link['href'] ?>"><?= $link['label'] ?></a>
      <?php endforeach; ?>
    </nav>
    <div class="flex items-center gap-4">
      <button aria-label="Search" class="material-symbols-outlined text-on-surface-variant hover:text-brand-red transition-colors">search</button>
      <a class="hidden sm:inline-block bg-primary-container text-on-primary-container px-6 py-2.5 rounded-full font-label-md text-label-md hover:opacity-80 transition-opacity active:scale-95 duration-150" href="contact.php">Get Started</a>
      <button id="mobile-menu-btn" aria-label="Toggle menu" class="md:hidden material-symbols-outlined text-on-surface">menu</button>
    </div>
  </div>
  <div id="mobile-menu" class="mobile-menu md:hidden absolute top-20 left-0 w-full bg-surface-container border-b border-subtle px-gutter py-6 flex flex-col gap-4 font-label-md">
    <?php foreach ($navLinks as $key => $link): ?>
      <a class="<?= $activeNav === $key ? 'text-primary font-bold' : 'text-on-surface-variant' ?>" href="<?= $link['href'] ?>"><?= $link['label'] ?></a>
    <?php endforeach; ?>
    <a class="text-on-surface-variant" href="contact.php">Contact</a>
  </div>
</header>
<main>
