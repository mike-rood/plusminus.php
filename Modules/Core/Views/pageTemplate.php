<?php
    
    $title = $settings->getSetting('title');
?>

<!doctype html>
<head>
    <title><?= $title ?></title>
</head>
<body>
    <?php 
        ${$controller}->{$action}();
    ?>
</body>

