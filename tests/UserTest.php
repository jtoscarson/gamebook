<?php

require __DIR__ . "/../src/Entity/Game.php";
require __DIR__ . "/../src/Entity/Rating.php";
require __DIR__ . "/../src/Entity/User.php";

class UserTest extends PHPUnit_Framework_TestCase {

    public function testGenreCompatibility_With8And6_Returns7() {
        $rating1 = $this->getMock(Rating::class);
        $rating1->method('getScore')->willReturn(6);

        $rating2 = $this->getMock(Rating::class);
        $rating2->method('getScore')->willReturn(8);

        $user = $this->getMock(User::class);
        $user->method('findRatingsByGenre')
             ->willReturn([$rating1, $rating2]);
        $this->assertEquals(7, $user->getGenreCompatibility('zombies'));
    }

    public function testRatingsByGenre_With1ZombieAnd1Shooter_Returns1Zombie() {

    }
}
