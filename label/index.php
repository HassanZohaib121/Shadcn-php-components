<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include_once($path_to_root.'components/label.php');
?>

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

</body>
</html>