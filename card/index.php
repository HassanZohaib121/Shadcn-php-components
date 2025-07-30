<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/button.php');
include_once($path_to_root.'components/card.php');
include_once($path_to_root.'components/input.php');
include_once($path_to_root.'components/label.php');
?>

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

</body>
</html>