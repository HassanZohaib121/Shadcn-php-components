<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/button.php');
include_once($path_to_root.'components/dialog.php');
include_once($path_to_root.'components/navbar.php');
?>

   

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

</body>
</html>