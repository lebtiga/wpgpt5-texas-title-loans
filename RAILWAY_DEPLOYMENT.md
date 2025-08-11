# Railway Deployment Guide

## Quick Deploy to Railway

### Prerequisites
- Railway account (https://railway.app)
- GitHub repository connected

### Step 1: Deploy from GitHub

1. **Login to Railway**: https://railway.app
2. **New Project**: Click "New Project"
3. **IMPORTANT - Add MySQL Database FIRST**:
   - Click "New" → "Database" → "Add MySQL"
   - Wait for MySQL to deploy (green status)
   - Note the environment variables created
4. **Then Deploy from GitHub**:
   - Click "New" → "GitHub Repo"
   - Select your repository `wpgpt5-texas-title-loans`
   - Railway will automatically detect the Dockerfile

### Step 2: Configure Environment Variables

In Railway dashboard, add these variables:

```bash
# WordPress Settings
WORDPRESS_TABLE_PREFIX=wp_
WORDPRESS_DEBUG=false

# API Keys
FREEPIK_API_KEY=FPSX3e1fb9d75ed20336b070cae064f424ef

# Generate these at: https://api.wordpress.org/secret-key/1.1/salt/
WORDPRESS_AUTH_KEY='your-unique-phrase-here'
WORDPRESS_SECURE_AUTH_KEY='your-unique-phrase-here'
WORDPRESS_LOGGED_IN_KEY='your-unique-phrase-here'
WORDPRESS_NONCE_KEY='your-unique-phrase-here'
WORDPRESS_AUTH_SALT='your-unique-phrase-here'
WORDPRESS_SECURE_AUTH_SALT='your-unique-phrase-here'
WORDPRESS_LOGGED_IN_SALT='your-unique-phrase-here'
WORDPRESS_NONCE_SALT='your-unique-phrase-here'
```

### Step 3: Deploy

1. Railway will automatically build and deploy using the Dockerfile
2. Wait for deployment to complete (~5-10 minutes)
3. Get your site URL from Railway dashboard

### Step 4: WordPress Setup

1. **Access your site**: `https://your-app.railway.app`
2. **Complete WordPress installation**:
   - Site Title: Texas Title Loans
   - Username: admin (or your choice)
   - Password: (strong password)
   - Email: your-email@example.com

3. **Login to WordPress Admin**: `https://your-app.railway.app/wp-admin`

### Step 5: Activate Theme and Plugins

1. Go to **Appearance → Themes**
2. Activate **WPGpt Theme**
3. Go to **Plugins**
4. Activate **Elementor** (if available)

### Step 6: Import Houston Page Content

1. Go to **Pages → Add New**
2. Title: "Houston Title Loans"
3. Slug: `houston-title-loans-elementor`
4. Copy content from local development
5. Publish

### Step 7: Configure Permalinks

1. Go to **Settings → Permalinks**
2. Select **Post name**
3. Save Changes

## Troubleshooting

### Database Connection Error
- Check MySQL service is running in Railway
- Verify environment variables are set correctly

### Slow Performance
- Railway free tier may sleep after inactivity
- Consider upgrading for production use

### Missing Images
- Upload media files through WordPress admin
- Or use Freepik API integration

## Local Data Export (Optional)

If you want to migrate existing data from Docker:

```bash
# Export from local Docker
docker compose exec db mysqldump -u root -proot wordpress > backup.sql

# Import to Railway (use Railway CLI or phpMyAdmin)
```

## Monitoring

- Check logs in Railway dashboard
- Monitor resource usage
- Set up uptime monitoring (optional)

## Custom Domain (Optional)

1. In Railway settings, add custom domain
2. Update DNS records at your domain registrar
3. Railway provides SSL automatically

## Important Notes

- **Free Tier Limits**: 500 hours/month, sleeps after inactivity
- **Database Persistence**: Data persists across deployments
- **Backups**: Set up regular backups for production
- **Scaling**: Easy to scale up when needed

## Support

- Railway Discord: https://discord.gg/railway
- Railway Docs: https://docs.railway.app
- WordPress Support: https://wordpress.org/support/