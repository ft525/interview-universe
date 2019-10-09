<?php

namespace WinningNumberOrigin\Ssc;

// 重慶時時彩 - Base
abstract class Base implements \WinningNumberOrigin\OriginInterface
{

	// 彩種編號
	protected $game_key = 'ssc';

	// 開獎期號
	protected $issue;

	// API 位址
	protected $api_url;

	// 取得開獎號碼
	public function fetchWinningNumber()
	{
		if (empty($this->issue)) {
			throw new \Exception('尚未設定開獎期號.');
		}

		$api_url = str_replace(['{game_key}', '{issue}'], [$this->game_key, $this->issue], $this->api_url);

		// fetch 用 curl 或 第三方 package 實作
		return fetch($api_url);
	}

	// 設定欲抓取的開獎期號
	public function setIssue(string $issue)
	{
		$this->issue = $issue;

		return $this;
	}

}
