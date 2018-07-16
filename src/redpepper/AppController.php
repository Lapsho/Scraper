<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 12.07.2018
 * Time: 20:50
 */

class AppController
{
    /** @var string contain website name */
    const PAGE_TITLE = 'RED PEPPER SCRAPER';

    // checks to which page the request and connects to the desired one
    public function indexAction()
    {
        if(!isset($_GET['page']) || $_GET['page'] === '/'){
            require 'pages/index.php';
        }
    }
}
