# Pokiflix — Image Asset Guide

Tame ChatGPT / DALL·E thi image generate kari ne **exact folder + exact filename** thi muki do. Pachi hu e images website ma lagavi ne aakhi site **animated + modern cinematic UI** banavish.

Haji website ma **koi real photo nathi** — hero, 4 tiles, discover cards badhu CSS gradient che. Aa pack e empty jagya bharva mate che.

---

## 1) Generate karva pehla rules

1. **Language:** ChatGPT ne prompt **English** ma j paste karo (image quality vadhare saru aave).
2. **Daro image pehla aa MASTER STYLE paste karo**, pachi niche no specific prompt.
3. Image ma **koi text, logo, watermark, UI, subtitle, title nathi joiye**. Website par label HTML thi aavse.
4. **Copyrighted movie poster, celebrity face, Marvel/DC/Disney character, Netflix UI clone nathi banavvu.** Original cinematic scene j.
5. Format: **JPG** (photos) / **PNG** (app icon). Naam **exact** rakho, lowercase, hyphen.
6. Size ChatGPT exact nathi aapti — koi bhi high-res chalse. Hu website mate crop/optimize kari daish.
7. Jo image ma text aavi jaye to ChatGPT ne kaho: `Regenerate the same image with absolutely no text, letters, logos, or watermarks.`

### MASTER STYLE (har prompt ni sharuat)

```
Cinematic photoreal still for a premium dark streaming brand named Pokiflix.
Color grade: near-black shadows (#070709), deep charcoal, restrained crimson rim light (#E11D2E / #FF3144), cool midnight-blue fill light.
Shallow depth of field, anamorphic bokeh, subtle film grain, theatrical lighting, ultra-sharp, 8K, widescreen cinema look.
No text, no letters, no logos, no watermarks, no UI, no phones, no laptops, no famous people, no copyrighted characters.
```

---

## 2) Folder structure

Project root (`D:\xampp\htdocs\pokiflix`) ni andar aa folders banao ane files muki do:

```
assets/images/
├── brand/
│   └── app-icon.png
├── hero/
│   ├── hero-bg.jpg
│   └── featured-tonight.jpg
├── tiles/
│   ├── tile-drama.jpg
│   ├── tile-scifi.jpg
│   ├── tile-series.jpg
│   └── tile-docs.jpg
├── discover/
│   ├── cat-films.jpg
│   ├── cat-series.jpg
│   ├── cat-animation.jpg
│   └── cat-documentaries.jpg
├── about/
│   └── about-stage.jpg
├── how/
│   ├── step-01-open.jpg
│   ├── step-02-browse.jpg
│   └── step-03-watch.jpg
├── posters/
│   ├── poster-01.jpg
│   ├── poster-02.jpg
│   ├── poster-03.jpg
│   ├── poster-04.jpg
│   ├── poster-05.jpg
│   └── poster-06.jpg
├── pages/
│   ├── page-404.jpg
│   └── privacy-hero.jpg
└── social/
    └── og-cover.jpg
```

**Total: 23 images.** Niche priority thi start karo.

| Batch | Ketli | Kyare generate karo |
|---|---|---|
| **A — Must** | 12 | Pehla aa 12, website immediately transform thase |
| **B — Strong UI** | 9 | Animated rail + how-it-works + extra pages |
| **C — Brand** | 1 | App icon / apple touch / favicon PNG |
| **D — Skip** | — | Logo SVG already che, grain CSS thi che, feature icons SVG che |

---

## 3) BATCH A — Must (12 images)

Aa tamara screenshot ma je 4 arrows che, e `tiles/` ni 4 files che.

### A1. Full-page hero background

| | |
|---|---|
| **Folder** | `assets/images/hero/` |
| **Filename** | `hero-bg.jpg` |
| **Use** | Homepage `#home` full-bleed cinematic background |
| **Ratio** | 16:9 landscape (1920×1080+) |

