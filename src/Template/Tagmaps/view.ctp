<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tagmap $tagmap
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tagmap'), ['action' => 'edit', $tagmap->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tagmap'), ['action' => 'delete', $tagmap->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagmap->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tagmaps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tagmap'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tagmaps view large-9 medium-8 columns content">
    <h3><?= h($tagmap->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Bookmark') ?></th>
            <td><?= $tagmap->has('bookmark') ? $this->Html->link($tagmap->bookmark->title, ['controller' => 'Bookmarks', 'action' => 'view', $tagmap->bookmark->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $tagmap->has('tag') ? $this->Html->link($tagmap->tag->tag_id, ['controller' => 'Tags', 'action' => 'view', $tagmap->tag->tag_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tagmap->id) ?></td>
        </tr>
    </table>
</div>
