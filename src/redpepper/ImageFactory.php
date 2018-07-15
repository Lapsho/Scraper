<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 14.07.2018
 * Time: 23:10
 */

/** Abstract factory
 *
 * Class ImageFactory
 */
class ImageFactory
{
    /** returns a Validate class object
     * @return Validate
     */
    public function validate()
    {
        return new Validate();
    }

    /** returns a GetData class object
     * @return GetData
     */
    public function getData()
    {
        return new GetData();
    }

    /** returns a FetchImages class object
     * @return FetchImages
     */
    public function fetchImages()
    {
        return new FetchImages();
    }
}