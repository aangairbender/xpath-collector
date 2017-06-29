<?php

/*
 * This file is part of XPath-collector
 *
 * Yevhen Kazmin <jetixranger@ya.ru>
 *
 * For the full copyright and licence information, please view the LICENCE
 * file that was distributed with this source code.
 */

namespace XPathCollector;

/**
 * @author Yevhen Kazmin <jetixranger@ya.ru>
 */

class XCSchema
{

	private $rules;

	public function __construct($rules = array())
	{
		$this->rules = $rules;
	}

	public function getRules()
	{
		return $rules;
	}

	public function addRules($newRules = array())
	{
		$this->rules = array_merge($rules, $newRules);
	}


}