**Prompt:**

```
MASTER STYLE +
Ultra-wide cinematic empty luxury home theater at night. A huge dark screen glows faintly with crimson and navy light. Empty velvet seats in the foreground, dust motes in a projector beam, architectural concrete walls, moody fog, premium streaming atmosphere. Shot from the back of the room looking toward the screen. Photoreal, no people, no readable content on the screen, just abstract red-blue glow.
```

---

### A2. Device mock — “Featured tonight” banner

| | |
|---|---|
| **Folder** | `assets/images/hero/` |
| **Filename** | `featured-tonight.jpg` |
| **Use** | Browser mock ni andar moti featured image (screenshot ma play button ni niche) |
| **Ratio** | 16:9 landscape (1280×720+) |

**Prompt:**

```
MASTER STYLE +
A mysterious silhouetted figure standing on a rain-soaked city rooftop at night, facing a skyline of neon crimson and deep blue. Wind in a long dark coat, cinematic backlight, wet asphalt reflections, steam, movie-key-art mood. Close-to-medium shot from behind/side so the face is not identifiable. Photoreal, no text on buildings.
```

---

### A3–A6. Hero device — 4 genre tiles (tamara screenshot ni 4 images)

Aa 4 **portrait posters** che (2:3). Website par niche label HTML thi aavse: DRAMA / SCI-FI / SERIES / DOCS. Image ma text nahi.

#### A3. Drama

| | |
|---|---|
| **Folder** | `assets/images/tiles/` |
| **Filename** | `tile-drama.jpg` |
| **Use** | Device mock tile 1 — Drama |
| **Ratio** | 2:3 portrait (768×1152+) |

**Prompt:**

```
MASTER STYLE +
Intimate dramatic portrait-style cinematic still: a lone person sitting at a dim kitchen table at night, only a small warm lamp and a thin crimson rim light on their shoulder. Rain on the window, empty chair opposite, emotional quiet tension, film still, face turned away or half in shadow so identity is unreadable. Vertical poster composition, photoreal.
```

#### A4. Sci-Fi

| | |
|---|---|
| **Folder** | `assets/images/tiles/` |
| **Filename** | `tile-scifi.jpg` |
| **Use** | Device mock tile 2 — Sci-Fi |
| **Ratio** | 2:3 portrait |

**Prompt:**

```
MASTER STYLE +
Vertical sci-fi film still: a sleek dark corridor of a spaceship or future lab, cool cyan-blue practical lights, one distant crimson warning glow, floating dust, fog, geometric architecture, no readable screens or symbols. Empty, mysterious, premium sci-fi atmosphere. Photoreal, no robots with faces, no famous franchise look.
```

#### A5. Series

| | |
|---|---|
| **Folder** | `assets/images/tiles/` |
| **Filename** | `tile-series.jpg` |
| **Use** | Device mock tile 3 — Series |
| **Ratio** | 2:3 portrait |

**Prompt:**

```
MASTER STYLE +
Vertical cinematic still for a prestige TV series mood: two silhouettes talking on a midnight city balcony, glass railing, warm interior light behind them, cool blue city bokeh, rain, expensive production design. Faces unreadable. Purple-navy grade with a thin crimson accent. Photoreal poster crop.
```

#### A6. Docs (Documentaries)

| | |
|---|---|
| **Folder** | `assets/images/tiles/` |
| **Filename** | `tile-docs.jpg` |
| **Use** | Device mock tile 4 — Docs |
| **Ratio** | 2:3 portrait |

**Prompt:**

```
MASTER STYLE +
Vertical documentary-style cinematic still: a vast quiet landscape at twilight — misty mountains or an arctic ice field — tiny human silhouette for scale, natural light with a subtle emerald-teal grade and faint crimson horizon glow. Photoreal nature photography, epic, serious, no logos, no maps, no text.
```

---

### A7–A10. Discover section — 4 category cards

