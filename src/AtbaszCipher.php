<?php

namespace src;

use src\Contract\CiphersContract;

class AtbaszCipher implements CiphersContract
{
    /**
     * @var array<string>
     */
    protected array $alphabet = [
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',
        'I',
        'J',
        'K',
        'L',
        'M',
        'N',
        'O',
        'P',
        'Q',
        'R',
        'S',
        'T',
        'U',
        'V',
        'W',
        'X',
        'Y',
        'Z',
    ];
    protected int $alphabetSize;

    public function __construct()
    {
        $this->alphabetSize = sizeof($this->alphabet);
    }

    public function encrypt(string $input): string
    {
        $result = '';
        foreach (str_split(strtoupper($input)) as $char) {
            $charNumber = array_search($char, $this->alphabet);
            $result .= $this->alphabet[$this->alphabetSize - $charNumber - 1];
        }

        return $result;
    }

    public function decrypt(string $input): string
    {
        return $this->encrypt($input);
    }
}
