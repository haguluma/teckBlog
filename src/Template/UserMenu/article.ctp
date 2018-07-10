<div>
    <div class="article_wrapper">
        <h3>
          <?= $article['title'] ?>
        </h3>
        <div class="description">
            <?= $this->Markdown->toHtml($article_text) ?>
        </div>
    </div>
    <div class="sidenav_wrapper">
      <h3>タグ一覧</h3>

      <?php
          foreach ($tags as $tag) {
            print "<h5>". $tag->tag_name. "</h5>";
            print "<ul>";
            foreach ($article_list[$tag->tag_id] as $bookmark){
                print "<li>". $this->Html->link(__($bookmark->title), [ 'action' => 'article', 'article_id' => $bookmark->id ]). "</li>";
            }
            print "</ul>";
          }
       ?>

    </div>
</div>
