<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakeAdmin - authentication and authorization plugin ';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?php
        echo $this->Html->css([
            /*Bootstrap*/
            'CakeAdmin.vendors/bootstrap/dist/css/bootstrap.min.css',
            /*Font Awesome*/
            'CakeAdmin.vendors/font-awesome/css/font-awesome.min.css',
            /*NProgress*/
            'CakeAdmin.vendors/nprogress/nprogress.css',
            /*Custom Theme Style*/
            'CakeAdmin.build/css/custom.min.css',
            'CakeAdmin.custom.css',
        ]);
    ?>

    <?= $this->Html->meta('favicon.ico','CakeAdmin.img/favicon.ico',['type'=>'icon']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <?= $this->Flash->render(); ?>
        <?= $this->fetch('content') ?>
      </div>
    </div>
    <?php
        echo $this->Html->script([
            /*jQuery*/
            'CakeAdmin.vendors/jquery/dist/jquery.min.js',
            /*Bootstrap*/
            'CakeAdmin.vendors/bootstrap/dist/js/bootstrap.min.js',
            /*FastClick*/
            'CakeAdmin.vendors/fastclick/lib/fastclick.js',
            /*NProgress*/
            'CakeAdmin.vendors/nprogress/nprogress.js',
            /*Validator*/
            'CakeAdmin.vendors/validator/validator.js',
            /*Custom Theme Scripts*/
            'CakeAdmin.build/js/custom.min.js'
        ]);
    ?>
    <?php echo $this->fetch('footerScript') ?>
</body>
</html>
