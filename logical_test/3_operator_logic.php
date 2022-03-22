<?php

function bil_bulat_positif($bil_1, $bil_2) {
    echo floor($bil_1 / $bil_2);
}

bil_bulat_positif(6, 4);
echo "<br>";
bil_bulat_positif(4, 3);
echo "<br>";
bil_bulat_positif(8, 3);