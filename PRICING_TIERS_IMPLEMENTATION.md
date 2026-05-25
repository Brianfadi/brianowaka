# Pricing Tiers Implementation

## Overview
The Investment section on the services page (http://127.0.0.1:8000/services) is now fully dynamic and manageable through the admin dashboard.

## What Was Created

### 1. Database
- **Migration**: `2026_05_23_141103_create_pricing_tiers_table.php`
- **Table**: `pricing_tiers`
- **Columns**:
  - `id` - Primary key
  - `name` - Tier name (e.g., Basic, Standard, Enterprise)
  - `price` - Price range (e.g., KES 25K – 50K)
  - `description` - Short description of what's included
  - `is_featured` - Boolean to highlight as "Most Popular"
  - `order` - Display order (lower numbers appear first)
  - `is_active` - Boolean to show/hide on frontend
  - `timestamps` - Created at and updated at

### 2. Model
- **File**: `app/Models/PricingTier.php`
- **Features**:
  - Mass assignable fields
  - Boolean casting for `is_featured` and `is_active`
  - `active()` scope to get only active tiers
  - `ordered()` scope to sort by display order

### 3. Controller
- **File**: `app/Http/Controllers/Admin/PricingTierController.php`
- **Methods**:
  - `index()` - List all pricing tiers
  - `create()` - Show create form
  - `store()` - Save new pricing tier
  - `edit()` - Show edit form
  - `update()` - Update existing pricing tier
  - `destroy()` - Delete pricing tier

### 4. Routes
- **File**: `routes/web.php`
- **Routes Added**:
  - `GET /admin/pricing-tiers` - List all tiers
  - `GET /admin/pricing-tiers/create` - Create form
  - `POST /admin/pricing-tiers` - Store new tier
  - `GET /admin/pricing-tiers/{id}/edit` - Edit form
  - `PUT /admin/pricing-tiers/{id}` - Update tier
  - `DELETE /admin/pricing-tiers/{id}` - Delete tier

### 5. Admin Views
Created in `resources/views/admin/pricing-tiers/`:
- **index.blade.php** - List all pricing tiers with actions
- **create.blade.php** - Form to create new pricing tier
- **edit.blade.php** - Form to edit existing pricing tier

### 6. Frontend Integration
- **Updated**: `app/Http/Controllers/ServicesController.php`
  - Now fetches pricing tiers from database
  - Passes them to the services view
- **Updated**: `resources/views/frontend/services.blade.php`
  - Investment section now uses dynamic data
  - Falls back to default tiers if none are configured
  - Properly displays featured tiers with special styling

### 7. Navigation
- **Updated**: `resources/views/layouts/admin.blade.php`
  - Added "Pricing Tiers" link under Services section
  - Link appears in the admin sidebar navigation

### 8. Seeder
- **File**: `database/seeders/PricingTierSeeder.php`
- **Default Data**: Creates 3 default pricing tiers:
  - Basic (KES 25K – 50K)
  - Standard (KES 50K – 100K) - Featured
  - Enterprise (KES 100K+)

## How to Use

### Admin Dashboard
1. Login to admin dashboard
2. Navigate to **Services > Pricing Tiers**
3. Click **Add New Pricing Tier** to create a new tier
4. Fill in the form:
   - **Tier Name**: e.g., Basic, Standard, Enterprise
   - **Price Range**: e.g., KES 25K – 50K, KES 100K+
   - **Description**: Brief description of what's included
   - **Display Order**: Lower numbers appear first (0, 1, 2...)
   - **Featured**: Check to highlight as "Most Popular"
   - **Active**: Check to show on services page
5. Click **Create Pricing Tier**

### Editing Tiers
1. Go to **Services > Pricing Tiers**
2. Click the edit icon next to any tier
3. Update the information
4. Click **Update Pricing Tier**

### Deleting Tiers
1. Go to **Services > Pricing Tiers**
2. Click the delete icon next to any tier
3. Confirm deletion

## Features

### Frontend Display
- Automatically displays all active pricing tiers
- Featured tiers have special styling (gradient background, "Most Popular" badge)
- Responsive grid layout (adapts to number of tiers)
- Falls back to default tiers if none are configured
- Each tier has a "Get a Quote" button linking to contact page

### Admin Features
- Full CRUD operations (Create, Read, Update, Delete)
- Order management (control display order)
- Featured tier highlighting
- Active/Inactive toggle
- Clean, modern admin interface matching existing design

## Database Commands

### Run Migration
```bash
php artisan migrate
```

### Seed Default Data
```bash
php artisan db:seed --class=PricingTierSeeder
```

### Rollback (if needed)
```bash
php artisan migrate:rollback
```

## Files Modified/Created

### Created Files
1. `database/migrations/2026_05_23_141103_create_pricing_tiers_table.php`
2. `app/Models/PricingTier.php`
3. `app/Http/Controllers/Admin/PricingTierController.php`
4. `resources/views/admin/pricing-tiers/index.blade.php`
5. `resources/views/admin/pricing-tiers/create.blade.php`
6. `resources/views/admin/pricing-tiers/edit.blade.php`
7. `database/seeders/PricingTierSeeder.php`

### Modified Files
1. `routes/web.php` - Added pricing tier routes
2. `app/Http/Controllers/ServicesController.php` - Added pricing tiers data
3. `resources/views/frontend/services.blade.php` - Made Investment section dynamic
4. `resources/views/layouts/admin.blade.php` - Added navigation link

## Notes
- The system maintains backward compatibility - if no pricing tiers are configured, it falls back to the original hardcoded tiers
- The featured tier gets special styling with a gradient background and "Most Popular" badge
- All pricing tiers are sortable by the `order` field
- Inactive tiers are hidden from the frontend but visible in admin
