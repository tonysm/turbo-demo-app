<?php

use function Tonysm\TurboLaravel\dom_id as turbo_laravel_dom_id;

function dom_id(...$args)
{
    return turbo_laravel_dom_id(...$args);
}
