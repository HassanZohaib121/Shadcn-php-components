<?php
$path_to_root = "../";
include($path_to_root.'includes/head.php');
include($path_to_root.'components/button.php');
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

    <!-- New Dialog -->
    <div class="flex flex-col justify-center items-center align-middle gap-3 mb-5">
        <h2 class="text-lg font-bold ">New Dialog </h2>
        <div class="flex flex-row justify-center items-center gap-3">
            <?php             
                echo renderDialogTrigger([
                    'label' => 'Open Dialog',
                    'variant' => 'default',
                    'size' => 'default',
                    'class' => 'text-gray-700 hover:bg-blue-500 transition px-4 py-2',
                ]);            
            ?>
        </div>
    </div>  

</body>
</html>