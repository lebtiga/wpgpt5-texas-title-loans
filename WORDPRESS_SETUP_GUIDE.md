# WordPress SEO Site Setup Guide - Complete Playbook

## Overview
This guide documents the complete process for setting up a high-performance WordPress SEO site with 50+ pages, optimized for PageSpeed Insights, and deployed on Railway.

## Prerequisites
- Docker installed locally
- Railway account
- GitHub repository
- Domain name (optional)

## Step 1: Initial WordPress Setup

### 1.1 Create Docker Configuration
```dockerfile
# Dockerfile
FROM wordpress:latest
RUN docker-php-ext-install mysqli
COPY wp-content /usr/src/wordpress/wp-content
```

### 1.2 Create docker-compose.yml
```yaml
version: '3.8'
services:
  wordpress:
    build: .
    ports:
      - "8080:80"
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
    volumes:
      - ./wp-content:/var/www/html/wp-content
  db:
    image: mysql:5.7
    environment:
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: wordpress
      MYSQL_ROOT_PASSWORD: somewordpress
```

## Step 2: Theme Development

### 2.1 Create Custom Theme Structure
```
wp-content/themes/wpgpt-theme/
├── assets/
│   ├── css/
│   │   ├── main.css
│   │   └── sales-page-fixed.css
│   └── js/
│       ├── main.js
│       └── sales-page.js
├── includes/
│   ├── performance-optimization.php
│   └── accessibility-fixes.php
├── page-templates/
│   └── (various page templates)
├── template-parts/
│   └── (reusable components)
├── functions.php
├── header.php
├── footer.php
├── front-page.php
└── style.css
```

### 2.2 Essential functions.php Setup
```php
// CRITICAL: Include performance optimizations first
require_once get_template_directory() . '/includes/performance-optimization.php';
require_once get_template_directory() . '/includes/accessibility-fixes.php';

// Version assets for cache busting
function wpgpt_enqueue_assets(): void {
    $theme_version = wp_get_theme()->get('Version') ?: '0.1.0';
    
    wp_enqueue_style('wpgpt-main', 
        get_template_directory_uri() . '/assets/css/main.css',
        [], $theme_version);
    
    if (is_front_page()) {
        wp_enqueue_style('sales-page',
            get_template_directory_uri() . '/assets/css/sales-page-fixed.css',
            ['wpgpt-main'], '1.2.0'); // Use versioning!
    }
}
add_action('wp_enqueue_scripts', 'wpgpt_enqueue_assets');
```

## Step 3: Performance Optimization (CRITICAL)

### 3.1 Avoid External Image Dependencies
**MISTAKE TO AVOID**: Never use Unsplash or external image URLs in CSS
```css
/* BAD - Will cause 404s and slow loading */
background-image: url('https://source.unsplash.com/...');

/* GOOD - Use CSS gradients */
background: linear-gradient(rgba(13,76,133,0.88), rgba(11,47,83,0.92)),
            linear-gradient(135deg, #0d4c85 0%, #0b2f53 100%);
```

### 3.2 Critical CSS Inlining
Add to performance-optimization.php:
```php
add_action('wp_head', function() {
    if (is_front_page()) {
        ?>
        <style id="critical-css">
            /* Inline critical above-the-fold CSS */
            .hero-sales{background:linear-gradient(...);}
            /* Include all visible elements on initial load */
        </style>
        <?php
    }
}, 5);
```

### 3.3 JavaScript Optimization
**MISTAKE TO AVOID**: Forced reflows from DOM queries
```javascript
/* BAD - Causes forced reflow */
function checkResponsive() {
    const width = window.innerWidth; // Forces reflow
    element.style.transform = 'scale(0.85)';
}

/* GOOD - Use requestAnimationFrame and cache values */
let cachedWidth = window.innerWidth;
function checkResponsive() {
    requestAnimationFrame(() => {
        const width = cachedWidth;
        element.style.transform = 'scale(0.85)';
    });
}
```

## Step 4: Iframe Implementation

### 4.1 Proper Iframe Setup
**MISTAKE TO AVOID**: Wrong sandbox attributes cause SecurityErrors
```html
<!-- BAD - Causes SecurityError -->
<iframe sandbox="allow-scripts allow-same-origin allow-forms">

<!-- GOOD - Proper sandbox configuration -->
<iframe 
    src="https://example.com/form.php"
    sandbox="allow-scripts allow-forms allow-popups allow-modals"
    title="Application Form"
    loading="eager">
</iframe>
```

### 4.2 iPhone Container Implementation
```html
<div class="iphone-container-responsive" style="position: relative; width: 340px; height: 636px;">
    <img src="iphone-image.webp" 
         width="340" 
         height="636"
         fetchpriority="high"
         loading="eager"
         alt="iPhone">
    <div class="iframe-container-responsive" style="position: absolute; top: 56px; left: 19px;">
        <iframe src="form-url"></iframe>
    </div>
</div>
```

## Step 5: Railway Deployment

