<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($path_to_root)) {
    $path_to_root = "../";
}
include_once($path_to_root.'components/navbar.php');
?>
<head>
  <meta charset="UTF-8">
  <title>PHP Components</title>
  <link rel="stylesheet" href="<?php echo $path_to_root; ?>output.css">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class='mt-[2%] mb-[10%] bg-background text-foreground h-screen'>

 <?php include($path_to_root.'Navbar.php'); ?>