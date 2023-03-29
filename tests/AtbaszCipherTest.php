<?php

namespace tests;

use src\AtbaszCipher;
use PHPUnit\Framework\TestCase;

final class AtbaszCipherTest extends TestCase
{
    /**
     * @param string $decrypted
     * @param string $encrypted
     * @return void
     * @dataProvider dataProvider
     */
    public function testEncrypt(string $decrypted, string $encrypted): void
    {
        $cypher = new AtbaszCipher();

        $result = $cypher->encrypt($decrypted);

        $this->assertEquals($encrypted, $result);
    }
    /**
     * @param string $decrypted
     * @param string $encrypted
     * @return void
     * @dataProvider dataProvider
     */
    public function testDecrypt(string $decrypted, string $encrypted): void
    {
        $cypher = new AtbaszCipher();

        $result = $cypher->decrypt($encrypted);

        $this->assertEquals($decrypted, $result);
    }

    public function dataProvider(): array
    {
        return [
            [
                'decrypted' => 'ABC',
                'encrypted' => 'ZYX',
            ],
            [
                'decrypted' => 'W',
                'encrypted' => 'D',
            ],
            [
                'decrypted' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                'encrypted' => 'ZYXWVUTSRQPONMLKJIHGFEDCBA',
            ],
        ];
    }
}
