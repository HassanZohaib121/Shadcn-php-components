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
