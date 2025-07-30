<?php
function renderCard($props = []) {
    return renderCardElement('card', 'bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm', $props);
}

function renderCardHeader($props = []) {
    return renderCardElement('card-header', '@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6', $props);
}

function renderCardTitle($props = []) {
    return renderCardElement('card-title', 'leading-none font-semibold', $props);
}

function renderCardDescription($props = []) {
    return renderCardElement('card-description', 'text-muted-foreground text-sm', $props);
}

function renderCardAction($props = []) {
    return renderCardElement('card-action', 'col-start-2 row-span-2 row-start-1 self-start justify-self-end', $props);
}

function renderCardContent($props = []) {
    return renderCardElement('card-content', 'px-6', $props);
}

function renderCardFooter($props = []) {
    return renderCardElement('card-footer', 'flex items-center px-6 [.border-t]:pt-6', $props);
}

// Shared base renderer
function renderCardElement($slot, $baseClass, $props) {
    $class = $props['class'] ?? '';
    $content = $props['content'] ?? '';
    $tag = $props['tag'] ?? 'div';

    $attributes = "data-slot=\"$slot\" class=\"" . htmlspecialchars(trim("$baseClass $class"), ENT_QUOTES) . "\"";

    // Add any extra attributes
    $exclude = ['class', 'content', 'tag'];
    foreach ($props as $key => $value) {
        if (!in_array($key, $exclude)) {
            $escaped = htmlspecialchars($value, ENT_QUOTES);
            $attributes .= " $key=\"$escaped\"";
        }
    }

    return "<$tag $attributes>$content</$tag>";
}
