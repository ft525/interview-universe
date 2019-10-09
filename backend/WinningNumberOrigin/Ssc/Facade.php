<?php

namespace WinningNumberOrigin\Ssc;

class Facade implements \WinningNumberOrigin\FacadeInterface
{

	protected $lottery;

	public __construct(\Lottery $lottery)
	{
		$this->lottery = $lottery;
	}

	public function getWinningNumber()
	{
		// 從 主號源 取得開獎號碼
		$master = new \WinningNumberOrigin\Ssc\Master();
		$master_winning_number = $master->fetchWinningNumber();
		if (! $master_winner_number) {
			throw new \Exception('主號源 開獎號碼取得失敗.');
		}

		// 從 副號源 取得開獎號碼
		$slave = $this->getSlaveOrigin();
		$slave_winning_number = $slave->fetchWinningNumber();
		if (! $slave_winning_number) {
			throw new \Exception('副號源 開獎號碼取得失敗.');
		}

		// 開獎號碼相互比較
		if ($master_winning_number != $slave_winning_number) {
			throw new \Exception('主、副號源 開獎號碼比對失敗.');
		}

		// 回傳開獎號碼
		return $master_winning_number;
	}

	protected function getSlaveOrigin()
	{
		/*
			簡化實作...

			多個副號源資訊可能用 hardcode 方式或記錄在 db
		*/
		return $slave;
	}
}
