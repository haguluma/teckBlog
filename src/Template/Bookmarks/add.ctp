<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tagmaps'), ['controller' => 'Tagmaps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tagmap'), ['controller' => 'Tagmaps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookmarks form large-9 medium-8 columns content">
    <?= $this->Form->create($bookmark) ?>
    <fieldset>
        <legend><?= __('Add Bookmark') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('author_id');
            echo $this->Form->control('url');
            echo $this->Form->control('time_created');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
