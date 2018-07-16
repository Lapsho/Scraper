<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 14.07.2018
 * Time: 23:30
 */

class RequestHandler
{
    public $factory;
    public $validate;
    public $getData;
    public $fetchImages;

    /** accepts a request from the user, validates, sends a request to instagram, processes it and in the case of
     * success returns an array of images; otherwise a corresponding error
     * @param string $request
     * @return array|bool|string
     */
    public function handle(string $request)
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