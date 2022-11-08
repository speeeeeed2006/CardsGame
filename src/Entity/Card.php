<?php
declare(strict_types=1);

namespace App\Entity;

class Card
{
    private CardValues $Value;

    private Colors $Color;

    public function getValue(): CardValues
    {
        return $this->Value;
    }

    public function setValue(CardValues $Value): self
    {
        $this->Value = $Value;

        return $this;
    }

    public function getColor(): ?Colors
    {
        return $this->Color;
    }

    public function setColor(Colors $Color): self
    {
        $this->Color = $Color;

        return $this;
    }
}
