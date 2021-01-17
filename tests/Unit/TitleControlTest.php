<?php

declare(strict_types=1);

namespace Tests\Unit;

use Vrestihnat\TitleControl\TitleControl;

class TitleControlTest extends Test
{

  const TITLETEST = 'MyTitle';

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

}
