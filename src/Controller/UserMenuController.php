<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Filesystem\File;

class UserMenuController extends AppController
{
    public function initialize()
    {
      parent::initialize();
      $this->loadModel('Users');
      $this->loadModel('Bookmarks');
      $this->loadModel('Tags');
      $this->loadModel('Tagmaps');
    }


    public function beforeFilter(Event $event)
    {

    }

    public function index()
    {
      $str = $this->request->getData('text1');
      $msg = 'typed: ' . $str;
      if ($str == null)
      { $msg = "please type..."; }
      $this->set('message', $msg);
    }


    public function article()
    {
      $tags = $this->Tags->find();

      $article_list = [];
      foreach ($tags as $tag) {
        $article_list[$tag->tag_id] = [];
        $tbmaps = $this->Tagmaps->find('all', ['conditions' => ['tag_id' => $tag->tag_id]]);
        foreach ($tbmaps as $tbmap){
          $bookmark = $this->Bookmarks->find('all', ['conditions' => ['id' => $tbmap['bookmark_id']] ])->first();
          $article_list[$tag->tag_id][] = $bookmark;
        }
      }


      if ($this->request->is('get')) {
          $article_id = $this->request->getQuery('article_id');
          $article = $this->Bookmarks->find("all", ['conditions' => ['id' => $article_id]])->first();
          //print_r($article_id);
          //$file = new File($article['url'], true, 0644);
          $file = new File($article['url']);
          // error_log(print_r($contents,true),"3","/Users/haguluma/Desktop/debug.log");
          $article_text = $file->read();
          // $file->append('このファイルの最後に追記します。');
          // $file->delete(); // このファイルを削除します
          $file->close(); // 終了時にファイルをクローズしましょう
      } else {
        $article = $this->Bookmarks->find("all", ['order' => 'DESC'])->first();
      }

      //$file = new File($article['url'], true, 0644);
      $file = new File($article['url']);
      // error_log(print_r($contents,true),"3","/Users/haguluma/Desktop/debug.log");
      $article_text = $file->read();
      // $file->append('このファイルの最後に追記します。');
      // $file->delete(); // このファイルを削除します
      $file->close(); // 終了時にファイルをクローズしましょう

      $this->set(compact('article_list'));
      $this->set(compact('article', 'article_text'));
      $this->set(compact('tags'));
      $this->set('_serialize', ['tags']);

    }

    public function download()
    {

    }

    public function err()
    {
        $this->autoRender = false;
        echo "<html><head></head><body>";
        echo "<h1>Hello!</h1>";
        echo "<p>パラメータがありませんでした。</p>";
        echo "</body></html>";
    }
}
