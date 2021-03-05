<?php

declare(strict_types = 1);

namespace DekczTests\Unit;

use Dekcz\TitleControl\TitleControl;
use DekczTests\Translator\FakeTranslator;

class TitleControlTest extends Test
{

    protected function controlRender(TitleControl $control): string
    {
        ob_start();
        $control->render();
        return (string) ob_get_clean();
    }

    public function testAssertTitle(): void
    {
        $control = new TitleControl();
        $control->setTitle(self::TITLETEST);
        $this->assertSame($control->getTitle(), self::TITLETEST);
        $this->assertSame($this->controlRender($control), sprintf("<title>%s</title>\n", self::TITLETEST));
    }

    public function testAssertMultiTitle(): void
    {
        $control = new TitleControl();
        $control->setSeparator(self::SEPARATOR);
        $control->addItem(self::ITEMONE);
        $control->addItem(self::ITEMTWO);
        $this->assertSame($control->getSeparator(), self::SEPARATOR);
        $this->assertSame($this->controlRender($control), sprintf("<title>%s%s%s</title>\n", self::ITEMONE, self::SEPARATOR, self::ITEMTWO));
    }

    public function testAssertMultiTitleTranslate(): void
    {
        $control = new TitleControl(new FakeTranslator());
        $control->setSeparator(self::SEPARATOR);
        $control->addItem(self::ITEMONE);
        $control->addItem(self::ITEMTWO);
        $this->assertSame($control->getSeparator(), self::SEPARATOR);
        $this->assertSame($this->controlRender($control), sprintf("<title>%s%s%s</title>\n", FakeTranslator::ITEMONE, self::SEPARATOR, FakeTranslator::ITEMTWO));
    }

}
