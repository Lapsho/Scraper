<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 14.07.2018
 * Time: 23:30
 */

class HandleRequest
{
    public function handle($request)
    {
        $factory = new ImageFactory();

        $validate = $factory->validate();
        $getData = $factory->getData();
        $fetchImages = $factory->fetchImages();

        if (                                                               // if request wrong (not url)
            strstr($url = $validate->validateRequest($request), 'http') === false
        ) {
            return $url;                                                   // return error
        } else {
            if (is_object($data = $getData->getPage($url))) {          // $data can contain object or error string
                return $fetchImages->getElements($data);             // if $data - object then return array of images
            } else {
                return $data;                                        // otherwise the error will be returned
            }
        }
    }
}