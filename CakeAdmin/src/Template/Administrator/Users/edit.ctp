<div class="page-title">
              <div class="title_left">
                <h3><?= __('User Edit') ?></h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <?= $this->Form->create($user,['class'=>"form-horizontal form-label-left",'novalidate'=>true]) ?>

                      <div class="item form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('user_group_id', ['options' => $userGroups, 'empty' => 'Select User Group','class'=>'form-control col-md-7 col-xs-12']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('first_name',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('last_name',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('username',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('email',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('email_verified',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('designation',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('phone',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('website',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <?= $this->Form->input('address',['class'=>'form-control col-md-12 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('verification_token',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('registration_step',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('active',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12  col-sm-12  col-xs-12 text-right">
                          <?= $this->Form->button(__('Update'),array('type'=>'submit','id'=>'send','class'=>'btn btn-success')) ?>
                        </div>
                      </div>
                    <?= $this->Form->end() ?>
                    
                  </div>
                </div>
              </div>
            </div>