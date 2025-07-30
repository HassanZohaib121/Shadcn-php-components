<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include_once($path_to_root.'components/input.php');
include_once($path_to_root.'components/label.php');
?>

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

</body>
</html>