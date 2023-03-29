<?php

namespace tests;

use src\BaconCypher;
use PHPUnit\Framework\TestCase;

final class BaconCipherTest extends TestCase
{
    /**
     * @param string $decrypted
     * @param string $encrypted
     * @return void
     * @dataProvider dataProvider
     */
    public function testEncrypt(string $decrypted, string $encrypted): void
    {
        $cypher = new BaconCypher();

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
        $cypher = new BaconCypher();

        $result = $cypher->decrypt($encrypted);

        $this->assertEquals($decrypted, $result);
    }

    public function dataProvider(): array
    {
        return [
            [
                'decrypted' => 'ABC',
                'encrypted' => 'aaaaaaaaabaaaba',
            ],
            [
                'decrypted' => 'W',
                'encrypted' => 'babaa',
            ],
            [
                'decrypted' => 'ABCDEFGHIKLMNOPQRSTUWXYZ',
                'encrypted' => 'aaaaaaaaabaaabaaaabbaabaaaababaabbaaabbbabaaaabaabababaababbabbaaabbababbbaabbbbbaaaabaaabbaababaabbbabaabababbabbababbb',
            ],
        ];
    }
}
