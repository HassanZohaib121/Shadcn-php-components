<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include_once($path_to_root.'components/label.php');
?>

    <!-- Label -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">Label </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <?php
                echo renderLabel([
                    'for' => 'email',
                    'content' => 'Email'
                ]);
            ?>
        </div>
    </div>

    <h2 class="text-lg font-bold text-center mt-8">Label Code</h2>
    <div class="p-4 border bg-gray-200 rounded-lg">
        <?php
            $code = <<<'CODE'
            <?php
                function renderLabel($props = []) {
                    $for = htmlspecialchars($props['for'] ?? '');
                    $content = htmlspecialchars($props['content'] ?? '');
                    $class = htmlspecialchars($props['class'] ?? '');
                    
                    $baseClass = "flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50";

                    return "<label for=\"$for\" class=\"$baseClass $class\" data-slot=\"label\">$content</label>";
                }

                // Example Usage
                echo renderLabel([
                    'for' => 'email',
                    'content' => 'Email'
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