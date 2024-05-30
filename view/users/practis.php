<?php

$total = 168;
$loops = 0; // To count the number of loops

echo "Initial value: $total\n <br>";

while ($loops < $total) {
    $new_loop = $loops + 28;
    $loops = $new_loop;
    echo $loops . "\n";
}

// echo "Total number of loops: $loops\n";

?>