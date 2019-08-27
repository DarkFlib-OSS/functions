<?php

echo 'start';

print_r(stat('/tmp/.lock'));

sleep(1);

echo "\n\n";
print_r(stat('/tmp/.lock'));

echo 'end';

?>
