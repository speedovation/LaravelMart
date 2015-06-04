<?php namespace Codesleeve\Sprockets\Filters;

use Assetic\Asset\AssetInterface;
use Assetic\Filter\FilterInterface;

class JavascriptConcatenationFilter implements FilterInterface
{
    public function filterLoad(AssetInterface $asset)
    {

    }

 	/**
 	 * Adds a semi-colon to the end of the content to help prevent
 	 * issues where you have like self-invoking functions in two
 	 * different files...
 	 *
 	 * (function x() { })()  // <-- needs a semi-colon here
 	 * (function y() { })()  // you will get an error with this
 	 *
 	 * When seperated these two files work fine. This is just preventive
 	 * medicine for the ASI (automatic semi-colon insertion).
 	 *
 	 * @param  AssetInterface $asset
 	 * @return
 	 */
    public function filterDump(AssetInterface $asset)
    {
		$asset->setContent($asset->getContent() . ';');
    }
}
