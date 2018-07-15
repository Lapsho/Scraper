<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 14.07.2018
 * Time: 20:17
 */

class FetchImages
{
    /** Gets URL images and thumbnails from the object and wrote it in array
     *
     * @param $object
     * @return array
     */
    public function getElements ($object): array
    {
        $object = $object->edge_owner_to_timeline_media->edges;
        foreach ($object as $subObject) {
            $images[] = [
                'urlImage' => $subObject->node->display_url,
                'urlThumbnail' => $subObject->node->thumbnail_resources[2]->src,
                'date' => $subObject->node->taken_at_timestamp
            ];
        }
        return $images;
    }
}