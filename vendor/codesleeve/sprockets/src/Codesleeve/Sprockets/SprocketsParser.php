<?php namespace Codesleeve\Sprockets;

class SprocketsParser extends Parsers\ConfigParser implements Interfaces\ParserInterface
{
    /**
     * Keep up with the config array
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Returns an array of files of any mime type from
     * the manifest file passed into this function
     *
     * @param  string $filename
     * @return array
     */
    public function files($filename)
    {
        $parser = new Parsers\DirectivesParser($this->config);

        $absolutePath = $parser->absolutePath($filename);

        if ($parser->concat()) {
            return array($absolutePath);
        }

        return $parser->getFilesArrayFromDirectives($absolutePath);
    }

    /**
     * Returns an array of javascript files that are extracted
     * from the manifest file passed into this function
     *
     * @param  string $filename
     * @return array
     */
    public function javascriptFiles($filename)
    {
        $parser = new Parsers\DirectivesJavascriptsParser($this->config);

        $absolutePath = $parser->absolutePath($filename);

        if ($parser->concat()) {
            return array($absolutePath);
        }

        return $parser->getFilesArrayFromDirectives($absolutePath);
    }

    /**
     * Returns an array of stylesheet files that are extracted
     * from the manifest file passed into this function
     *
     * @param  string $filename
     * @return array
     */
    public function stylesheetFiles($filename)
    {
        $parser = new Parsers\DirectivesStylesheetsParser($this->config);

        $absolutePath = $parser->absolutePath($filename);

        if ($parser->concat()) {
            return array($absolutePath);
        }

        return $parser->getFilesArrayFromDirectives($absolutePath);
    }

    /**
     * Returns a short web path and is how you would access
     * this asset from a browser.
     *
     * @param  string $filename
     * @return string
     */
    public function absolutePathToWebPath($filename)
    {
        $parser = new Parsers\DirectivesParser($this->config);

        $prefix = $parser->routing->prefix;

        return $prefix . '/' . $parser->absolutePathToWebPath($filename);
    }

    /**
     * Returns the absolute path to this javascript filename
     *
     * @param  string $filename
     * @return string
     */
    public function absoluteJavascriptPath($filename)
    {
        $parser = new Parsers\DirectivesJavascriptsParser($this->config);

        return $parser->absolutePath($filename);
    }

    /**
     * Returns the absolute path to this stylesheet filename
     *
     * @param  string $filename
     * @return string
     */
    public function absoluteStylesheetPath($filename)
    {
        $parser = new Parsers\DirectivesStylesheetsParser($this->config);

        return $parser->absolutePath($filename);
    }

    /**
     * Returns any file with this absolute path that matches filename
     *
     * @param  string $filename
     * @return string
     */
    public function absoluteFilePath($filename)
    {
        $parser = new Parsers\PathParser($this->config);

        return $parser->fileWithAbsolutePath($filename);
    }
}