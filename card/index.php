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
    
    <h2 class="text-lg font-bold text-center mt-8">Card Code</h2>
    <div class="p-4 border bg-gray-200 rounded-lg">
        <?php
            $code = <<<'CODE'
            <?php
                function renderCard($props = []) {
                    return renderCardElement('card', 'bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm', $props);
                }

                function renderCardHeader($props = []) {
                    return renderCardElement('card-header', '@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6', $props);
                }

                function renderCardTitle($props = []) {
                    return renderCardElement('card-title', 'leading-none font-semibold', $props);
                }

                function renderCardDescription($props = []) {
                    return renderCardElement('card-description', 'text-muted-foreground text-sm', $props);
                }

                function renderCardAction($props = []) {
                    return renderCardElement('card-action', 'col-start-2 row-span-2 row-start-1 self-start justify-self-end', $props);
                }

                function renderCardContent($props = []) {
                    return renderCardElement('card-content', 'px-6', $props);
                }

                function renderCardFooter($props = []) {
                    return renderCardElement('card-footer', 'flex items-center px-6 [.border-t]:pt-6', $props);
                }

                // Shared base renderer
                function renderCardElement($slot, $baseClass, $props) {
                    $class = $props['class'] ?? '';
                    $content = $props['content'] ?? '';
                    $tag = $props['tag'] ?? 'div';

                    $attributes = "data-slot=\"$slot\" class=\"" . htmlspecialchars(trim("$baseClass $class"), ENT_QUOTES) . "\"";

                    // Add any extra attributes
                    $exclude = ['class', 'content', 'tag'];
                    foreach ($props as $key => $value) {
                        if (!in_array($key, $exclude)) {
                            $escaped = htmlspecialchars($value, ENT_QUOTES);
                            $attributes .= " $key=\"$escaped\"";
                        }
                    }

                    return "<$tag $attributes>$content</$tag>";
                }        
                // Usge Example
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
                                    '<div class="grid gap-2">' .
                                        renderLabel(['for' => 'email', 'content' => 'Email']) .
                                        renderInput([
                                            'id' => 'email',
                                            'type' => 'email',
                                            'placeholder' => 'm@example.com',
                                            'required' => true
                                        ]) .
                                    '</div>' .

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