Homepage `#discover` par Films / Series / Animation / Documentaries.

#### A7. Films

| | |
|---|---|
| **Folder** | `assets/images/discover/` |
| **Filename** | `cat-films.jpg` |
| **Use** | Discover card — Films |
| **Ratio** | 3:2 landscape (1200×800+) |

**Prompt:**

```
MASTER STYLE +
Cinematic movie-palace atmosphere: a giant dark cinema screen filling the frame with abstract crimson-and-navy moving light, empty front-row velvet seats at the bottom edge, projector haze, luxurious and wide. Landscape composition for a website category card. Photoreal, no titles on the screen.
```

#### A8. Series

| | |
|---|---|
| **Folder** | `assets/images/discover/` |
| **Filename** | `cat-series.jpg` |
| **Use** | Discover card — Series |
| **Ratio** | 3:2 landscape |

**Prompt:**

```
MASTER STYLE +
Prestige television mood, landscape: a stylish midnight living room with a huge OLED screen showing only abstract purple-blue light, low sofa, city lights through floor-to-ceiling windows, rain, cinematic production design. No readable UI on the TV. Photoreal.
```

#### A9. Animation

| | |
|---|---|
| **Folder** | `assets/images/discover/` |
| **Filename** | `cat-animation.jpg` |
| **Use** | Discover card — Animation |
| **Ratio** | 3:2 landscape |

**Prompt:**

```
MASTER STYLE +
Original stylized 3D cinematic animation still (not a known studio style, not Pixar/Disney/Anime IP): a glowing paper lantern floating through a dark enchanted forest at night, crimson and teal volumetric light, mist, fireflies, premium animated-movie key art. Landscape, no characters with readable faces, no text.
```

#### A10. Documentaries

| | |
|---|---|
| **Folder** | `assets/images/discover/` |
| **Filename** | `cat-documentaries.jpg` |
| **Use** | Discover card — Documentaries |
| **Ratio** | 3:2 landscape |

**Prompt:**

```
MASTER STYLE +
Landscape documentary still: a researcher or explorer seen from behind in a dark field station looking at a wall of softly glowing analog instruments and a rain-lashed window to the ocean at night. Teal and charcoal grade, serious non-fiction mood, photoreal, unreadable instrument labels.
```

---

### A11. About panel

| | |
|---|---|
| **Folder** | `assets/images/about/` |
| **Filename** | `about-stage.jpg` |
| **Use** | `#about` left visual panel |
| **Ratio** | 4:5 portrait (1080×1350+) |

**Prompt:**

```
MASTER STYLE +
A person watching a huge cinematic screen in a dark designer apartment at night, seen from behind, sitting on a low sofa. The screen is a wash of crimson and navy light that paints the room. Architectural, premium, calm. Portrait composition. Face not visible. Photoreal, no UI on the screen.
```

---

### A12. Social / Open Graph share image

| | |
|---|---|
| **Folder** | `assets/images/social/` |
| **Filename** | `og-cover.jpg` |
| **Use** | WhatsApp / Twitter / Facebook preview (og:image) |
| **Ratio** | **exactly 1.91:1** — ask 1200×630 |

**Prompt:**

```
MASTER STYLE +
Wide cinematic key art for social sharing: dark empty cinema interior, one powerful crimson light hitting the screen, navy haze, luxurious seats in silhouette. Plenty of dark empty space in the center for a website title overlay later. Landscape 1200x630 mood. Photoreal, no text.
```

---

## 4) BATCH B — Stronger animated UI (9 images)

### B1–B3. How it works

#### B1. Step 01 — Open the experience

| | |
|---|---|
| **Folder** | `assets/images/how/` |
| **Filename** | `step-01-open.jpg` |
| **Use** | `#how` card 01 |
| **Ratio** | 1:1 square (1024×1024+) |

**Prompt:**

