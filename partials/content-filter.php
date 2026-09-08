<?php
/**
 * Heuristic filter to hide explicit/adult titles from the catalog API,
 * which does not expose an "adult" flag of its own. This is a best-effort
 * keyword/pattern match (JAV-style catalog codes + explicit terms across a
 * few languages) - it will not catch everything and may occasionally
 * over-filter, but it removes the clear-cut cases seen in testing.
 */

const ADULT_TITLE_TERMS = [
    // Japanese explicit-content terms
    '射精', '不倫', 'エロ', '無修正', 'ハメ撮り', 'av女優', '人妻', '痴女', '熟女',
    '巨乳', '爆乳', '中出し', 'av debut', 'sod女子', '素人', '寝取',
    // English/general explicit terms
    'jav', 'hentai', 'xxx', 'porn', 'pornografia', 'pornô',
];

function is_adult_title(string $title): bool
{
    $lower = mb_strtolower($title, 'UTF-8');

    foreach (ADULT_TITLE_TERMS as $term) {
        if (mb_strpos($lower, $term) !== false) {
            return true;
        }
    }

    // JAV-style catalog codes, e.g. "NSODN-025", "SSIS-123", "FC2-PPV-123456",
    // combined with any Japanese script in the title.
    $hasJavCode = preg_match('/\b[A-Z]{2,7}(-PPV)?-\d{2,6}\b/u', $title) === 1;
    $hasJapaneseScript = preg_match('/[\x{3040}-\x{30FF}\x{4E00}-\x{9FFF}]/u', $title) === 1;
    if ($hasJavCode && $hasJapaneseScript) {
        return true;
    }

    return false;
}

function filter_adult_items(array $items, string $mediaType): array
{
    return array_values(array_filter($items, function ($item) use ($mediaType) {
        $title = $mediaType === 'tv' ? ($item['name'] ?? '') : ($item['title'] ?? '');
        return !is_adult_title($title);
    }));
}
