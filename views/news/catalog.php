<?php

echo $filter->setFilter([
    [
        'property' => 'content',
        'caption' => 'content',
        'values' => [
            'red',
            'blue',
            '1',
        ],
        'class' => 'horizontal'
    ],
]);

echo $filter->renderAjaxView($ajaxViewFile);