```
MASTER STYLE +
Square cinematic still: double doors of a dark boutique cinema just opening, a slit of crimson light and blue haze spilling onto black marble floor. No people, mysterious invitation. Photoreal.
```

#### B2. Step 02 — Browse by type

| | |
|---|---|
| **Folder** | `assets/images/how/` |
| **Filename** | `step-02-browse.jpg` |
| **Use** | `#how` card 02 |
| **Ratio** | 1:1 |

**Prompt:**

```
MASTER STYLE +
Square cinematic still: a dark archive wall of unlabeled black film cases and glowing crimson-edged shelves receding into infinity, like browsing a premium collection. No readable spines, no titles. Photoreal, geometric, luxurious.
```

#### B3. Step 03 — Watch with focus

| | |
|---|---|
| **Folder** | `assets/images/how/` |
| **Filename** | `step-03-watch.jpg` |
| **Use** | `#how` card 03 |
| **Ratio** | 1:1 |

**Prompt:**

```
MASTER STYLE +
Square cinematic still: extreme close-up of a dark room where only a widescreen glow lights a viewer’s hands loosely holding a remote, shallow focus, crimson specular highlights, intimate focused-watching mood. No brand logos on the remote. Photoreal.
```

---

### B4–B9. Infinite poster rail (animation mate)

Aa 6 posters homepage par **slow moving cinematic row** (marquee) ma use thase. Badha 2:3 portrait, alag-alag mood, same color grade.

| Folder | Filename | Mood |
|---|---|---|
| `assets/images/posters/` | `poster-01.jpg` | Night city / crime rain |
| `assets/images/posters/` | `poster-02.jpg` | Space / cosmic scale |
| `assets/images/posters/` | `poster-03.jpg` | Romance / warm lamp |
| `assets/images/posters/` | `poster-04.jpg` | War / smoke silhouette |
| `assets/images/posters/` | `poster-05.jpg` | Underwater / teal mystery |
| `assets/images/posters/` | `poster-06.jpg` | Desert night / neon horizon |

**poster-01.jpg**

```
MASTER STYLE +
Vertical movie poster still: neon-soaked rainy alley at night, empty except for a parked black motorcycle, crimson and cyan reflections on wet cobblestone, steam, cinematic crime-thriller mood. No signs with readable words. Photoreal.
```

**poster-02.jpg**

```
MASTER STYLE +
Vertical movie poster still: a tiny astronaut on a black planetary ridge looking at a huge blue-crimson nebula, scale and awe, photoreal space photography look, no NASA logos, no helmet visor reflections of cameras.
```

**poster-03.jpg**

```
MASTER STYLE +
Vertical movie poster still: two wine glasses on a windowsill at night, city bokeh, one warm lamp, rain, intimate adult drama mood, no faces, photoreal.
```

**poster-04.jpg**

```
MASTER STYLE +
Vertical movie poster still: a lone soldier silhouette standing in smoke at dusk, sun a deep crimson disk, destroyed quiet landscape, epic and somber, no flags, no identifiable uniform insignia, photoreal.
```

**poster-05.jpg**

```
MASTER STYLE +
Vertical movie poster still: a dark underwater temple faintly lit by teal bioluminescence and a distant red flare, mysterious documentary-adventure mood, photoreal, no text carvings that look like letters.
```

**poster-06.jpg**

```
MASTER STYLE +
Vertical movie poster still: a lone car on a desert highway at night, headlights cutting fog, far-off crimson neon on the horizon, American-night-drive cinema mood, no license plate text, photoreal.
```

---

### B10. 404 page

| | |
|---|---|
| **Folder** | `assets/images/pages/` |
| **Filename** | `page-404.jpg` |
| **Use** | `404.html` atmosphere |
| **Ratio** | 16:9 or 1:1 |

**Prompt:**

```
MASTER STYLE +
A dark empty cinema with a blank screen showing only a faint broken red glow, one spotlight on an empty seat, fog, lonely and stylish, photoreal, no numbers, no text.
```

