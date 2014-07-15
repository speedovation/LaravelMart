<?php namespace Codesleeve\Sprockets;

use RecursiveIteratorIterator, RecursiveDirectoryIterator;

class StaticFilesGenerator implements Interfaces\StaticFilesGeneratorInterface
{
    public function __construct($generator)
    {
        $this->generator = $generator;
        $this->parser = new Parsers\DirectivesParser($generator->config);
    }

    /**
     * Generate all assets into the $outputPath given
     * and return the list of those assets generated
     *
     * @param string  $outputPath
     * @return array
     */
    public function generate($outputPath)
    {
        $key = 'asset_pipeline_generate_manifest';
        $base = $this->parser->config['base_path'];
        $paths = array_reverse($this->parser->config['paths']);
        $cache = $this->parser->config['cache_server'];

        $this->written = array();
        $this->manifest = $cache->has($key) ? json_decode($cache->get($key)) : array();

        foreach ($paths as $path)
        {
            list($all, $written) = $this->createFilesForPath($base . '/' . $path, $outputPath, $overwrite = false);
            $this->manifest = array_merge($this->manifest, $all);
            $this->written = array_merge($this->written, $written);
        }

        $cache->set('asset_pipeline_generate_manifest', json_encode($this->manifest));

        return $this->written;
    }

    /**
     * Generate all assets for a specific path
     *
     * @param string $fullpath
     * @return array
     */
    protected function createFilesForPath($fullpath, $outputPath, $overwrite = false)
    {
        $all = array();

        $written = array();

        $files = $this->getAllFilesFromDirectory($fullpath);

        foreach ($files as $file)
        {
            $cached = $this->generator->cachedFile($file);

            if ($overwrite)
            {
                $cached->remove();
            }

            $cacheKey = $cached->getCacheKey();

            $relative = $this->getRelativePath($fullpath, $file);

            $output = $outputPath . $relative;

            if (!(array_key_exists($cacheKey, $this->manifest) && $this->manifest[$cacheKey] == $output))
            {
                $written[] = $relative;
                $this->createFile($output, $cached->dump());
            }

            $all[$cacheKey] = $output;

        }

        return array($all, $written);
    }

    /**
     * Return the relative path for this file. This also
     * converts the extension to the correct extension given
     * the current mime types in the configuration.
     *
     * @return string
     */
    protected function getRelativePath($fullpath, $file)
    {
        $extension = $this->parser->extensionForFile($file);
        $mimeType = $this->parser->mimeType($file);

        if ($mimeType == 'stylesheets')
        {
            $file = $this->parser->stripOffExtensions($file) . '.css';
        }

        if ($mimeType == 'javascripts')
        {
            $file = $this->parser->stripOffExtensions($file) . '.js';
        }

        return str_replace($fullpath, '', $file);
    }

    /**
     * Create the file and directories if those don't exist yet
     *
     * @return string
     */
    protected function createFile($file, $content)
    {
        if (!file_exists(dirname($file)))
        {
            mkdir(dirname($file), 0777, true);
        }

        file_put_contents($file, $content);
    }

    /**
     * Traverses the directory and gets all the files in it
     *
     * @param string $directory
     * @return array
     */
    protected function getAllFilesFromDirectory($directory)
    {
        if (!is_dir($directory))
        {
            return array();
        }

        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST, RecursiveIteratorIterator::CATCH_GET_CHILD);

        foreach ($iterator as $filename => $file)
        {
            if (!$file->isDir())
            {
                $files[] = $filename;
            }
        }

        return $files;
    }
}