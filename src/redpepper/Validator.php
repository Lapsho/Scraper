<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 14.07.2018
 * Time: 17:49
 */

class Validator
{
    /** checks the request for correctness and returns the link
     * @param string $request
     * @return bool|string
     */
    public function validateRequest(string $request)
    {
        $findErrors = $this->viewErrors($request);

        if ($findErrors === false) {
            $result = $this->createURL($request);
        } else {
            $result = $findErrors;
        }

        return $result;
    }


    /** checks the request for correctness: if it is not correct - return errors, otherwise it returns false
     * @param string $request
     * @return bool|string
     */
    protected function viewErrors(string $request)
    {
        $error = false;

        if (strstr($request, '<script>')) {
            $error = 'carefully! JS injection';
        } elseif (strstr($request, 'http') && strstr($request, 'www.instagram.com') === false) {
            $error = 'You have entered a false link';
        }

        return $error;
    }


    /** accepts the request and redrafts it into a link
     * @param string $request
     * @return string
     */
    protected function createURL(string $request)
    {
        if (strstr($request, 'https://www.instagram.com')) {
            $username = explode('/', $request);
            $username = $username[3];
        } elseif (strstr($request, '@')) {
            $username = explode('@', $request);
            $username = $username[1];
        } else {
            $username = $request;
        }

        $url = "https://instagram.com/$username/";
        return $url;
    }
}