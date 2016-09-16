<?php
  $this->Form->templates([
      'inputContainer' => '<div class="item form-group {{type}}{{required}}">
          {{content}} <span class="help">{{help}}</span></div>'
  ]);
?>
<div class="page-title">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <p>
                        <h3 class="label label-primary">Site Title</h3>
                      </p>
                      <p><?= $settings->site_title ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <p>
                        <h3 class="label label-primary">Site Email</h3>
                      </p>
                      <p><?= $settings->site_email ?></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <p>
                        <h3 class="label label-primary">Email Verification Subject</h3>
                      </p>
                      <p><?= $settings->email_verification_subject ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <p>
                        <h3 class="label label-primary">Email Verification template</h3>
                      </p>
                      <div><?= $settings->email_verification_template ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <p>
                        <h3 class="label label-primary">Footer text</h3>
                      </p>
                      <p><?= $settings->footer_text ?></p>
                  </div>
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