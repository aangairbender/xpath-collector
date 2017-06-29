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

class XCCollector
{

	private $schema;

	private $searchSource;

	public function __construct(XCSchema $schema, $searchSource)
	{
		$this->schema = $schema;
		$this->searchSource = $searchSource;
	}

	public function getSchema()
	{
		return $this->schema;
	}

	public function getSearchSource()
	{
		return $this->searchSource;
	}

	public function setSchema(XCSchema $newSchema)
	{
		$this->schema = $newSchema;
	}

	public function setSearchsource($newSearchSource)
	{
		$this->searchSource = $newSearchSource;
	}

	public function execute()
	{
		$doc = new \DOMDocument;
		$doc->loadHTML($this->searchSource);
		$rules = $this->schema->getRules();
		$xpath = new \DOMXPath($doc);
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