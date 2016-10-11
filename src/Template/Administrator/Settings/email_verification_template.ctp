<?php
  $this->Form->templates([
      'inputContainer' => '<div class="item form-group {{type}}{{required}}">
          {{content}} <span class="help">{{help}}</span></div>'
  ]);
?>
<div class="page-title">
              <div class="x_panel">
                <h3><?= __('Email Verification Template') ?></h3>
              </div>
              <div class="title_right"></div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <!-- compose -->
                    <?= $this->Form->create(null,['class'=>"form-horizontal form-label-left",'novalidate'=>true]) ?>
                      <div class="item form-group">
                        <div>
                          <?= $this->Form->input('email_verification_subject',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                      </div>
                      <div class="item form-group">
                          <label>Email Body</label>
                      </div>

                      <div id="compose" class="compose">
                            <div class="compose-body">
                              <div id="alerts"></div>

                              <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                                <div class="btn-group">
                                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                  <ul class="dropdown-menu">
                                  </ul>
                                </div>

                                <div class="btn-group">
                                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                  <ul class="dropdown-menu">
                                    <li>
                                      <a data-edit="fontSize 5">
                                        <p style="font-size:17px">Huge</p>
                                      </a>
                                    </li>
                                    <li>
                                      <a data-edit="fontSize 3">
                                        <p style="font-size:14px">Normal</p>
                                      </a>
                                    </li>
                                    <li>
                                      <a data-edit="fontSize 1">
                                        <p style="font-size:11px">Small</p>
                                      </a>
                                    </li>
                                  </ul>
                                </div>

                                <div class="btn-group">
                                  <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                  <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                  <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                  <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                </div>

                                <div class="btn-group">
                                  <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                  <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                  <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                  <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                </div>

                                <div class="btn-group">
                                  <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                  <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                  <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                  <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                </div>

                                <div class="btn-group">
                                  <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                  <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                </div>
                              </div>

                              <div id="editor" class="editor-wrapper"></div>
                            </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 text-right">
                          <?= $this->Form->button(__('Update'),array('type'=>'submit','id'=>'send','class'=>'btn btn-success')) ?>
                        </div>
                      </div>

                    <?= $this->Form->end() ?>
                    <!-- /compose -->
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <h4>Block</h4>
                    <ul>
                      <li>{{USER_NAME}}</li>
                      <li>{{VERIFICATION_CODE}}</li>
                      <li>{{NAME}}</li>
                      <li>{{NAME}}</li>
                      <li>{{NAME}}</li>
                      <li>{{NAME}}</li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>

<?php
    echo $this->Html->css('CakeAdmin.vendors/google-code-prettify/bin/prettify.min.css',
        ['inline'=>'false']
    );
    echo $this->Html->script('CakeAdmin.vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js',
        ['block'=>'footerScript']
    );
    echo $this->Html->script('CakeAdmin.vendors/jquery.hotkeys/jquery.hotkeys.js',
        ['block'=>'footerScript']
    );
    echo $this->Html->script('CakeAdmin.vendors/google-code-prettify/src/prettify.js',
        ['block'=>'footerScript']
    );
    echo $this->Html->script('CakeAdmin.bootstrap-wysiwyg.js',
        ['block'=>'footerScript']
    );
?>