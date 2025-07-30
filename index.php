<?php
include 'head.php';
include 'components/button.php';
include_once 'components/badge.php';
include_once 'components/card.php';
include_once 'components/input.php';
include_once 'components/label.php';
include_once 'components/dialog.php';
include_once 'components/navbar.php';
include_once 'components/nav.php';
include_once 'components/toaster.php';
?>

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
                'onclick' => 'sayHello()',
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

<!-- Card -->
<div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
    <h2 class="text-lg font-bold ">Card </h2>

    <?php
        echo renderCard([
            'class' => 'w-full max-w-sm',
            'content' =>
            renderCardHeader([
                'content' =>
                    renderCardTitle(['content' => 'Login to your account']) .
                    renderCardDescription(['content' => 'Enter your email below to login to your account']) .
                    renderCardAction([
                        'content' => renderButton([
                            'variant' => 'link',
                            'content' => 'Sign Up',
                        ])
                    ])
            ]) .
            renderCardContent([
                'content' =>
                    '<form>' .
                    '<div class="flex flex-col gap-6">' .

                        // Email
                        '<div class="grid gap-2">' .
                            renderLabel(['for' => 'email', 'content' => 'Email']) .
                            renderInput([
                                'id' => 'email',
                                'type' => 'email',
                                'placeholder' => 'm@example.com',
                                'required' => true
                            ]) .
                        '</div>' .

                        // Password
                        '<div class="grid gap-2">' .
                            '<div class="flex items-center">' .
                                renderLabel(['for' => 'password', 'content' => 'Password']) .
                                '<a href="#" class="ml-auto inline-block text-sm underline-offset-4 hover:underline">Forgot your password?</a>' .
                            '</div>' .
                            renderInput([
                                'id' => 'password',
                                'type' => 'password',
                                'placeholder' => 'Password',
                                'required' => true
                            ]) .
                        '</div>' .

                    '</div>' .
                    '</form>'
            ]) .
            renderCardFooter([
                'class' => 'flex-col gap-2',
                'content' =>
                    renderButton([
                        'type' => 'submit',
                        'content' => 'Login',
                        'class' => 'w-full'
                    ]) .
                    renderButton([
                        'variant' => 'outline',
                        'content' => 'Login with Google',
                        'class' => 'w-full'
                    ])
            ])
        ]);
    ?>
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

<!-- Navigation Menu -->
<div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
    <h2 class="text-lg font-bold ">Navigation Menu </h2>
    <div class="flex flex-row justify-center items-center gap-3">
        <?php
            echo renderNavMenu([
                ['label' => 'Home', 'href' => '/', 'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2'],
                ['label' => 'About', 'href' => '/about', 'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2'],
                [
                    'label' => 'Services',
                    'href' => '',
                    'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2 relative group cursor-pointer',
                    'submenu' => [
                        ['label' => 'Web Development', 'href' => '/services/web', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                        ['label' => 'SEO', 'href' => '/services/seo', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                    ],
                    'submenuClass' => 'absolute left-0 mt-2 hidden group-hover:block bg-white shadow-lg rounded-md z-50 min-w-[180px]'
                ],
                ['label' => 'Contact', 'href' => '/contact', 'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2'],
            ], 'flex items-center space-x-4 bg-white p-4 rounded-lg shadow-md');
        ?>
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


</body>
</html>
