<?php
function buttonVariants($variant = 'default', $size = 'default', $additionalClasses = '') {
    $variants = [
        'default' => 'bg-primary text-primary-foreground shadow-xs hover:bg-primary/90',
        'destructive' => 'bg-destructive text-white shadow-xs hover:bg-destructive/90 focus-visible:ring-destructive/20 dark:focus-visible:ring-destructive/40 dark:bg-destructive/60',
        'outline' => 'border bg-background shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50',
        'secondary' => 'bg-secondary text-secondary-foreground shadow-xs hover:bg-secondary/80',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50',
        'link' => 'text-primary underline-offset-4 hover:underline'
    ];

    $sizes = [
        'default' => 'h-9 px-4 py-2 has-[>svg]:px-3',
        'sm' => 'h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5',
        'lg' => 'h-10 rounded-md px-6 has-[>svg]:px-4',
        'icon' => 'size-9'
    ];

    $baseClass = "inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive";

    $variantClass = $variants[$variant] ?? $variants['default'];
    $sizeClass = $sizes[$size] ?? $sizes['default'];

    return trim("$baseClass $variantClass $sizeClass $additionalClasses");
}

function renderButton($props = []) {
    $tag = isset($props['asChild']) && $props['asChild'] ? 'div' : 'button';
    $variant = $props['variant'] ?? 'default';
    $size = $props['size'] ?? 'default';
    $className = $props['class'] ?? '';
    $content = $props['content'] ?? 'Button';
    $attributes = '';

    $exclude = ['variant', 'size', 'class', 'asChild', 'content'];
    foreach ($props as $key => $value) {
        if (!in_array($key, $exclude)) {
            $escaped = htmlspecialchars($value, ENT_QUOTES);
            $attributes .= " $key=\"$escaped\"";
        }
    }

    $classAttr = buttonVariants($variant, $size, $className);

    return "<$tag class=\"$classAttr\" data-slot=\"button\"$attributes>$content</$tag>";
}
