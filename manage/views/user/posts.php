<h1><?= $title ?></h1>

<?php
    echo '<pre>';
//    print_r($posts);
    foreach ($posts as $p) {
        echo $p['id'] . "\n";
        echo $p['title'] . "\n";
        echo $p['description'] . "\n";
        echo $p['image'] . "\n";
        echo $p['status'] . "\n";
        echo $p['create_at'] . "\n";
        echo $p['update_at'] . "\n";
    }
    echo '</pre>';
?>
