<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tagmap $tagmap
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tagmap->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tagmap->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tagmaps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tagmaps form large-9 medium-8 columns content">
    <?= $this->Form->create($tagmap) ?>
    <fieldset>
        <legend><?= __('Edit Tagmap') ?></legend>
        <?php
            echo $this->Form->control('bookmark_id', ['options' => $bookmarks, 'empty' => true]);
            echo $this->Form->control('tag_id', ['options' => $tags, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
