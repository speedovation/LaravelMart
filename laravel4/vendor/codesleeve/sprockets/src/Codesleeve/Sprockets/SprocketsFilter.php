<?php namespace Codesleeve\Sprockets;

use Assetic\Asset\AssetInterface;
use Assetic\Asset\AssetCollection;
use Assetic\Filter\FilterInterface;

class SprocketsFilter implements FilterInterface
{
    public function __construct($parser, $generator)
    {
        $this->parser = $parser;
        $this->generator = $generator;
    }

    public function filterLoad(AssetInterface $asset)
    {

    }

    public function filterDump(AssetInterface $asset)
    {
        $content = "";

        $files = array();

        $absolutePath = $asset->getSourceRoot() . '/' . $asset->getSourcePath();

        $this->parser->mime = $this->parser->mimeType($absolutePath);

        $absoluteFilePaths = $this->parser->getFilesArrayFromDirectives($absolutePath);

        foreach ($absoluteFilePaths as $absoluteFilePath)
        {
            $files[] = $this->generator->cachedFile($absoluteFilePath);
        }

        // this happens when the file isn't a manifest
        if (!$absoluteFilePaths)
        {
            $files[] = $this->generator->cachedFile($absolutePath);
        }

        $global_filters = $this->parser->get("sprockets_filters.{$this->parser->mime}", array());

        // handle ASI issue with javascripts
        if ($this->parser->mime == "javascripts")
        {
            $global_filters = array_merge($global_filters, array(new Filters\JavascriptConcatenationFilter));
        }

        $collection = new AssetCollection($files, $global_filters);

        $asset->setContent($collection->dump());
    }
}