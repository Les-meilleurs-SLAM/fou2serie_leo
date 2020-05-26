<?php

namespace app\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Repository\SerieRepository;

class SerieRepositoryTest extends KernelTestCase
{
    public function testCountSerie()
    {
        self::bootKernel();
        $nb = self::$container->get(SerieRepository::class)->count([]);
        $this->assertEquals(5, $nb);
    }
}
