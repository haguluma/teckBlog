<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bookmark Entity
 *
 * @property int $id
 * @property string $title
 * @property string $author_id
 * @property string $url
 * @property \Cake\I18n\FrozenTime $time_created
 *
 * @property \App\Model\Entity\Author $author
 * @property \App\Model\Entity\Tagmap[] $tagmaps
 */
class Bookmark extends Entity
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
        'title' => true,
        'author_id' => true,
        'url' => true,
        'time_created' => true,
    ];
}
