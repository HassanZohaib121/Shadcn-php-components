<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include_once($path_to_root.'components/input.php');
include_once($path_to_root.'components/label.php');
?>

    <!-- Input -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">Input </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <?php
                echo renderInput([
                    'id' => 'email',
                    'type' => 'email',
                    'placeholder' => 'm@example.com',
                    'required' => true
                ]);
            ?>
        </div>
    </div>

        <h2 class="text-lg font-bold text-center mt-8">Label Code</h2>
    <div class="p-4 border bg-gray-200 rounded-lg">
        <?php
            $code = <<<'CODE'
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

                // Example Usage
                echo renderInput([
                    'id' => 'email',
                    'type' => 'email',
                    'placeholder' => 'm@example.com',
                    'required' => true
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