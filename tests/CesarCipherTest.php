<?php

namespace tests;

use src\CesarCipher;
use PHPUnit\Framework\TestCase;

final class CesarCipherTest extends TestCase
{
    /**
     * @param string $decrypted
     * @param string $encrypted
     * @return void
     * @dataProvider dataProvider
     */
    public function testEncrypt(string $decrypted, string $encrypted): void
    {
        $cypher = new CesarCipher();

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
        $cypher = new CesarCipher();

        $result = $cypher->decrypt($encrypted);

        $this->assertEquals($decrypted, $result);
    }

    public function dataProvider(): array
    {
        return [
            [
                'decrypted' => 'zza',
                'encrypted' => 'dde',
            ],
            [
                'decrypted' => 'f',
                'encrypted' => 'j',
            ],
            [
                'decrypted' => 'abcdefghijklmnoprstuvwxyz',
                'encrypted' => 'efghijklmnoprstuvwxyzabcd',
            ],
        ];
    }
}
