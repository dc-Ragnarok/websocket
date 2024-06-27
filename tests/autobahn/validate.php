<?php

if (!file_exists('./reports/ab/index.json')) {
    echo 'Report not found', PHP_EOL;
    exit(1);
}

$result = json_decode(
    file_get_contents('./reports/ab/index.json'),
    true
);

$exitCode = 0;

foreach ($result as $agent => $cases) {
    foreach ($cases as $case => $result) {
        if ($result['behavior'] === 'FAILED') {
            $exitCode = 1;
        }
        echo $agent . ' ' . $case . ': ' . $result['behavior'], PHP_EOL;
    }
}

exit($exitCode);
