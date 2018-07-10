<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class AdminController extends AppController
{

  public function initialize()
  {
      parent::initialize();

      $this->loadModel('Users');
      $this->loadModel('Bookmarks');
      $this->loadModel('Tags');
      $this->loadModel('Tagmaps');

      $this->loadComponent('RequestHandler', [
          'enableBeforeRedirect' => false,
      ]);

      $this->loadComponent('Flash');

      $this->loadComponent('Auth', [
          'logoutRedirect' => [
              'controller' => 'Admin',
              'action' => 'login'
          ],
          'authenticate' => [
              'Form' => [
                'userModel' => 'Users',
                'fields' => [
                  'username' => 'username',
                  'password' => 'password'
                ]
              ]
          ],
    ]);
  }

    public function beforeFilter(Event $event)
    {
      parent::beforeFilter($event);
      $this->Auth->allow(['login','add']);
    }

    public function userManagement()
    {
      $users = $this->paginate($this->Users);

      $this->set(compact('users'));
      $this->set('_serialize', ['users']);
    }

    public function tagManagement(){
      if ($this->request->is('post')) {
          $tag = $this->Tags->newEntity();
          $tag->tag_name = $this->request->getData('tag_name');
          if ($this->Tags->save($tag)) {
              $this->Flash->success(__('The tag has been saved.'));
              return $this->redirect(['action' => 'tag_management']);
          }else {
              $this->Flash->error(__('The user could not be saved. Please, try again.'));
          }
          $this->Flash->error(__('The user could not be saved. Please, try again.'));
      }
      $tags = $this->paginate($this->Tags);
      $this->set(compact('tags'));
      $this->set('_serialize', ['tags']);
    }

    public function index()
    {
      $users = $this->paginate($this->Users);

      $this->set(compact('users'));
      $this->set('_serialize', ['users']);
    }

    public function view($id = null)
    {
      $user = $this->Users->get($id, [
        'contain' => []
      ]);

      $this->set('user', $user);
      $this->set('_serialize', ['user']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if ($this->Auth->user('attribute') == 'admin')
                  return $this->redirect(['controller'=>'Admin','action'=>'index']);
                else
                  return $this->redirect(['controller'=>'Admin','action'=>'article']);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function article()
    {
        $tags = $this->Tags->find("all");
        $this->set(compact('tags'));
        $this->set('_serialize', ['tags']);

        if ($this->request->is('post')) {
          $title = $this->request->getData('title');
          $url = '/Users/haguluma/testcake/samplecake2/webroot/markdown/'. $title .'.md';
          $taglist = explode(",", $this->request->getData('tags'));

          $last_id = 0;
          //error_log(print_r($taglist,true),"3","/Users/haguluma/Desktop/debug.log");

          $bookmark = $this->Bookmarks->newEntity();
          $bookmark->title = $title;
          $bookmark->author_id = "guest";
          $bookmark->url = $url;

          if ($this->Bookmarks->save($bookmark)) {
              $this->Flash->success(__('The Bookmark has been saved.'));
              $last_id = $bookmark->id;
          } else {
              $this->Flash->error(__('The article could not be saved. Please, try again.'));
          }
          //error_log(print_r($last_id,true),"3","/Users/haguluma/Desktop/debug.log");

/*
id SERIAL,
title text not null,
author_id text not null,
url text not null,
time_created timestamp default CURRENT_TIMESTAMP,
*/

          foreach ($taglist as $tag_name){
              $tagmap = $this->Tagmaps->newEntity();
              $tagmap->bookmark_id = $last_id;
              $temp_tag = $this->Tags->find()->where(['Tags.tag_name =' => $tag_name])->first();
              //error_log(print_r($temp_tag,"3","/Users/haguluma/Desktop/debug.log");

              $tagmap->tag_id = $temp_tag->tag_id;
              if ($this->Tagmaps->save($tagmap)) {
                  $this->Flash->success(__('The Tagmap ') . $last_id . ' : ' . $temp_tag->tag_id . __('has been saved.'));
              } else {
                  $this->Flash->error(__('The Tagmap ') . strval($last_id) . ' : ' . strval($temp_tag->tag_id) . __(' could not have been saved.'));
              }

          }

/*
id SERIAL,
bookmark_id integer,
tag_id integer,
*/

          //$dir = new Folder('/markdown');
          $file = new File($url, true, 0644);
          // error_log(print_r($contents,true),"3","/Users/haguluma/Desktop/debug.log");
          $file->write($contents = $this->request->getData('mdtext'));
          // $file->append('このファイルの最後に追記します。');
          // $file->delete(); // このファイルを削除します
          $file->close(); // 終了時にファイルをクローズしましょう

          /*
          $user = $this->Users->newEntity();
          $tag = $this->Tags->newEntity();
          $bookmark = $this->Bookmarks->newEntity();
          $tagmap = $this->Tagmaps->newEntity();

          $user = $this->Users->patchEntity($user, $this->request->getData());
          if ($this->Users->save($user)) {
              $this->Flash->success(__('The user has been saved.'));
              return $this->redirect(['action' => 'add']);
          }
          $this->Flash->error(__('The user could not be saved. Please, try again.'));

          $this->set(compact('user'));
          $this->set('_serialize', ['user']);
          */
        }
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
