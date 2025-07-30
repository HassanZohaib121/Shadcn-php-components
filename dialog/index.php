<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/button.php');
include_once($path_to_root.'components/dialog.php');
include_once($path_to_root.'components/navbar.php');
?>

    <!-- Dialog -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">Dialog </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <!-- Trigger Button -->
        <?php
            echo renderButton([
            'text' => 'Open Dialog',
            'variant' => 'default',
            'onclick' => 'openDialog_myDialog()',
            ]);
        ?>

        <!-- Render Dialog -->
        <?php
            echo renderDialog(
                'myDialog',
                'Confirm Action',
                'Are you sure you want to proceed?',
                '<p>This action cannot be undone.</p>',
                renderButton([
                    'text' => 'Cancel',
                    'variant' => 'secondary',
                    'onclick' => 'closeDialog_myDialog()',
                ]) .
                renderButton([
                    'text' => 'Confirm',
                    'variant' => 'danger',
                    'onclick' => 'alert(\'Action confirmed.\'); closeDialog_myDialog()',
                    'class' => 'ml-2'
                ])
            );
        ?>
    </div>

    <h2 class="text-lg font-bold text-center mt-8">Dialog Code</h2>
    <div class="p-4 border bg-gray-200 rounded-lg mx-[10%] mt-[2%] mb-[10%]">
        <?php
            $code = <<<'CODE'
            <?php
                function renderDialog($id = "myDialog", $title = "", $description = "", $content = "", $footer = "", $class = '') {
                    return <<<HTML
                    <div>
                    <div id="$id" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50" data-slot="dialog-overlay">
                        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg relative" data-slot="dialog-content">
                        <button onclick="closeDialog_{$id}()" class="absolute top-4 right-4 text-gray-500 hover:text-black" data-slot="dialog-close">
                            &times;
                            <span class="sr-only">Close</span>
                        </button>
                        <div class="text-lg font-semibold mb-2" data-slot="dialog-title">$title</div>
                        <div class="text-sm text-gray-500 mb-4" data-slot="dialog-description">$description</div>
                        <div class="mb-4">
                            $content
                        </div>
                        <div class="flex justify-end gap-2" data-slot="dialog-footer">
                            $footer
                        </div>
                        </div>
                    </div>

                    <script>
                        function openDialog_{$id}() {
                        const dialog = document.getElementById("$id");
                        if (dialog) {
                            dialog.classList.remove("hidden");
                            dialog.classList.add("flex");
                        }
                        }

                        function closeDialog_{$id}() {
                        const dialog = document.getElementById("$id");
                        if (dialog) {
                            dialog.classList.add("hidden");
                            dialog.classList.remove("flex");
                        }
                        }
                    </script>
                    </div>
                    HTML;
                }    

                // Example Usage

                // Triger Button
                echo renderButton([
                    'text' => 'Open Dialog',
                    'variant' => 'default',
                    'onclick' => 'openDialog_myDialog()',
                ]);

                // Dialog
                 echo renderDialog(
                'myDialog',
                'Confirm Action',
                'Are you sure you want to proceed?',
                '<p>This action cannot be undone.</p>',
                renderButton([
                    'text' => 'Cancel',
                    'variant' => 'secondary',
                    'onclick' => 'closeDialog_myDialog()',
                ]) .
                renderButton([
                    'text' => 'Confirm',
                    'variant' => 'danger',
                    'onclick' => 'alert(\'Action confirmed.\'); closeDialog_myDialog()',
                    'class' => 'ml-2'
                ])
            );
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