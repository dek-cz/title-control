<?php

declare(strict_types = 1);

namespace Dekcz\TitleControl;

interface ITitleControlFactory
{

    public function create(): TitleControl;

}
