#!/usr/bin/env node

/**
 * Script to fix Wayfinder-generated route files to use @/ alias instead of relative paths
 * This should be run after wayfinder:generate
 */

import { readdirSync, readFileSync, statSync, writeFileSync } from 'fs';
import { dirname, join } from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

const routesDir = join(__dirname, 'resources/js/routes');

function fixImportsInFile(filePath) {
    try {
        let content = readFileSync(filePath, 'utf8');
        const originalContent = content;

        // Replace relative or existing abbreviated wayfinder imports with @/wayfinder/index
        content = content.replace(
            /from\s+['"]((\.\/)?\.\.\/.*?wayfinder|@\/wayfinder)['"]/g,
            "from '@/wayfinder/index'",
        );

        if (content !== originalContent) {
            writeFileSync(filePath, content, 'utf8');
            console.log(`Fixed imports in: ${filePath.replace(__dirname, '')}`);
            return true;
        }
        return false;
    } catch (error) {
        console.error(`Error processing ${filePath}:`, error.message);
        return false;
    }
}

function walkDir(dir) {
    const files = readdirSync(dir);
    let fixedCount = 0;

    for (const file of files) {
        const filePath = join(dir, file);
        const stat = statSync(filePath);

        if (stat.isDirectory()) {
            fixedCount += walkDir(filePath);
        } else if (file === 'index.ts') {
            if (fixImportsInFile(filePath)) {
                fixedCount++;
            }
        }
    }

    return fixedCount;
}

const fixedCount = walkDir(routesDir);
console.log(`\nFixed ${fixedCount} route file(s)`);
