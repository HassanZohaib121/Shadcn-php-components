<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/button.php');
include_once($path_to_root.'components/card.php');
include_once($path_to_root.'components/input.php');
include_once($path_to_root.'components/combobox.php');
?>

    <!-- Combobox -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">Combobox </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <?php
                echo renderCombobox([
                    'label' => 'Select framework',
                    'class' => 'relative w-52 text-green-600',
                    'options' => [
                        ['value' => 'next.js', 'label' => 'Next.js'],
                        ['value' => 'sveltekit', 'label' => 'SvelteKit'],
                        ['value' => 'nuxt.js', 'label' => 'Nuxt.js'],
                        ['value' => 'remix', 'label' => 'Remix'],
                        ['value' => 'astro', 'label' => 'Astro'],
                    ]
                ]);
                echo renderCombobox([
                    'label' => 'Select framework',
                    'class' => 'relative w-52 text-red-500',
                    'options' => [
                        ['value' => 'next.js', 'label' => 'Next.js'],
                        ['value' => 'sveltekit', 'label' => 'SvelteKit'],
                        ['value' => 'nuxt.js', 'label' => 'Nuxt.js'],
                        ['value' => 'remix', 'label' => 'Remix'],
                        ['value' => 'astro', 'label' => 'Astro'],
                    ]
                ]);
            ?>
        </div>
    </div>

    <h2 class="text-lg font-bold text-center mt-8">Combobox Code</h2>
    <div class="p-4 border bg-gray-200 rounded-lg mx-[10%] mt-[2%] mb-[10%]">
        <?php
            $code = <<<'CODE'
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

                
                // Example Usage
              echo renderCombobox([
                    'label' => 'Select framework',
                    'class' => 'relative w-52 text-green-600',
                    'options' => [
                        ['value' => 'next.js', 'label' => 'Next.js'],
                        ['value' => 'sveltekit', 'label' => 'SvelteKit'],
                        ['value' => 'nuxt.js', 'label' => 'Nuxt.js'],
                        ['value' => 'remix', 'label' => 'Remix'],
                        ['value' => 'astro', 'label' => 'Astro'],
                    ]
                ]);
            ?>
            CODE;
        ?>

        <div class="relative">
            <button 
                id="copy-btn" 
                onclick="copyCode()" 
                class="absolute cursor-pointer top-2 right-2 p-2 text-sm text-black border border-black hover:bg-gray-700 hover:text-white rounded-md transition"
                >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy-icon lucide-copy"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
            </button>
            <pre class="overflow-x-auto text-sm text-gray-800 font-mono whitespace-pre-wrap">
                <code id="code-block">
                    <?php echo htmlspecialchars($code); ?>
                </code>
            </pre>
        </div>
    </div>
    <?php include($path_to_root.'footer.php'); ?>

    <script>
        function copyCode() {
            const code = document.getElementById('code-block').innerText;
            navigator.clipboard.writeText(code).then(() => {
            const btn = document.getElementById('copy-btn');

            const checkIcon = `
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                stroke-linejoin="round" class="lucide lucide-check">
                <path d="M20 6 9 17l-5-5"/>
                </svg>`;
            
            const copyIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy-icon lucide-copy"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>`;

            btn.innerHTML = checkIcon;

            setTimeout(() => {
                btn.innerHTML = copyIcon;
            }, 1500);
            });
        }
    </script>

</body>
</html>