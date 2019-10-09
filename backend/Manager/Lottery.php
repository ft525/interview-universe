<?php

namespace Manager

class Lottery
{

	protected $lottery;

	public __construct(\Lottery $lottery)
	{
		$this->lottery = $lottery;
	}

	public function getWinningNumber()
	{
		// 重慶時時彩
		if ($this->lottery->gameId == 1) {
			return (new \WinningNumberOrigin\Ssc\Facade($this->lottery))->getWinningNumber();
		// 北京 11 選 5
		} else if ($this->lottery->gameId == 2) {
			return (new \WinningNumberOrigin\Bjsyxw\Facade($this->lottery))->getWinningNumber();
		}

		throw new \Exception("未知的彩種. (gameId: {$this->lottery->gameId})");
	}

}
