<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Index'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
  <h2>管理コンソール</h2>
  <ul>
    <li><?= $this->Html->link(__('ユーザー管理'), ['action' => 'user_management']) ?></li>
    <li><?= $this->Html->link(__('タグ管理'), ['action' => 'tag_management']) ?></li>
  </ul>
</div>
