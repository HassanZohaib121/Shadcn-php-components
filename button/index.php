
<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/button.php');
?>

<!-- Button -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">Button </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <?php
                echo renderButton([
                    'variant' => 'default',
                    'size' => 'default',
                    'content' => 'Click Me',
                    'onclick' => 'alert("Hello from the button!")',
                    'id' => 'myButton',
                    'class' => '',
                ]);    

                echo renderButton([
                    'variant' => 'secondary',
                    'content' => 'Secondary',
                ]);

                echo renderButton([
                    'variant' => 'destructive',
                    'content' => 'Destructive',
                ]);

                echo renderButton([
                    'variant' => 'outline',
                    'content' => 'Outline',
                ]);

                echo renderButton([
                    'variant' => 'ghost',
                    'content' => 'Ghost',
                ]);

                echo renderButton([
                    'variant' => 'link',
                    'content' => 'Link',
                    'onclick' => 'alert("Link Button")'
                ]);
            ?>
        </div>
    </div>

    <h2 class="text-lg font-bold text-center mt-8">Button Code</h2>
    <div class="p-4 border bg-gray-200 rounded-lg mx-[10%] mt-[2%] mb-[10%]">
        <?php
            $code = <<<'CODE'
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

            // Usage Example
            echo renderButton([
                    'variant' => 'default',
                    'size' => 'default',
                    'content' => 'Click Me',
                    'onclick' => 'alert("Hello from the button!")',
                    'id' => 'myButton',
                    'class' => '',
                ]);    

                echo renderButton([
                    'variant' => 'secondary',
                    'content' => 'Secondary',
                ]);

                echo renderButton([
                    'variant' => 'destructive',
                    'content' => 'Destructive',
                ]);

                echo renderButton([
                    'variant' => 'outline',
                    'content' => 'Outline',
                ]);

                echo renderButton([
                    'variant' => 'ghost',
                    'content' => 'Ghost',
                ]);

                echo renderButton([
                    'variant' => 'link',
                    'content' => 'Link',
                    'onclick' => 'alert("Link Button")'
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