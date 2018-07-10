<div id="md_editor">
  <div>
    <select id="art_tagselecter">
      <?php foreach ($tags as $tag): ?>
        <option value=<?= $tag->tag_name ?>><?= $tag->tag_name ?></option>
      <?php endforeach; ?>
    </select>
    <button onclick="add_tag()">Add tag</button>
    <h4>タグリスト</h4>
    <ul id="art_taglist" class="clear_fix">
    </ul>
  </div>
  <?= $this->Form->create() ?>
  <?= $this->Form->control('title', ["id"=>"md_title"]) ?>
  <div id="md_confirm"></div>
  <?= $this->Form->textarea('mdtext', ["id"=>"md_textarea"]) ?>
  <?= $this->Form->hidden('tags', ["id"=>"article_tags"]) ?>
  <div>
    <div class="btn" onclick="md_confirm()" id="confirm_btn">Confirm</div>
    <?= $this->Form->button(__('Submit'),["class"=>"btn","id"=>"submit_btn"]) ?>
  </div>
  <?= $this->Form->end() ?>
</div>
