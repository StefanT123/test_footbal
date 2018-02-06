<?php

namespace spec\App;

use App\Tennis;
use App\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TennisSpec extends ObjectBehavior
{
	protected $john;
	protected $jane;

	function let()
	{
		$this->john = new PLayer('John Doe', 0);
		$this->jane = new PLayer('Jane Doe', 0);

		$this->beConstructedWith($this->john, $this->jane);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType(Tennis::class);
    }

    function it_scores_a_scoreless_game()
    {
    	$this->score()->shouldReturn('Love-All');
    }

    function it_scores_1_0_game()
    {
    	$this->john->earnPoints(1);
    	$this->score()->shouldReturn('Fifteen-Love');
    }

    function it_scores_2_0_game()
    {
    	$this->john->earnPoints(2);
    	$this->score()->shouldReturn('Thirty-Love');
    }

    function it_scores_3_0_game()
    {
    	$this->john->earnPoints(3);
    	$this->score()->shouldReturn('Forty-Love');
    }

    function it_scores_4_0_game()
    {
    	$this->john->earnPoints(4);
    	$this->score()->shouldReturn('Win for John Doe');
    }

    function it_scores_0_4_game()
    {
    	$this->jane->earnPoints(4);
    	$this->score()->shouldReturn('Win for Jane Doe');
    }
}
