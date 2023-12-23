<?php
declare(strict_types=1);

namespace Mlopez\Trm\Tests;

use Mlopez\Trm\Trm;
use PHPUnit\Framework\TestCase;


class TrmTest extends TestCase
{
    public function testCallWithValidDate()
    {
        $date = '2023-05-16';

        $data = [
            'id' => 1564901,
            'unit' => 'COP',
            'validityFrom' => $date.'T00:00:00-05:00',
            'validityTo' => $date.'T00:00:00-05:00',
            'value' => 3925.77,
            'success' => 1,
        ];

        $stub = $this->createMock(Trm::class);
        $stub->method('call')
            ->willReturn($data);

        $this->assertEquals($data, $stub->call($date));
    }
}