### 5.1 Railway Configuration
Create railway.json:
```json
{
  "build": {
    "builder": "DOCKERFILE"
  },
  "deploy": {
    "restartPolicyType": "ON_FAILURE",
    "restartPolicyMaxRetries": 10
  }
}
```

### 5.2 Environment Variables
Set in Railway dashboard:
- `WORDPRESS_DB_HOST`
- `WORDPRESS_DB_USER`
- `WORDPRESS_DB_PASSWORD`
- `WORDPRESS_DB_NAME`
- `WORDPRESS_CONFIG_EXTRA` (for additional configs)

### 5.3 Fix CSS Loading Issues
**MISTAKE TO AVOID**: Dockerfile copying wrong assets
```dockerfile
# BAD - Will override theme assets
COPY assets /var/www/html/wp-content/themes/wpgpt-theme/assets

# GOOD - Copy entire wp-content
COPY wp-content /usr/src/wordpress/wp-content
```

## Step 6: Accessibility Fixes

### 6.1 Color Contrast
Create accessibility-fixes.php:
```php
add_action('wp_head', function() {
    ?>
    <style>
    /* Fix color contrast issues */
    .site-footer { 
        background: #1a1a1a !important; 
        color: #ffffff !important; 
    }
    .site-footer a { 
        color: #9db4ff !important; 
    }
    </style>
    <?php
}, 25);
```

### 6.2 Form Labels
```html
<!-- Always add labels to form elements -->
<label for="vehicle-value">Vehicle Value</label>
<input type="range" id="vehicle-value" aria-label="Select vehicle value">
```

## Step 7: SEO Structure

### 7.1 Page Creation Strategy
```php
// Create 50+ location pages programmatically
$cities = ['houston', 'dallas', 'austin', 'san-antonio'];
foreach ($cities as $city) {
    wp_insert_post([
        'post_title' => "Car Title Loans in {$city}",
        'post_type' => 'page',
        'post_status' => 'publish',
        'page_template' => 'page-templates/city-template.php'
    ]);
}
```

### 7.2 Schema Markup
Add to page templates:
```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FinancialService",
  "name": "Texas Title Loans",
  "areaServed": {"@type": "State", "name": "Texas"}
}
</script>
```

## Step 8: Testing & Optimization

### 8.1 PageSpeed Insights Checklist
- [ ] Run mobile test first (most important)
- [ ] Check for 404 errors in Network tab
- [ ] Verify no forced reflows > 50ms
- [ ] Ensure LCP < 2.5s
- [ ] Check accessibility score > 90

### 8.2 Common Issues & Solutions

| Issue | Solution |
|-------|----------|
| Broken images (404s) | Remove all external image URLs, use local or CSS gradients |
| Forced reflows | Use requestAnimationFrame for DOM operations |
| Poor LCP | Add fetchpriority="high" to hero images |
| Accessibility failures | Fix color contrast ratios, add proper labels |
| CSS not loading on Railway | Check Dockerfile COPY commands |
| Iframe SecurityErrors | Remove allow-same-origin from sandbox |

## Step 9: Git Workflow

### 9.1 Commit Strategy
```bash
# Always commit with descriptive messages
git add -A
git commit -m "Fix: [Issue] - [Solution]

- Detail 1
- Detail 2"

# Push only when stable
git push origin main
```

### 9.2 Version Management
```php
// Always increment versions for cache busting
wp_enqueue_style('sales-page', $url, [], '1.2.0'); // Increment this!
```

## Step 10: Final Deployment Checklist

- [ ] All external images removed/replaced
- [ ] JavaScript optimized (no forced reflows)
- [ ] Critical CSS inlined
- [ ] Iframe properly sandboxed
- [ ] Accessibility score > 90
- [ ] Mobile PageSpeed score > 50
- [ ] All 50+ pages created and indexed
- [ ] Schema markup added
- [ ] CSP headers configured
- [ ] Cache headers set
- [ ] Version numbers updated for assets

## Troubleshooting Commands

```bash
# Local development
docker-compose up -d
docker-compose logs wordpress

# Check for issues
docker exec -it [container] bash
tail -f /var/log/apache2/error.log

# Railway deployment
railway logs
railway run bash

# Git management
git status
git diff
git log --oneline -10
```

## Key Lessons Learned

1. **NEVER use external image URLs** - They will break and slow down your site
2. **Always version your assets** - Critical for cache busting
3. **Test mobile first** - It's harder to pass and more important
4. **Use requestAnimationFrame** - Prevents forced reflows
5. **Sandbox iframes carefully** - Wrong attributes cause security errors
6. **Include performance optimizations early** - Don't wait until the end
7. **Test on Railway frequently** - Local and production can differ

## Quick Reference URLs

- PageSpeed Insights: https://pagespeed.web.dev/
- Railway Dashboard: https://railway.app/dashboard
- WebAIM Contrast Checker: https://webaim.org/resources/contrastchecker/
- Schema Validator: https://validator.schema.org/

---

**Created**: 2024
**Last Updated**: After implementing Texas Title Loans site with 50+ pages
**Final Performance**: Mobile score improved from ~30 to 50+, Accessibility 95+