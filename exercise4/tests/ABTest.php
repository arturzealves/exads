<?php

use ArturZeAlves\AbTestHandler;

$handler = new AbTestHandler();

for ($i = 1; $i <= 3; $i++) {
    $result = $handler->getData($i);

    echo sprintf(
        "Best converstion rate for the promotion %s with name '%s' with percentage of %s%%.\n",
        $handler->getPromotionName(),
        $result['designName'],
        $result['splitPercent']
    );
}
