<?php

for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 && $i % 5 != 0) {
        echo $i . "Foo";
        echo "<br>";
    } elseif ($i % 5 == 0 && $i % 3 != 0) {
        echo $i . "Bar";
        echo "<br>";
    } elseif ($i % 3 == 0 && $i % 5 == 0) {
        echo $i . "FooBar";
        echo "<br>";
    }
}