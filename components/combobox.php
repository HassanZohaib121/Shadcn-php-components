<?php
function renderCombobox($args = []) {
    $label = $args['label'] ?? 'Select an option';
    $options = $args['options'] ?? [];
    $c = $args['class'] ?? '';
    $class = htmlspecialchars($c, ENT_QUOTES);


    $jsOptions = !empty($options)
        ? json_encode(array_map(fn($o) => ['value' => $o['value'], 'label' => $o['label']], $options))
        : null;

           $xData = $jsOptions
            ? "{
                open: false,
                selected: '',
                search: '',
                options: $jsOptions,
                get filtered() {
                    return this.options.filter(o =>
                        o.label.toLowerCase().includes(this.search.toLowerCase())
                    );
                }
            }"
            : "{
                open: false,
                selected: '',
                search: '',
                options: [
                    { value: 'next.js', label: 'Next.js' },
                    { value: 'sveltekit', label: 'SvelteKit' },
                    { value: 'nuxt.js', label: 'Nuxt.js' },
                    { value: 'remix', label: 'Remix' },
                    { value: 'astro', label: 'Astro' }
                ],
                get filtered() {
                    return this.options.filter(o =>
                        o.label.toLowerCase().includes(this.search.toLowerCase())
                    );
                }
    }";

    $xDataEscaped = htmlspecialchars($xData, ENT_QUOTES);

    return <<<HTML
        <div  x-data="{$xDataEscaped}" class="{$class}">

            
            <!-- Trigger Button -->
            <button
                @click="open = !open"
                class="flex w-full items-center justify-between rounded border px-4 py-2 text-left shadow-sm bg-white hover:bg-gray-50"
                :aria-expanded="open"
            >
                <span x-text="selected || '$label'"></span>
                <svg class="ml-2 h-4 w-4 opacity-50" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div x-show="open" @click.outside="open = false" x-transition
                class="absolute z-10 mt-2 w-full rounded-md border bg-white shadow-lg">
                <!-- Search -->
                <input type="text" placeholder="Search..." x-model="search"
                    class="w-full px-3 py-2 border-b focus:outline-none">

                <ul class="max-h-60 overflow-y-auto">
                    <template x-for="opt in filtered" :key="opt.value">
                        <li @click="selected = opt.label; open = false"
                            class="cursor-pointer px-4 py-2 hover:bg-gray-100"
                            x-text="opt.label"></li>
                    </template>
                    <li x-show="filtered.length === 0" class="px-4 py-2 text-gray-400">No match found.</li>
                </ul>
            </div>
        </div>
    HTML;
}
?>
