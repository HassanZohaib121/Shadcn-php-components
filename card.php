<?php
include_once 'components/card.php';
include_once 'components/button.php';
include_once 'components/input.php';
?>

<div class="card-wrapper">
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
