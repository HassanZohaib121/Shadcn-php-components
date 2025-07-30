<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/badge.php');
?>

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


</body>
</html>