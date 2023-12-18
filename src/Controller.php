<?php

namespace Mviot\GetsionAutomobile;

class Controller
{
    /**
     * @param $view
     * @param $data
     * @return void
     */
    protected function render($view, $data = []): void
    {
        extract($data);

        include "Views/base.php";
    }
}
