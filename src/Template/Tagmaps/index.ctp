<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tagmap[]|\Cake\Collection\CollectionInterface $tagmaps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tagmap'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tagmaps index large-9 medium-8 columns content">
    <h3><?= __('Tagmaps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bookmark_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tagmaps as $tagmap): ?>
            <tr>
                <td><?= $this->Number->format($tagmap->id) ?></td>
                <td><?= $tagmap->has('bookmark') ? $this->Html->link($tagmap->bookmark->title, ['controller' => 'Bookmarks', 'action' => 'view', $tagmap->bookmark->id]) : '' ?></td>
                <td><?= $tagmap->has('tag') ? $this->Html->link($tagmap->tag->tag_id, ['controller' => 'Tags', 'action' => 'view', $tagmap->tag->tag_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tagmap->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tagmap->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tagmap->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagmap->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
