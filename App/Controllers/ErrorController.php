<?php
/**
 * Error Controller
 */
namespace App\Controllers;

class ErrorController
{
    /**
     * Page not found
     */
    public function pageNotFound()
    {
        header('HTTP/1.0 404 Not Found');
    }
} 