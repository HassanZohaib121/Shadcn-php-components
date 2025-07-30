
<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/button.php');
?>

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

</body>
</html>