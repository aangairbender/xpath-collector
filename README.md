# XPath-collector

Imagine the situation when you need to scrap some information from webpage/xml etc.

One of the easiest ways is using XPath, but it becomes really annoying when you need to make tons of queries.

XPath-collector is a tool for scraping data by specifying it's XPath in array style.

Usage:

```php
$rules = array(
	"First name" => '//*[@id="top_profile_link"]/div[1]',
	"Last name" => '//*[@id="top_profile_link"]/div[1]',
	"Friends" => '//*[@class="friend_div"]',
);

$schema = new XPathCollector\XCSchema($rules);
$collector = new XPathCollector\XCCollector($s, file_get_contents("dialogs.html"));

var_dump($collector->execute());

```

Project is on developing stage yet. Help is welcome.

Future plans:
* Add support loading searchContent from file (or url)
* Write docs and pretty comments
* Create website with **XCPacks** - predefined rule sets for different websites(urls), no need to describe rules that were described by someone else before, just use what you really need.