<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->tag_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->tag_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->tag_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->tag_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tag Id') ?></th>
            <td><?= $this->Number->format($tag->tag_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Tag Name') ?></h4>
        <?= $this->Text->autoParagraph(h($tag->tag_name)); ?>
    </div>
</div>
