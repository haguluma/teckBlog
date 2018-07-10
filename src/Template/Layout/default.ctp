<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Test Blog';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('mycustom.css') ?>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <?= $this->Html->script('marked.min.js') ?>
    <?= $this->Html->script('mycustom.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <div>
          <h1>Tech Blog</h1>
        </div>
        <!--<ul class="title-area large-3 medium-3 columns">
            <li class="name">
                <h1><a href=""></a></h1>
            </li>
        </ul>-->
        <div class="top-bar-section">
            <ul class="left">
                <li><?= $this->Html->link('Top',['controller'=>'UserMenu','action'=>'index']); ?></li>
                <li><?= $this->Html->link('Articles',['controller'=>'UserMenu','action'=>'article']); ?></li>
                <li><?= $this->Html->link('Download',['controller'=>'UserMenu','action'=>'download']); ?></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
