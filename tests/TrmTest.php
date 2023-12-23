<?php
declare(strict_types=1);

namespace Mlopez\Trm\Tests;

use Mlopez\Trm\Trm;
use PHPUnit\Framework\TestCase;

class TrmTest extends TestCase
{

    public function testTrm()
    {
        $client = new Trm();
        $client->call('2023-12-20');

        $this->assertTrue(true);
    }
}
