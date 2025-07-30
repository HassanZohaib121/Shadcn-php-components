<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/button.php');
include_once($path_to_root.'components/newDialog.php');

    echo renderDialog([
        'onclick' => 'alert(\'Item deleted\')',
        'title' => 'Dialog Title',
        'description' => 'Dialog Description',
        'content' => '<p>Dialog Content</p>',
        'confirmButton' => 'Confirm',
        'cancelButton' => 'Cancel'
    ]);
?>

    <!-- New Dialog -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">New Dialog </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <?php             
                echo renderDialogTrigger([
                    'label' => 'Open Dialog',
                    'variant' => 'default',
                    'size' => 'default',
                    'class' => 'text-gray-700 hover:bg-blue-500 transition px-4 py-2',
                ]);            
            ?>
        </div>
    </div>  

    <h2 class="text-lg font-bold text-center mt-8">New Dialog Code</h2>
    <div class="p-4 border bg-gray-200 rounded-lg">
        <?php
            $code = <<<'CODE'
            <?php
                function renderDialogTrigger($args = []) {
                    $label = $args['label'] ?? '';
                    $variant = $args['variant'] ?? 'default';
                    $size = $args['size'] ?? 'default';
                    $buttonClass = $args['class'] ?? '';

                    return renderButton([
                                'variant' => $variant,
                                'size' => $size,
                                'content' => $label,
                                'onclick' => 'openDialog()',
                                'class' => $buttonClass,
                            ]);
                }

                function renderDialog($args = []) {
                    $onclick = $args['onclick'] ?? '';
                    $title = $args['title'] ?? '';
                    $description = $args['description'] ?? '';
                    $content = $args['content'] ?? '';
                    $confirmButton = $args['confirmButton'] ?? '';
                    $cancelButton = $args['cancelButton'] ?? '';

                    return <<<HTML
                        <div id="dialog-overlay"
                            class="hidden fixed inset-0 z-40 bg-black/50 animate-fade-in"
                            onclick="closeDialog()">
                        </div>

                        <!-- Dialog Content -->
                        <div id="dialog"
                            class="hidden fixed top-1/2 left-1/2 z-50 w-full max-w-lg -translate-x-1/2 -translate-y-1/2 rounded-lg border bg-white p-6 shadow-lg transition-all animate-zoom-in">
                        
                        <!-- Close Button -->
                        <button onclick="closeDialog()"
                                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                            &times;
                            <span class="sr-only">Close</span>
                        </button>

                        <!-- Dialog Header -->
                        <div class="mb-4 text-center sm:text-left">
                            <h2 class="text-lg font-semibold">$title</h2>
                            <p class="text-sm text-gray-500">$description</p>
                        </div>

                        <!-- Dialog Body -->
                        <div class="text-sm text-gray-700">
                            $content
                        </div>

                        <!-- Dialog Footer -->
                        <div class="mt-6 flex flex-col-reverse gap-2 sm:flex-row sm:justify-end">
                            <button onclick="closeDialog()" class="px-4 py-2 bg-gray-100 rounded hover:bg-gray-200 text-sm">$cancelButton</button>
                            <button onclick="$onclick" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">$confirmButton</button>
                        </div>
                        </div>

                        <!-- Dialog Scripts & Animations -->
                        <script>
                            function openDialog() {
                                document.getElementById('dialog').classList.remove('hidden');
                                document.getElementById('dialog-overlay').classList.remove('hidden');
                            }
                            function closeDialog() {
                                document.getElementById('dialog').classList.add('hidden');
                                document.getElementById('dialog-overlay').classList.add('hidden');
                            }
                            const style = document.createElement('style');        
                        </script>
                        HTML;
                }

                // Example Usage
                    echo renderDialog([
                        'onclick' => 'alert(\'Item deleted\')',
                        'title' => 'Dialog Title',
                        'description' => 'Dialog Description',
                        'content' => '<p>Dialog Content</p>',
                        'confirmButton' => 'Confirm',
                        'cancelButton' => 'Cancel'
                    ]);

                    echo renderDialogTrigger([
                        'label' => 'Open Dialog',
                        'variant' => 'default',
                        'size' => 'default',
                        'class' => 'text-gray-700 hover:bg-blue-500 transition px-4 py-2',
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