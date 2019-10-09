<?php

namespace WinningNumberOrigin\Bjsyxw;

// 北京 11 選 5 - Base
abstract class Base implements \WinningNumberOrigin\OriginInterface
{

	protected $code;

	// API 位址
	protected $api_url;

	// 取得開獎號碼
	public function fetchWinningNumber()
	{
		$api_url = str_replace('{code}', $this->code, $this->api_url);

		// fetch 用 curl 或 第三方 package 實作
		return fetch($api_url);
	}

}
