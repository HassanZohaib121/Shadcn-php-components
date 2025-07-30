<?php
function renderToaster($props = []) {
    $class = $props['class'] ?? 'fixed bottom-4 right-4 flex flex-col gap-2 z-50 shadow-xl';

    // Define CSS variables for styling
    $styleVars = [
        '--normal-bg' => 'white',
        '--normal-text' => '#111827',
        '--normal-border' => '#e5e7eb',
    ];

    if (isset($props['style']) && is_array($props['style'])) {
        $styleVars = array_merge($styleVars, $props['style']);
    }

    $styleString = '';
    foreach ($styleVars as $key => $value) {
        $styleString .= "$key: $value; ";
    }

    // Output the container and script
    return <<<HTML
        <div id="toaster" class="$class" style="$styleString"></div>

        <script>
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `
            px-4 py-2 rounded border shadow transition
            bg-[var(--normal-bg)] text-[var(--normal-text)] border-[var(--normal-border)]
            animate-fade-in
            `;
            toast.textContent = message;

            const container = document.getElementById('toaster');
            if (container) {
            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 3000);
            }
        }

        // Add basic fade-in keyframe
        const styleTag = document.createElement('style');
        styleTag.innerHTML = `
            @keyframes fade-in {
            from { opacity: 0; transform: translateY(0.25rem); }
            to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in {
            animation: fade-in 0.3s ease-out;
            }
        `;
        document.head.appendChild(styleTag);
        </script>
    HTML;
}
