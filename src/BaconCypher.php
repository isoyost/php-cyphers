<?php

namespace src;

use src\Contract\CiphersContract;

class BaconCypher implements CiphersContract
{
    /**
     * @var array<string, string>
     */
    protected array $alphabet = [
        'A' => 'aaaaa',
        'B' => 'aaaab',
        'C' => 'aaaba',
        'D' => 'aaabb',
        'E' => 'aabaa',
        'F' => 'aabab',
        'G' => 'aabba',
        'H' => 'aabbb',
        'I' => 'abaaa',
        'J' => 'abaaa',
        'K' => 'abaab',
        'L' => 'ababa',
        'M' => 'ababb',
        'N' => 'abbaa',
        'O' => 'abbab',
        'P' => 'abbba',
        'Q' => 'abbbb',
        'R' => 'baaaa',
        'S' => 'baaab',
        'T' => 'baaba',
        'U' => 'baabb',
        'V' => 'baabb',
        'W' => 'babaa',
        'X' => 'babab',
        'Y' => 'babba',
        'Z' => 'babbb',
    ];

    public function encrypt(string $input): string
    {
        $result = '';
        foreach (str_split(strtoupper($input)) as $char) {
            $result .= $this->alphabet[$char];
        }

        return $result;
    }

    public function decrypt(string $input): string
    {
        $wordSize = 5;
        $countOfWords = strlen($input) / $wordSize;
        $result = '';
        for ($wordIndex = 0; $wordIndex < $countOfWords; $wordIndex++) {
            $word = '';
            for ($charIndex = 0; $charIndex < $wordSize; $charIndex++) {
                $word .= $input[$wordIndex * $wordSize + $charIndex];
                echo $word;
                echo '<br>';
            }
            $result .= array_search($word, $this->alphabet);
        }

        return $result;
    }
}
