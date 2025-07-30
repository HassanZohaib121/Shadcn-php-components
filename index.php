<?php
    if (!isset($path_to_root)) {
        $path_to_root = "";
    }
    include($path_to_root.'includes/head.php');
    include($path_to_root.'components/button.php');
    include_once($path_to_root.'components/badge.php');
    include_once($path_to_root.'components/input.php');
    include_once($path_to_root.'components/label.php');
    include_once($path_to_root.'components/navbar.php');
    // include_once($path_to_root.'components/nav.php');
    include_once($path_to_root.'components/toaster.php');    
    include_once($path_to_root.'components/combobox.php');

    // include_once($path_to_root.'components/dialog.php');
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

<!-- Navigation Menu -->
<div class="flex flex-col justify-center items-center align-middle gap-3 mb-6 -mt-3">
    <!-- <h2 class="text-lg font-bold ">Navigation Menu </h2> -->
    <div class="flex flex-row justify-center items-center gap-3">
        <?php
            // echo renderNavMenu([
            //     ['label' => 'Home', 'href' => '/', 'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2'],
            //     ['label' => 'Card', 'href' =>  $path_to_root.'card', 'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2'],
            //     [
            //         'label' => 'Components',
            //         'href' => '',
            //         'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2 relative group cursor-pointer',
            //         'submenu' => [
            //             ['label' => 'Catd', 'href' => $path_to_root.'card', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
            //             ['label' => 'Button', 'href' => $path_to_root.'button', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
            //             ['label' => 'Badge', 'href' => $path_to_root.'badge', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
            //             ['label' => 'Input', 'href' => $path_to_root.'input', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
            //             ['label' => 'Label', 'href' => $path_to_root.'label', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
            //             ['label' => 'Dialog', 'href' => $path_to_root.'dialog', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
            //             ['label' => 'New Dialog', 'href' => $path_to_root.'new-dialog', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
            //         ],
            //         'submenuClass' => 'absolute left-0 mt-2 hidden group-hover:block bg-white shadow-lg rounded-md z-50 min-w-[180px]'
            //     ],
            //     ['label' => 'Contact', 'href' => '/contact', 'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2'],
            // ], 'flex items-center space-x-4 bg-white p-4 rounded-lg shadow-md');
        ?>
</div>

    <h1 class="text-3xl font-bold text-center mb-5">Shadcn PHP Components</h1>


    <!-- Button -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">Reusable Button </h2>
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

    <!-- New Dialog -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">New Dialog </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <?php             
                echo renderDialogTrigger([
                    'label' => 'Open Dialog',
                    'variant' => 'default',
                    'size' => 'default',
                    'class' => 'text-gray-700 hover:bg-white transition px-4 py-2',
                ]);            
            ?>
        </div>
    </div>    

    <!-- Toaster -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">Toaster </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <?php
                echo renderToaster([
                    // 'class' => 'fixed bottom-4 right-4 flex flex-col gap-2 z-50',
                    // 'style' => [
                    //     '--normal-bg' => 'red',
                    //     '--normal-text' => 'white',
                    //     '--normal-border' => '#e5e7eb',
                    // ],
                    'style' => [
                        '--normal-bg' => 'green',
                        '--normal-text' => 'white',
                        '--normal-border' => '#e5e7eb',
                    ],
                ]);
                echo renderButton([
                    'variant' => 'default',
                    'size' => 'default',
                    'content' => 'Show Toast',
                    'onclick' => 'showToast("Hello World!", "info")',
                    'id' => 'myButton',
                    'class' => '',
                ]); 
            ?>
        </div>
    </div>

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
