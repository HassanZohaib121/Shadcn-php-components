<?php

// Function to render the main Navigation Menu component
function renderNavigationMenu($class = '', $hasViewport = true, $children = '') {
    $viewportValue = $hasViewport ? 'true' : 'false';

    return "
    <nav class='group/navigation-menu relative flex max-w-max flex-1 items-center justify-center $class' 
         data-slot='navigation-menu' 
         data-viewport='$viewportValue'>
        $children
        " . ($hasViewport ? renderNavigationMenuViewport() : '') . "
    </nav>
    ";
}


// Function to render the list of items in the navigation menu
function renderNavigationMenuList($class = '', $children = '') {
    return "
    <ul class='group flex flex-1 list-none items-center justify-center gap-1 $class' data-slot='navigation-menu-list'>
        $children
    </ul>
    ";
}

// Function to render each individual menu item
function renderNavigationMenuItem($class = '', $children = '') {
    return "
    <li class='relative $class' data-slot='navigation-menu-item'>
        $children
    </li>
    ";
}

// Function to render the trigger for the navigation menu
function renderNavigationMenuTrigger($class = '', $children = '') {
    return "
    <button class='group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground disabled:pointer-events-none disabled:opacity-50 data-[state=open]:hover:bg-accent data-[state=open]:text-accent-foreground data-[state=open]:focus:bg-accent data-[state=open]:bg-accent/50 focus-visible:ring-ring/50 outline-none transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 $class' data-slot='navigation-menu-trigger'>
        $children
        <svg class='relative top-[1px] ml-1 size-3 transition duration-300 group-data-[state=open]:rotate-180' aria-hidden='true'>
            <path d='M12 15l-4-4h8l-4 4z' />
        </svg>
    </button>
    ";
}

// Function to render the content of the navigation menu
function renderNavigationMenuContent($class = '', $children = '') {
    return "
    <div class='data-[motion^=from-]:animate-in data-[motion^=to-]:animate-out data-[motion^=from-]:fade-in data-[motion^=to-]:fade-out data-[motion=from-end]:slide-in-from-right-52 data-[motion=from-start]:slide-in-from-left-52 data-[motion=to-end]:slide-out-to-right-52 data-[motion=to-start]:slide-out-to-left-52 top-0 left-0 w-full p-2 pr-2.5 md:absolute md:w-auto $class' data-slot='navigation-menu-content'>
        $children
    </div>
    ";
}

// Function to render the viewport for the navigation menu (used for content display area)
function renderNavigationMenuViewport($class = '') {
    return "
    <div class='absolute top-full left-0 isolate z-50 flex justify-center'>
        <div class='origin-top-center bg-popover text-popover-foreground 
                    data-[state=open]:animate-in data-[state=closed]:animate-out 
                    data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-90 
                    relative mt-1.5 h-[var(--radix-navigation-menu-viewport-height)] 
                    w-full overflow-hidden rounded-md border shadow 
                    md:w-[var(--radix-navigation-menu-viewport-width)] $class'
             data-slot='navigation-menu-viewport'>
        </div>
    </div>
    ";
}


// Function to render a navigation link item inside the menu
function renderNavigationMenuLink($class = '', $href = '#', $children = '') {
    return "
    <a href='$href' class='data-[active=true]:focus:bg-accent data-[active=true]:hover:bg-accent data-[active=true]:bg-accent/50 data-[active=true]:text-accent-foreground hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus-visible:ring-ring/50 [&_svg:not([class*='text-'])]:text-muted-foreground flex flex-col gap-1 rounded-sm p-2 text-sm transition-all outline-none focus-visible:ring-[3px] focus-visible:outline-1 $class' data-slot='navigation-menu-link'>
        $children
    </a>
    ";
}

?>
