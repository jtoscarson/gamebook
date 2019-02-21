<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/Entity/Game.php";
require __DIR__ . "/../src/Entity/Rating.php";
require __DIR__ . "/../src/Entity/User.php";

class UserTest extends TestCase
{
   public function testGenreCompatibility_With8And6_Returns7()
   {
       $rating1 = $this->createMock(Rating::class);
       $rating1->method('getScore')->willReturn(6);

       $rating2 = $this->createMock(Rating::class);
       $rating2->method('getScore')->willReturn(8);

       $user = $this->getMockBuilder(User::class)
           ->setMethods(array('findRatingsByGenre'))
           ->getMock();
       $user->method('findRatingsByGenre')->willReturn([$rating1, $rating2]);

       $this->assertEquals(7, $user->getGenreCompatibility('zombies'));
   }

   public function testRatingsByGenre_With1ZombieAnd1Shooter_Returns1Zombie()
   {
   }
}

