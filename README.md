# SV basetheme

Startpunt voor nieuwe WordPress-sites van Studio Vuurkever: een Bedrock-project met het thema `sv-basetheme`.

- **Bedrock**: WordPress, plugins en libraries via Composer, configuratie via `.env`
- **Thema**: Timber 2 (Twig), ACF Pro-blocks, velden in code met StoutLogic ACF Builder
- **Front-end**: Tailwind 4, Webpack 5, vanilla JS-modules, Inter lokaal gehost
- **SEO**: Yoast SEO
- **Hosting**: Docker-image voor Coolify

## Nieuw project starten

```bash
git clone git@github.com:Viktorharmens/sv-basetheme.git mijn-project
cd mijn-project
rm -rf .git && git init
```

Hernoem daarna het thema als dat nodig is: de map `web/app/themes/sv-basetheme`, het PSR-4-pad in `composer.json`, de themanaam in `style.css` en de paden in `Dockerfile`.

## Lokaal draaien (Valet of Herd)

1. `composer install`. ACF Pro komt uit `connect.advancedcustomfields.com`; de login staat in `~/.composer/auth.json`.
2. `cp .env.example .env` en vul de database, `WP_HOME` (bijvoorbeeld `http://mijn-project.test`) en de salts in. Salts maak je op [roots.io/salts.html](https://roots.io/salts.html).
3. Maak de database aan en installeer WordPress:
   ```bash
   wp core install --url=http://mijn-project.test --title="Mijn project" --admin_user=admin --admin_email=...
   wp theme activate sv-basetheme
   wp plugin activate advanced-custom-fields-pro wordpress-seo
   ```
4. Thema bouwen:
   ```bash
   cd web/app/themes/sv-basetheme
   npm install
   npm run build   # of: npm run watch
   ```

Valet en Herd herkennen Bedrock en serveren `web/` als webroot. Gebruik lokaal PHP 8.4, dezelfde versie als productie (`valet isolate php@8.4`).

## Opbouw van het thema

```
web/app/themes/sv-basetheme/
├── functions.php        SITE_VERSION en opstart
├── src/                 PHP-classes (namespace SV\Theme, autoload via de root-composer.json)
│   ├── Theme.php        start alle onderdelen
│   ├── Setup.php        theme supports, menu's, afbeeldingsformaten
│   ├── Assets.php       CSS/JS uit dist/, font-preload
│   ├── Context.php      menu's en site-opties in de Timber-context
│   ├── Blocks.php       registreert alles in blocks/ als ACF-block
│   ├── Editor.php       editor-styles, block locking alleen voor beheerders
│   ├── Comments.php     reacties volledig uit
│   ├── Cleanup.php      emoji, generator-tags, Gutenberg-CSS en jQuery van de voorkant
│   └── Fields/          veldgroepen met ACF Builder (zoals Site-opties)
├── blocks/<naam>/       block.json, fields.php (ACF Builder), index.twig
├── views/               Twig-templates en partials
├── assets/js/           script.js + modules/ (één klasse per feature)
├── assets/css/          style.css, editor.css, tokens.css (gegenereerd)
├── theme.json           kleuren en fonts: de enige bron voor editor én Tailwind
└── scripts/             tokens.mjs en block-new.mjs
```

### Commando's (in de themamap)

| Commando | Wat het doet |
| --- | --- |
| `npm run build` | Tokens genereren en productie-build naar `dist/` |
| `npm run watch` | Ontwikkel-build met sourcemaps, bouwt opnieuw bij wijzigingen |
| `npm run block:new -- naam` | Nieuw block met `block.json`, `fields.php` en `index.twig` |
| `npm run lint` | ESLint op de JavaScript |

PHP-stijl controleer je vanuit de projectroot met `composer lint` (Pint), en `composer lint:fix` past het aan.

### Kleuren en fonts aanpassen

Pas `theme.json` aan. `npm run build` zet de kleuren en fonts om naar Tailwind-tokens. Een kleur met slug `primary` wordt zo `bg-primary`, `text-primary` enzovoort, en hij staat ook in het kleurenpalet van de editor.

### Een block maken

```bash
npm run block:new -- usp-lijst
```

Pas daarna `fields.php` (velden met ACF Builder) en `index.twig` aan. Het block wordt automatisch geregistreerd en toegestaan in de editor. In de Twig heb je `fields`, `block` en `is_preview` tot je beschikking.

### JavaScript

Elke feature is een eigen klasse in `assets/js/modules/`, met `js-`-selectors als hook. `assets/js/script.js` importeert en start de modules op `DOMContentLoaded`.

## Release

Bump `SITE_VERSION` in `functions.php` (patch, minor of major) in dezelfde commit als de wijziging. Die versie zorgt voor cache-busting van de CSS en JS. Na een Composer-wijziging genereer je `composer.lock` opnieuw en commit je hem mee.

## Deploy naar Coolify

De `Dockerfile` bouwt in drie stappen: de thema-assets (Node), de Composer-pakketten zonder dev-dependencies, en de productie-image (`serversideup/php:8.4-fpm-nginx`, met `web/` als webroot op poort 8080).

1. Maak in Coolify een MariaDB- of MySQL-database aan.
2. Voeg een applicatie toe uit de Git-repo, met build pack **Dockerfile** en poort **8080**.
3. Zet bij de environment variables:
   - `DB_NAME`, `DB_USER`, `DB_PASSWORD`, `DB_HOST`
   - `WP_ENV=production`, `WP_HOME=https://domein.nl`, `WP_SITEURL=https://domein.nl/wp`
   - de acht keys en salts
   - `COMPOSER_AUTH` als **build variable**, met de ACF Pro-login als JSON:
     `{"http-basic":{"connect.advancedcustomfields.com":{"username":"<licentiesleutel>","password":"<site-url>"}}}`
     Hij wordt alleen in de build-stage gebruikt en komt niet in de uiteindelijke image.
4. Voeg een persistent volume toe op `/var/www/html/web/app/uploads`.
5. Deploy. Daarna kun je WordPress installeren via `/wp/wp-admin/install.php` of met WP-CLI in de container.

In productie staat `DISALLOW_FILE_MODS` aan. Plugins en updates lopen dus altijd via Composer en een nieuwe deploy.
