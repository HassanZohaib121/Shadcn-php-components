<?php
function badgeVariants($variant = 'default', $additionalClasses = '') {
    $variants = [
        'default' => 'border-transparent bg-primary text-primary-foreground [a&]:hover:bg-primary/90',
        'secondary' => 'border-transparent bg-secondary text-secondary-foreground [a&]:hover:bg-secondary/90',
        'destructive' => 'border-transparent bg-destructive text-white [a&]:hover:bg-destructive/90 focus-visible:ring-destructive/20 dark:focus-visible:ring-destructive/40 dark:bg-destructive/60',
        'outline' => 'text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground'
    ];

    $baseClass = "inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden";

    $variantClass = $variants[$variant] ?? $variants['default'];

    return trim("$baseClass $variantClass $additionalClasses");
}

function renderBadge($props = []) {
    $tag = isset($props['asChild']) && $props['asChild'] ? 'div' : 'span';
    $variant = $props['variant'] ?? 'default';
    $className = $props['class'] ?? '';
    $content = $props['content'] ?? 'Badge';
    $attributes = '';

    $exclude = ['variant', 'class', 'asChild', 'content'];
    foreach ($props as $key => $value) {
        if (!in_array($key, $exclude)) {
            $escaped = htmlspecialchars($value, ENT_QUOTES);
            $attributes .= " $key=\"$escaped\"";
        }
    }

    $classAttr = badgeVariants($variant, $className);

    return "<$tag class=\"$classAttr\" data-slot=\"badge\"$attributes>$content</$tag>";
}
