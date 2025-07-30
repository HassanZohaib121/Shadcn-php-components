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