---

### B11. Privacy page hero

| | |
|---|---|
| **Folder** | `assets/images/pages/` |
| **Filename** | `privacy-hero.jpg` |
| **Use** | `privacy-policy.html` page hero |
| **Ratio** | 16:9 landscape |

**Prompt:**

```
MASTER STYLE +
Abstract cinematic still: a dark vault-like room of frosted glass panels and soft crimson edge lighting, quiet, secure, premium privacy mood, no cameras, no padlocks with brands, no text, photoreal architecture.
```

---

## 5) BATCH C — Brand (1 image)

Logo SVG already `assets/favicon.svg` ma che. Aa extra PNG app / apple-touch / high-res favicon mate.

| | |
|---|---|
| **Folder** | `assets/images/brand/` |
| **Filename** | `app-icon.png` |
| **Use** | Apple touch icon, PWA icon, high-res favicon |
| **Ratio** | **1:1** — 1024×1024 |

**Prompt:**

```
App icon, square with rounded corners. Solid near-black background (#070709). Centered a simple glossy white play-triangle inside a rounded square made of a rich crimson-to-scarlet gradient (#E11D2E to #FF3144), subtle inner glow, premium, flat-but-dimensional, like a modern streaming app icon. No letters, no word Pokiflix, no extra shapes. Clean, centered, high-end.
```

---

## 6) Checklist (copy-paste)

Generate pachi tick karo:

```
[ ] assets/images/hero/hero-bg.jpg
[ ] assets/images/hero/featured-tonight.jpg
[ ] assets/images/tiles/tile-drama.jpg
[ ] assets/images/tiles/tile-scifi.jpg
[ ] assets/images/tiles/tile-series.jpg
[ ] assets/images/tiles/tile-docs.jpg
[ ] assets/images/discover/cat-films.jpg
[ ] assets/images/discover/cat-series.jpg
[ ] assets/images/discover/cat-animation.jpg
[ ] assets/images/discover/cat-documentaries.jpg
[ ] assets/images/about/about-stage.jpg
[ ] assets/images/social/og-cover.jpg

[ ] assets/images/how/step-01-open.jpg
[ ] assets/images/how/step-02-browse.jpg
[ ] assets/images/how/step-03-watch.jpg
[ ] assets/images/posters/poster-01.jpg
[ ] assets/images/posters/poster-02.jpg
[ ] assets/images/posters/poster-03.jpg
[ ] assets/images/posters/poster-04.jpg
[ ] assets/images/posters/poster-05.jpg
[ ] assets/images/posters/poster-06.jpg
[ ] assets/images/pages/page-404.jpg
[ ] assets/images/pages/privacy-hero.jpg

[ ] assets/images/brand/app-icon.png
```

---

## 7) ChatGPT ma kem paste karvu

Har image mate ek new message:

```
Create one image.

Style:
[MASTER STYLE block]

Scene:
[e image no specific prompt]

Technical:
- Photoreal cinematic still
- No text anywhere
- Vertical 2:3   ← (portrait files mate)
  OR
- Landscape 16:9 ← (hero / featured / og / privacy mate)
  OR
- Square 1:1     ← (how-it-works + app-icon mate)
```

Jo ChatGPT text lakhi de to:

```
Same composition, same lighting, remove every letter, logo, watermark, and UI. Pure visual only.
```

---

## 8) Tame generate kari lo tyare

1. Files **exact naam + exact folder** ma muki do.
2. Mne chat ma kaho: **“images mukdi, UI start kar”**.
3. Hu tyare:
   - images website ma wire karish
   - hero, tiles, discover, about, how, 404, privacy, OG
   - scroll animations, hover, cinematic poster rail, modern motion
   - aakhi site ne premium dark streaming UI banavish

**Note:** Batch A (12) ready hoy to bhi UI start thai shake. B ane C pachi add thai shake.
