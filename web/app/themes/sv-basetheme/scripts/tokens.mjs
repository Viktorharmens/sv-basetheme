// Zet kleuren en fonts uit theme.json om naar Tailwind-tokens, zodat editor en site dezelfde bron gebruiken.
import { readFileSync, writeFileSync } from 'node:fs';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = join(dirname(fileURLToPath(import.meta.url)), '..');
const { settings } = JSON.parse(readFileSync(join(root, 'theme.json'), 'utf8'));

const lines = [
  ...settings.color.palette.map(({ slug, color }) => `  --color-${slug}: ${color};`),
  ...settings.typography.fontFamilies.map(({ slug, fontFamily }) => `  --font-${slug}: ${fontFamily};`),
];

const css = `/* Gegenereerd uit theme.json door scripts/tokens.mjs. Niet met de hand aanpassen. */
@theme {
${lines.join('\n')}
}
`;

writeFileSync(join(root, 'assets/css/tokens.css'), css);
