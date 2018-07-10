<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tagmap Entity
 *
 * @property int $id
 * @property int $bookmark_id
 * @property int $tag_id
 *
 * @property \App\Model\Entity\Bookmark $bookmark
 * @property \App\Model\Entity\Tag $tag
 */
class Tagmap extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'bookmark_id' => true,
        'tag_id' => true,
        'bookmark' => true,
    ];
}
