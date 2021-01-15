<?php
declare(strict_types = 1);

namespace Vrestihnat\TitleControl;

interface ITitleControlFactory
{

    public function create(): TitleControl;

}
