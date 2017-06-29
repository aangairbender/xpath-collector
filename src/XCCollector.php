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

use XPathCollector\XCSchema;

/**
 * @author Yevhen Kazmin <jetixranger@ya.ru>
 */

class XCCollector
{

	private $schema;

	private $searchSource;

	public function __construct(XPathCollector\XCSchema $schema, $searchSource)
	{
		$this->schema = $schema;
		$this->searchSource = $searchSource;
	}

	public function getSchema()
	{
		return $schema;
	}

	public function getSearchSource()
	{
		return $searchSource;
	}

	public function setSchema(XPathCollector\XCSchema $newSchema)
	{
		$this->schema = $newSchema;
	}

	public function setSearchsource($newSearchSource)
	{
		$this->searchSource = $newSearchSource;
	}

	public function execute()
	{
		$doc = new DOMDocument;
		$doc->load($searchSource);
		$rules = $schema->getRules();
		$xpath = new DOMXPath;
		$result = array();
		foreach ($rules as $fieldName => $fieldXpath)
		{
			$query = $xpath->query($fieldXpath);
			$curResult = array();
			foreach ($query as $queryResult)
			{
				$curResult[] = $queryResult->nodeValue;
			}
			$result[$fieldName] = $curResult;
		}
		return $result;
	}


}