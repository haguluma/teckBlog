<?php
namespace App\Controller;

use App\Controller\AppController;

class HeloController extends AppController
{


    public function index()
    {
      $str = $this->request->getData('text1');
      $msg = 'typed: ' . $str;
      if ($str == null)
      { $msg = "please type..."; }
      $this->set('message', $msg);
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
