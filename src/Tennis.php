<?php

namespace App;

use App\Player;

class Tennis
{
    public $player1;
    public $player2;

    protected $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if ($this->hasAWinner()) {
            return 'Win for ' . $this->winner()->name;
        }

        $score = $this->lookup[$this->player1->points] . '-';
        return $score .= $this->tied() ? 'All' : $this->lookup[$this->player2->points];
    }

    protected function tied()
    {
        return $this->player1->points == $this->player2->points;
    }

    protected function hasAWinner()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByTwo();
    }

    protected function hasEnoughPointsToBeWon()
    {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    protected function isLeadingByTwo()
    {
        return abs($this->player1->points - $this->player2->points) >= 2;
    }

    protected function winner()
    {
        return $this->player1->points > $this->player2->points
                ? $this->player1
                : $this->player2;
    }
}
