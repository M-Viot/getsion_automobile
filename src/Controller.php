<?php

namespace Mviot\GetsionAutomobile;

class Controller
{
    protected function render($view, $data = []): void
    {
        extract($data);

        include "Views/base.php";
    }
}
