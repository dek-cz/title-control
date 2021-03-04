<?php

namespace DekczTests\Translator;

use Nette\Localization\ITranslator;
use DekczTests\Unit\Test;

class FakeTranslator implements ITranslator
{

  const ITEMONE = 'jedna';
  const ITEMTWO = 'dve';

  function translate($message, ...$parameters): string
  {
    $arr = [Test::ITEMONE => self::ITEMONE, Test::ITEMTWO => self::ITEMTWO,];

    return $arr[$message];
  }

}
