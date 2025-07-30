<?php
function renderInput($props = []) {
    $type = $props['type'] ?? 'text';
    $id = $props['id'] ?? '';
    $name = $props['name'] ?? $id;
    $value = $props['value'] ?? '';
    $placeholder = $props['placeholder'] ?? '';
    $required = $props['required'] ?? false;
    $disabled = $props['disabled'] ?? false;
    $class = $props['class'] ?? '';

    // Base classes from your React version
    $baseClass = "file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive";

    $requiredAttr = $required ? 'required' : '';
    $disabledAttr = $disabled ? 'disabled' : '';

    return "<input type=\"$type\" name=\"$name\" id=\"$id\" value=\"$value\" placeholder=\"$placeholder\" class=\"$baseClass $class\" $requiredAttr $disabledAttr data-slot=\"input\" />";
}
