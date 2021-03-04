<?php

declare(strict_types=1);

namespace Dekcz\TitleControl;

use Nette;
use Nette\Utils\Html;
use Nette\Localization\ITranslator;

class TitleControl extends Nette\Application\UI\Component
{

  private ?string $title = null;
  private array $items = [];
  private string $separator = ' | ';
  private ?ITranslator $translator = null;

  public function __construct(?ITranslator $translator = null)
  {
    $this->translator = $translator;
  }

  public function render(): void
  {
    if ($this->getTitle() !== null) {
      $title = $this->getTitle();
      if ($this->getTranslator() !== null) {
        $title = $this->translate($title);
      }
    } else if (count($this->getItems()) > 0) {
      $title = $this->getMultiTitle();
    }
    echo Html::el('title')->setText($title) . "\n";
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(?string $title)
  {
    $this->title = $title;
    return $this;
  }

  public function getItems(): array
  {
    return $this->items;
  }

  public function getSeparator(): string
  {
    return $this->separator;
  }

  public function setItems(array $items)
  {
    $this->items = $items;
    return $this;
  }

  public function setSeparator(string $separator)
  {
    $this->separator = $separator;
    return $this;
  }

  public function addItem(string $item)
  {
    array_push($this->items, $item);
    return $this;
  }

  public function removeItem($item)
  {
    array_unshift($this->items, $item);
  }

  public function getTranslator(): ?ITranslator
  {
    return $this->translator;
  }

  public function setTranslator(?ITranslator $translator)
  {
    $this->translator = $translator;
    return $this;
  }

  protected function translate(string $title)
  {
    return $this->getTranslator()->translate($title);
  }

  protected function translateMulti(array $items)
  {
    return call_user_func_array([$this->translator, 'translate'], $items);
  }

  protected function getMultiTitle(): string
  {
    $items = array_filter($this->getItems());
    $translator = $this->getTranslator();
    if ($translator !== null) {
      $items = array_map([$this, 'translate'], $items);
    }
    $res = implode($this->getSeparator(), $items);
    return $res;
  }

}
