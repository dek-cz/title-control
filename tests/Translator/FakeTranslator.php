<?php

declare(strict_types = 1);

namespace DekczTests\Translator;

use DekczTests\Unit\Test;
use Nette\Localization\ITranslator;

class FakeTranslator implements ITranslator
{

    public const ITEMONE = 'jedna';
    public const ITEMTWO = 'dve';

    public function translate($message, ...$parameters): string
    {
        $arr = [Test::ITEMONE => self::ITEMONE, Test::ITEMTWO => self::ITEMTWO];

        return $arr[$message];
    }

}
