<?php

return array(

    'default' => 'sqlite',

    'connections' => array(

        'sqlite' => array(
            'driver'   => 'sqlite',
            'database' => __DIR__.'/../database/app.sqlite',
            'prefix'   => '',
        )
    )
);
