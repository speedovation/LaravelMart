<?php namespace Codesleeve\Sprockets\Parsers;

class PathParser extends ExtensionsParser
{
    /**
     * We strip off any leading paths and then try to find this
     * file using our available paths and extensions.
     * 
     * @param  {[type]} $filename [description]
     * @return {[type]}           [description]
     */
    public function absolutePath($filename)
    {
        $original_filename = $filename;
        $filename = $this->stripOffExtensions($filename);
        $original_extension = $filename == $original_filename ? '' : $this->extensionForFile($original_filename);

        foreach ($this->paths as $path)
        {
            foreach ($this->extensions() as $extension)
            {
                $absolutePath = $this->fileExists($path . '/' . $filename . $extension);

                if ($absolutePath && (!$original_extension || $this->extensionForFile($absolutePath) == $original_extension)) {
                    return $absolutePath;
                }
            }
        }

        return null;
    }

    /**
     * This will search for a file with this $filename in our
     * paths for us. This is useful when we are dealing with 
     * other mime types like images or font files.
     * 
     * @param  string $filename
     * @return string          
     */
    public function fileWithAbsolutePath($filename)
    {
        foreach ($this->paths as $path)
        {
            $absolutePath = $this->fileExists($path . '/' . $filename);

            if ($absolutePath) {
                return $absolutePath;
            }
        }

        return null;
    }

    /**
     * Gets us a web path for this file (how would you access it
     * via the web?)
     * 
     * @param  string $filename
     * @return string
     */
    public function absolutePathToWebPath($filename)
    {
        $filename = $this->stripFromBeginning($this->base_path . '/', $filename);

        foreach ($this->paths() as $path)
        {
            $path = $this->stripFromBeginning($path . '/', $filename);

            if ($path != $filename) {
                return $path;
            }
        }

        return $filename;
    }

    /**
     * If the file exists then we will return the filename
     * else we return null
     * 
     * @param  string $filename
     * @return null|$filename
     */
    private function fileExists($filename)
    {
        $filename = $this->base_path . '/' . $filename;
        
        if (file_exists($filename) && is_file($filename)) {
            return $filename;
        }

        return null;
    }
}
