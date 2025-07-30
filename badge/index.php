<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/badge.php');
?>

    <!-- Badge -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">Badge </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <?php
            echo renderBadge([
                'variant' => 'default',
                'content' => 'Default Badge',
            ]);

            echo renderBadge([
                'variant' => 'secondary',
                'content' => 'Secondary',
                'class' => 'ml-2'
            ]);

            echo renderBadge([
                'variant' => 'destructive',
                'content' => 'Warning!',
                'class' => 'ml-2'
            ]);

            echo renderBadge([
                'variant' => 'outline',
                'content' => 'Outline Style',
                'class' => 'ml-2'
            ]);
            ?>
        </div>
    </div>

    <h2 class="text-lg font-bold text-center mt-8">Badge Code</h2>
    <div class="p-4 border bg-gray-200 rounded-lg mx-[10%] mt-[2%] mb-[10%]">
        <?php
            $code = <<<'CODE'
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

                
            // Example Usage
             echo renderBadge([
                'variant' => 'default',
                'content' => 'Default Badge',
            ]);

            echo renderBadge([
                'variant' => 'secondary',
                'content' => 'Secondary',
                'class' => 'ml-2'
            ]);

            echo renderBadge([
                'variant' => 'destructive',
                'content' => 'Warning!',
                'class' => 'ml-2'
            ]);

            echo renderBadge([
                'variant' => 'outline',
                'content' => 'Outline Style',
                'class' => 'ml-2'
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