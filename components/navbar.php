<?php
function renderNavMenu($items = [], $class = '') {
  $html = '<nav class="relative z-10 ' . $class . '">
    <ul class="flex flex-wrap items-center space-x-4 bg-white px-6 py-3 rounded-lg shadow-md">';

  foreach ($items as $item) {
    $label = htmlspecialchars($item['label']);
    $href = htmlspecialchars($item['href']);
    $submenu = $item['submenu'] ?? [];

    $hasSubmenu = !empty($submenu);
    $menuClasses = 'inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition ';

    $html .= '<li class="relative group">';
    $html .= '<div class="relative z-20">'; // Wrap main link in a container

    $html .= '<a href="' . $href . '" class="' . $menuClasses . '">' . $label;

    if ($hasSubmenu) {
      $html .= ' <svg class="ml-1 h-4 w-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>';
    }

    $html .= '</a></div>';

    if ($hasSubmenu) {
      // Invisible padding container helps cursor travel without losing hover state
      $html .= '
      <div class="absolute left-0 top-full pt-2 z-10 invisible"
            onmouseenter="this.classList.add(\'visible\', \'opacity-100\')"
             onmouseleave="this.classList.remove(\'visible\', \'opacity-100\')"
      >
        <ul class="group-hover:visible group-hover:opacity-100 transition-all duration-200 ease-in-out bg-white shadow-lg w-44 z-50">';

      foreach ($submenu as $sub) {
        $subLabel = htmlspecialchars($sub['label']);
        $subHref = htmlspecialchars($sub['href']);
        $html .= '<li><a href="' . $subHref . '" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">' . $subLabel . '</a></li>';
      }

      $html .= '</ul></div>';
    }

    $html .= '</li>';
  }

  $html .= '</ul></nav>';
  return $html;
}
