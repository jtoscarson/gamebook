<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Entity/Game.php";
require __DIR__ . "/../src/Entity/Rating.php";
require __DIR__ . "/../src/Entity/User.php";


class GameTest extends TestCase {

    public function testImage_WithNull_ReturnsPlaceholder(){

    }

    public function testImage_WithPath_ReturnsPath() {

    }

    public function testAverageScore_WithoutRatings_ReturnsNull()
    {

    }

    public function testAverageScore_With6And8_Returns7() {

    }

    public function testAverageScore_WithNullAnd5_Returns5() {
        $rating1 = $this->getMock('Rating', ['getScore']);
        $rating1->method('getScore')
                ->willReturn(null);

        $rating2 = $this->getMock('Rating', ['getScore']);
        $rating2->method('getScore')
                ->willReturn(5);

        $game = $this->getMock('Game', ['getRatings']);
        $game->method('getRatings')
             ->willReturn([$rating1, $rating2]);

        $this->assertEquals(5, $game->getAverageScore());
    }

    public function testIsRecommended_WithCompatibility2AndScore10_ReturnsFalse() {

    }

    public function testIsRecommended_WithCompatibility10AndScore10_ReturnsFalse() {
        $game = $this->getMock('Game', ['getAverageScore', 'getGenreCode']);
        $game->method('getAverageScore')
             ->willReturn(10);

        $user = $this->getMock('User', ['getGenreCompatibility']);
        $user->method('getGenreCompatibility')
             ->willReturn(10);

        $this->assertTrue($game->isRecommended($user));
    }
}
