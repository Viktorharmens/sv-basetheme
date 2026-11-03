// Maakt een nieuw ACF-block aan: npm run block:new -- naam-van-block
import { existsSync, mkdirSync, writeFileSync } from 'node:fs';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

const slug = process.argv[2];

if (!slug || !/^[a-z][a-z0-9-]*$/.test(slug)) {
  process.stderr.write('Gebruik: npm run block:new -- naam-van-block (kleine letters en streepjes)\n');
  process.exit(1);
}

const dir = join(dirname(fileURLToPath(import.meta.url)), '..', 'blocks', slug);

if (existsSync(dir)) {
  process.stderr.write(`Block "${slug}" bestaat al.\n`);
  process.exit(1);
}

const title = slug.charAt(0).toUpperCase() + slug.slice(1).replaceAll('-', ' ');
const key = slug.replaceAll('-', '_');

const blockJson = {
  $schema: 'https://schemas.wp.org/trunk/block.json',
  apiVersion: 3,
  name: `acf/${slug}`,
  title,
  description: '',
  category: 'design',
  icon: 'block-default',
  textdomain: 'sv-basetheme',
  acf: {
    blockVersion: 3,
    mode: 'preview',
    renderCallback: 'SV\\Theme\\Blocks::render',
  },
  supports: { anchor: true, align: false, html: false },
};

const fieldsPhp = `<?php

use StoutLogic\\AcfBuilder\\FieldsBuilder;

$fields = new FieldsBuilder('${key}', ['title' => __('${title}', 'sv-basetheme')]);

$fields
    ->addText('title', ['label' => __('Titel', 'sv-basetheme')]);

return $fields;
`;

const twig = `<section {{ block.anchor ? 'id="' ~ block.anchor ~ '"' }} class="container py-16">
\t<h2 class="text-3xl font-bold">{{ fields.title }}</h2>
</section>
`;

mkdirSync(dir, { recursive: true });
writeFileSync(join(dir, 'block.json'), `${JSON.stringify(blockJson, null, '\t')}\n`);
writeFileSync(join(dir, 'fields.php'), fieldsPhp);
writeFileSync(join(dir, 'index.twig'), twig);

process.stdout.write(`Block aangemaakt in blocks/${slug}/\n`);
