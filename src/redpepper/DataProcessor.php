<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 14.07.2018
 * Time: 19:43
 */

class DataProcessor
{
    /** gets it instagram page and parse it: if it page is private or not existing - it return massage, otherwise -
     * object with data
     * @param string $url
     * @return string
     */
    public function getPage(string $url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $html = curl_exec($ch);

        /* Check for 404 (file not found). */
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($httpCode == 404) {
            return 'You enter false username';
        }

        curl_close($ch);

        if(preg_match('/_sharedData = ({.*);<\/script>/', $html, $matches)){
            $profile_data = json_decode($matches[1])->entry_data->ProfilePage[0]->graphql->user;
        }else{
            return 'Please check your request, the given data is incorrect';
        }

        $is_private = $profile_data->is_private;

        if($is_private){
            return 'This page is private';
        }else{
            return $profile_data;
        }
    }
}