# File Upload Setup for Production

## Problem
When you upload images in the admin dashboard on Render, they disappear after container restarts because Docker containers have ephemeral filesystems.

## Solution
Use AWS S3 (or S3-compatible storage) for persistent file storage.

---

## Option 1: AWS S3 (Recommended)

### Step 1: Create an AWS Account
1. Go to https://aws.amazon.com/
2. Sign up for a free account (includes 5GB free storage for 12 months)

### Step 2: Create an S3 Bucket
1. Go to https://console.aws.amazon.com/s3/
2. Click "Create bucket"
3. Bucket name: `brianowaka-uploads` (must be globally unique)
4. Region: Choose closest to your users (e.g., `us-east-1`)
5. **Uncheck** "Block all public access" (we need public read access for images)
6. Acknowledge the warning
7. Click "Create bucket"

### Step 3: Configure Bucket Policy
1. Click on your bucket name
2. Go to "Permissions" tab
3. Scroll to "Bucket policy" and click "Edit"
4. Paste this policy (replace `brianowaka-uploads` with your bucket name):

```json
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Sid": "PublicReadGetObject",
            "Effect": "Allow",
            "Principal": "*",
            "Action": "s3:GetObject",
            "Resource": "arn:aws:s3:::brianowaka-uploads/*"
        }
    ]
}
```

5. Click "Save changes"

### Step 4: Create IAM User
1. Go to https://console.aws.amazon.com/iam/
2. Click "Users" → "Create user"
3. User name: `brianowaka-app`
4. Click "Next"
5. Select "Attach policies directly"
6. Search for and select: `AmazonS3FullAccess`
7. Click "Next" → "Create user"

### Step 5: Create Access Keys
1. Click on the user you just created
2. Go to "Security credentials" tab
3. Scroll to "Access keys" → Click "Create access key"
4. Select "Application running outside AWS"
5. Click "Next" → "Create access key"
6. **IMPORTANT**: Copy both:
   - Access key ID
   - Secret access key
   (You won't be able to see the secret again!)

### Step 6: Configure Render Environment Variables
1. Go to your Render dashboard
2. Select your web service
3. Go to "Environment" tab
4. Add these variables:

```
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=<your-access-key-id>
AWS_SECRET_ACCESS_KEY=<your-secret-access-key>
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=brianowaka-uploads
```

5. Click "Save Changes"
6. Render will automatically redeploy

---

## Option 2: Cloudflare R2 (S3-Compatible, More Generous Free Tier)

Cloudflare R2 offers 10GB free storage (vs AWS's 5GB) and free egress bandwidth.

### Step 1: Create Cloudflare Account
1. Go to https://dash.cloudflare.com/
2. Sign up for a free account

### Step 2: Create R2 Bucket
1. Go to R2 section in dashboard
2. Click "Create bucket"
3. Bucket name: `brianowaka-uploads`
4. Location: Automatic
5. Click "Create bucket"

### Step 3: Make Bucket Public
1. Click on your bucket
2. Go to "Settings" tab
3. Under "Public access", click "Allow Access"
4. Copy the public bucket URL (e.g., `https://pub-xxxxx.r2.dev`)

### Step 4: Create API Token
1. Go to R2 → "Manage R2 API Tokens"
2. Click "Create API token"
3. Token name: `brianowaka-app`
4. Permissions: "Object Read & Write"
5. Click "Create API token"
6. **IMPORTANT**: Copy:
   - Access Key ID
   - Secret Access Key
   - Endpoint URL (e.g., `https://xxxxx.r2.cloudflarestorage.com`)

### Step 5: Configure Render Environment Variables
```
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=<your-r2-access-key-id>
AWS_SECRET_ACCESS_KEY=<your-r2-secret-access-key>
AWS_DEFAULT_REGION=auto
AWS_BUCKET=brianowaka-uploads
AWS_ENDPOINT=<your-r2-endpoint-url>
AWS_URL=<your-public-bucket-url>
AWS_USE_PATH_STYLE_ENDPOINT=false
```

---

## Testing

After configuring:

1. Wait for Render to redeploy
2. Login to admin dashboard
3. Upload an image (e.g., in Settings → Profile Photo)
4. Check if the image appears on the frontend
5. Restart the Render service (to simulate container restart)
6. Verify the image still appears

---

## Troubleshooting

### Images not appearing after upload
- Check Render logs for S3 errors
- Verify AWS credentials are correct
- Ensure bucket policy allows public read access

### "Access Denied" errors
- Check IAM user has S3 permissions
- Verify bucket policy is correct
- Ensure bucket name matches in environment variables

### Images have wrong URLs
- Set `AWS_URL` to your bucket's public URL
- For R2, use the public bucket URL from settings

---

## Cost Estimate

### AWS S3 Free Tier (12 months)
- 5 GB storage
- 20,000 GET requests
- 2,000 PUT requests
- After free tier: ~$0.023/GB/month

### Cloudflare R2 (Always Free)
- 10 GB storage
- Unlimited egress bandwidth
- 1 million Class A operations/month
- 10 million Class B operations/month

**Recommendation**: Start with Cloudflare R2 for better free tier limits.

---

## Security Notes

1. **Never commit AWS credentials to git**
2. **Use environment variables only**
3. **Rotate access keys periodically**
4. **Monitor usage in AWS/Cloudflare dashboard**
5. **Set up billing alerts** to avoid unexpected charges
