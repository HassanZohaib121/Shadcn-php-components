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

</body>
</html>