# Dark Mode Quick Reference Guide

## Quick Start
All dark mode styles use Tailwind's `dark:` prefix. Add these classes alongside your existing classes.

## Common Patterns

### Backgrounds
```html
<!-- Solid backgrounds -->
<div class="bg-white dark:bg-gray-900">
<div class="bg-gray-50 dark:bg-gray-800">
<div class="bg-gray-100 dark:bg-gray-700">

<!-- Gradient backgrounds -->
<div class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-950 dark:to-purple-950">
<div class="from-white via-white to-blue-50 dark:from-gray-900 dark:via-gray-900 dark:to-blue-950">
```

### Text Colors
```html
<!-- Headings -->
<h1 class="text-gray-900 dark:text-gray-100">
<h2 class="text-gray-800 dark:text-gray-200">

<!-- Body text -->
<p class="text-gray-700 dark:text-gray-300">
<p class="text-gray-600 dark:text-gray-400">
<p class="text-gray-500 dark:text-gray-400">

<!-- Muted text -->
<span class="text-gray-400 dark:text-gray-500">
```

### Borders
```html
<!-- Standard borders -->
<div class="border border-gray-200 dark:border-gray-700">
<div class="border-gray-300 dark:border-gray-600">

<!-- Colored borders -->
<div class="border-blue-200 dark:border-blue-800">
<div class="border-purple-200 dark:border-purple-800">
```

### Buttons
```html
<!-- Primary button -->
<button class="bg-blue-600 dark:bg-blue-500 hover:bg-blue-700 dark:hover:bg-blue-600 text-white">

<!-- Secondary button -->
<button class="bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600">

<!-- Ghost button -->
<button class="text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
```

### Cards
```html
<!-- Standard card -->
<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow">

<!-- Card with hover -->
<div class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-700">
```

### Links
```html
<!-- Standard link -->
<a class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300">

<!-- Navigation link -->
<a class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
```

### Forms
```html
<!-- Input fields -->
<input class="bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 focus:border-blue-500 dark:focus:border-blue-400">

<!-- Labels -->
<label class="text-gray-700 dark:text-gray-300">

<!-- Placeholder -->
<input class="placeholder-gray-400 dark:placeholder-gray-500">
```

### Shadows
```html
<!-- Standard shadow -->
<div class="shadow dark:shadow-gray-900/50">
<div class="shadow-lg dark:shadow-gray-900/50">
<div class="shadow-xl dark:shadow-gray-900/50">

<!-- Colored shadows -->
<div class="shadow-blue-500/25 dark:shadow-blue-400/25">
```

### Hover States
```html
<!-- Background hover -->
<div class="hover:bg-gray-100 dark:hover:bg-gray-800">

<!-- Text hover -->
<a class="hover:text-blue-600 dark:hover:text-blue-400">

<!-- Border hover -->
<div class="hover:border-blue-500 dark:hover:border-blue-400">
```

### Active/Selected States
```html
<!-- Active navigation -->
<a class="bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400">

<!-- Selected item -->
<div class="bg-blue-100 dark:bg-blue-900/50 border-blue-600 dark:border-blue-400">
```

### Badges/Pills
```html
<!-- Info badge -->
<span class="bg-blue-100 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-800">

<!-- Success badge -->
<span class="bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-300">

<!-- Warning badge -->
<span class="bg-yellow-100 dark:bg-yellow-900/50 text-yellow-700 dark:text-yellow-300">
```

### Dividers
```html
<!-- Horizontal divider -->
<hr class="border-gray-200 dark:border-gray-700">

<!-- Vertical divider -->
<div class="border-l border-gray-200 dark:border-gray-700">
```

## Important: Always Add Transitions
For smooth theme switching, always include transition classes:

```html
<!-- Recommended -->
<div class="bg-white dark:bg-gray-900 transition-colors duration-300">
<p class="text-gray-900 dark:text-gray-100 transition-colors duration-300">
```

## Color Palette Reference

### Light Mode → Dark Mode Mappings
- `white` → `gray-900` or `gray-800`
- `gray-50` → `gray-800` or `gray-850`
- `gray-100` → `gray-700` or `gray-800`
- `gray-200` → `gray-700` (borders)
- `gray-300` → `gray-600` (borders)
- `gray-400` → `gray-500` (muted text)
- `gray-500` → `gray-400` (secondary text)
- `gray-600` → `gray-400` (body text)
- `gray-700` → `gray-300` (body text)
- `gray-800` → `gray-200` (headings)
- `gray-900` → `gray-100` (headings)

### Accent Colors (Lighter in Dark Mode)
- `blue-600` → `blue-400`
- `purple-600` → `purple-400`
- `pink-600` → `pink-400`
- `green-600` → `green-400`
- `red-600` → `red-400`

## Testing Your Dark Mode Styles

1. **Toggle Test**: Click the dark mode toggle and verify all elements look good
2. **Contrast Test**: Ensure text is readable in both modes
3. **Hover Test**: Check all hover states work in both modes
4. **Border Test**: Verify borders are visible but not too harsh
5. **Shadow Test**: Ensure shadows enhance depth without being too dark

## Common Mistakes to Avoid

❌ **Don't**: Use pure black (`bg-black`)
✅ **Do**: Use `bg-gray-900` or `bg-gray-950`

❌ **Don't**: Forget transitions
✅ **Do**: Add `transition-colors duration-300`

❌ **Don't**: Use same color intensity
✅ **Do**: Use lighter accent colors in dark mode

❌ **Don't**: Forget hover states
✅ **Do**: Style both light and dark hover states

❌ **Don't**: Use harsh borders
✅ **Do**: Use softer border colors in dark mode

## Pro Tips

1. **Opacity Trick**: Use `/50` or `/80` for subtle backgrounds
   ```html
   <div class="bg-blue-100/50 dark:bg-blue-900/50">
   ```

2. **Gradient Adjustments**: Make dark mode gradients deeper
   ```html
   <div class="from-blue-50 to-purple-50 dark:from-blue-950 dark:to-purple-950">
   ```

3. **Icon Colors**: Match icon colors to text
   ```html
   <svg class="text-gray-600 dark:text-gray-400">
   ```

4. **Focus States**: Don't forget focus rings
   ```html
   <input class="focus:ring-blue-500 dark:focus:ring-blue-400">
   ```

5. **Backdrop Blur**: Works great in both modes
   ```html
   <div class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm">
   ```

## Need Help?
- Check existing components in `resources/views/layouts/navigation.blade.php`
- Reference the home page in `resources/views/frontend/home.blade.php`
- See full documentation in `DARK_MODE_IMPLEMENTATION.md`
