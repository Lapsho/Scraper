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
    /** returns a Validator class object
     * @return Validator
     */
    public function validate()
    {
        return new Validator();
    }

    /** returns a DataProcessor class object
     * @return DataProcessor
     */
    public function getData()
    {
        return new DataProcessor();
    }

    /** returns a ImageFeatcher class object
     * @return ImageFeatcher
     */
    public function fetchImages()
    {
        return new ImageFeatcher();
    }
}