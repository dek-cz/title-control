<?php

declare(strict_types = 1);

namespace Dekcz\TitleControl;

use Nette\Application\UI\Component;
use Nette\Localization\ITranslator;
use Nette\Utils\Html;

class TitleControl extends Component
{

    private ?string $title = null;

    /** @var array<string> $items */
    private array $items = [];
    private string $separator = ' | ';
    private ?ITranslator $translator = null;

    public function __construct(?ITranslator $translator = null)
    {
        $this->translator = $translator;
    }

    public function render(): void
    {
        $title = '';
        if ($this->getTitle() !== null) {
            $title = $this->getTitle();
            if ($this->getTranslator() !== null) {
                $title = $this->translate($title);
            }
        } elseif (count($this->getItems()) > 0) {
            $title = $this->getMultiTitle();
        }

        echo Html::el('title')->setText($title) . "\n";
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getSeparator(): string
    {
        return $this->separator;
    }

    /**
     * @param array<string> $items
     * @return self
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function setSeparator(string $separator): self
    {
        $this->separator = $separator;
        return $this;
    }

    public function addItem(string $item): self
    {
        array_push($this->items, $item);
        return $this;
    }

    public function removeItem(string $item): void
    {
        array_unshift($this->items, $item);
    }

    public function getTranslator(): ?ITranslator
    {
        return $this->translator;
    }

    public function setTranslator(?ITranslator $translator): self
    {
        $this->translator = $translator;
        return $this;
    }

    protected function translate(string $title): string
    {
        return $this->getTranslator() !== null ? $this->getTranslator()->translate($title) : $title;
    }

    protected function getMultiTitle(): string
    {
        $items = array_filter($this->getItems());
        $translator = $this->getTranslator();
        if ($translator !== null) {
            $items = array_map([$this, 'translate'], $items);
        }

        return implode($this->getSeparator(), $items);
    }

}
