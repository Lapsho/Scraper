<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 12.07.2018
 * Time: 20:50
 */

class App
{
    /** @var string contain web page name */
    const PAGE_TITLE = 'RED PEPPER SCRAPER';

    /** require pages
     *
     */
    public function controller()
    {
        if(!isset($_GET['page']) || $_GET['page'] === '/'){
            require 'pages/index.php';
        }
    }
}
