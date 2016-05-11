<?php

class StatamicV1OverrideValetDriver extends ValetDriver
{
    public function __construct()
    {
        $this->dir = '/html';
    }

    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return void
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return file_exists($sitePath . $this->dir . '/_app/core/statamic.php');
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        if (strpos($uri, '/_add-ons') === 0 || strpos($uri, '/_app') === 0 || strpos($uri, '/_content') === 0 ||
            strpos($uri, '/_cache') === 0 || strpos($uri, '/_config') === 0 || strpos($uri, '/_logs') === 0 ||
            $uri === '/admin'
        ) {
            return false;
        }

        if ($this->isActualFile($staticFilePath = $sitePath . $this->dir . $uri)) {
            return $staticFilePath;
        }

        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        if (strpos($uri, '/admin.php') === 0) {
            $_SERVER['SCRIPT_NAME'] = '/admin.php';

            return $sitePath . $this->dir . '/admin.php';
        }

        if ($uri === '/admin') {
            $_SERVER['SCRIPT_NAME'] = '/admin/index.php';

            return $sitePath . $this->dir . '/admin/index.php';
        }

        $_SERVER['SCRIPT_NAME'] = '/index.php';

        return $sitePath . $this->dir . '/index.php';
    }
}
