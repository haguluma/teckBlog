<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bookmark'), ['action' => 'edit', $bookmark->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bookmark'), ['action' => 'delete', $bookmark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmark->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmark'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tagmaps'), ['controller' => 'Tagmaps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tagmap'), ['controller' => 'Tagmaps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookmarks view large-9 medium-8 columns content">
    <h3><?= h($bookmark->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bookmark->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time Created') ?></th>
            <td><?= h($bookmark->time_created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= $this->Text->autoParagraph(h($bookmark->title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Author Id') ?></h4>
        <?= $this->Text->autoParagraph(h($bookmark->author_id)); ?>
    </div>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($bookmark->url)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tagmaps') ?></h4>
        <?php if (!empty($bookmark->tagmaps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Bookmark Id') ?></th>
                <th scope="col"><?= __('Tag Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bookmark->tagmaps as $tagmaps): ?>
            <tr>
                <td><?= h($tagmaps->id) ?></td>
                <td><?= h($tagmaps->bookmark_id) ?></td>
                <td><?= h($tagmaps->tag_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tagmaps', 'action' => 'view', $tagmaps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tagmaps', 'action' => 'edit', $tagmaps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tagmaps', 'action' => 'delete', $tagmaps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagmaps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
