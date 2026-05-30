# Quick Fix for Image Uploads

## Problem
Railway uses ephemeral storage - uploaded files are lost on restart.

## Quick Solutions (No S3 Required)

### Option 1: Use Image URLs (Easiest)
Instead of uploading files, use direct image URLs from:
- ImgBB: https://imgbb.com/
- Imgur: https://imgur.com/
- Cloudinary: https://cloudinary.com/ (free tier)

Just paste the image URL in your admin form instead of uploading.

### Option 2: Cloudflare R2 (Free, S3-Compatible)
1. Sign up: https://dash.cloudflare.com/
2. Create R2 bucket (10GB free)
3. Get API credentials
4. Add to Railway variables (same as S3 config)

### Option 3: Store in Database (For Small Images)
Store profile images as base64 in database.
Works for: avatars, logos, small images
Not recommended for: galleries, large images

### Option 4: Commit to Git (Development Only)
Store images in `public/images/` and commit to git.
⚠️ Not recommended for production with many images.

## Recommended: Cloudflare R2
- FREE 10GB storage
- No egress fees
- S3-compatible (works with Laravel)
- Easy setup (5 minutes)

## Setup Cloudflare R2

1. Create account: https://dash.cloudflare.com/
2. Go to R2 → Create bucket
3. Get API token
4. Add to Railway:
   ```
   FILESYSTEM_DISK=s3
   AWS_ACCESS_KEY_ID=<r2_key>
   AWS_SECRET_ACCESS_KEY=<r2_secret>
   AWS_DEFAULT_REGION=auto
   AWS_BUCKET=your-bucket-name
   AWS_ENDPOINT=https://<account>.r2.cloudflarestorage.com
   AWS_URL=https://pub-<id>.r2.dev
   ```

Done! Uploads will now persist.
