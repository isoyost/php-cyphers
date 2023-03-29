<?php

namespace src;

use src\Contract\CiphersContract;

class CesarCipher implements CiphersContract
{
    /**
     * @var array<string>
     */
    protected array $alphabet = [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
        'g',
        'h',
        'i',
        'j',
        'k',
        'l',
        'm',
        'n',
        'o',
        'p',
        'r',
        's',
        't',
        'u',
        'v',
        'w',
        'x',
        'y',
        'z',
    ];
    protected int $alphabetSize;
    protected int $offset;

    public function __construct(int $offset = 4)
    {
        $this->offset = $offset;
        $this->alphabetSize = sizeof($this->alphabet);
    }

    public function encrypt(string $input): string
    {
        return $this->shiftStringBy($input, $this->offset);
    }

    public function decrypt(string $input): string
    {
        return $this->shiftStringBy($input, $this->offset * -1);
    }

    private function shiftStringBy(string $input, int $offset): string
    {
        $result = '';
        foreach (str_split(strtolower($input)) as $char) {
            $number = array_search($char, $this->alphabet);
            $result .= $this->getLetterByNumber($number + $offset);
        }

        return $result;
    }

    private function getLetterByNumber(int $number): string
    {
        while ($number >= $this->alphabetSize) {
            $number -= $this->alphabetSize;
        }

        while ($number < 0) {
            $number += $this->alphabetSize;
        }

        return $this->alphabet[$number];
    }
}
