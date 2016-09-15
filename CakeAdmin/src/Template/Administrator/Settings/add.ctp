<?php
  $this->Form->templates([
      'inputContainer' => '<div class="item form-group {{type}}{{required}}">
          {{content}} <span class="help">{{help}}</span></div>'
  ]);
?>
<div class="settings ">
    <div class="page-title">
      <div class="title_left">
        <h3><?= __('Add Setting') ?></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Search</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= __('Add Setting') ?> <small>SUB TITLE</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <?= $this->Form->create($setting,['class'=>"form-horizontal form-label-left",'novalidate'=>true]) ?>

              <span class="section"><?= __('Add Setting') ?></span>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?= $this->Form->input('site_title',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?= $this->Form->input('site_email',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?= $this->Form->input('email_verification_template',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?= $this->Form->input('footer_text',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Cancel</button>
                  <?= $this->Form->button(__('Submit'),array('type'=>'submit','id'=>'send','class'=>'btn btn-success')) ?>
                </div>
              </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
      </div>
    </div>
</div>