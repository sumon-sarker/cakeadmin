<?php
  $this->Form->templates([
      'inputContainer' => '<div class="item form-group {{type}}{{required}}">
          {{content}} <span class="help">{{help}}</span></div>'
  ]);
?>
<div class="settings ">
    <div class="page-title">
      <div class="x_panel">
        <h3><?= __('Site Configuration') ?></h3>
      </div>

      <div class="title_right"></div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">

            <?= $this->Form->create($setting,['class'=>"form-horizontal form-label-left",'novalidate'=>true]) ?>

              <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?= $this->Form->input('site_title',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?= $this->Form->input('site_email',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <?= $this->Form->input('footer_text',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                  <?= $this->Form->button(__('Update'),array('type'=>'submit','id'=>'send','class'=>'btn btn-success')) ?>
                </div>
              </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
      </div>
    </div>
</div>