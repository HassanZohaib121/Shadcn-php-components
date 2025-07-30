<?php
function renderLabel($props = []) {
    $for = htmlspecialchars($props['for'] ?? '');
    $content = htmlspecialchars($props['content'] ?? '');
    $class = htmlspecialchars($props['class'] ?? '');
    
    $baseClass = "flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50";

    return "<label for=\"$for\" class=\"$baseClass $class\" data-slot=\"label\">$content</label>";
}
