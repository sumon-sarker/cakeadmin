<div class="page-title">
              <div class="x_panel">
                <h3><i class="fa fa-info-circle"></i> <?= __('Update Informations') ?></h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <?php
                            echo $this->Html->link(
                              '<span class="step_no">1</span>
                              <span class="step_descr">
                                  <small>Informations</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'editInformations'
                              ),
                              array(
                                'escape'=>false,
                                'class'=>'selected'
                              )
                            );
                          ?>
                        </li>
                        <li>
                          <?php
                            echo $this->Html->link(
                              '<span class="step_no">2</span>
                              <span class="step_descr">
                                  <small>Email</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'changeEmail'
                              ),
                              array(
                                'escape'=>false
                              )
                            );
                          ?>
                        </li>
                        <li>
                          <?php
                            echo $this->Html->link(
                              '<span class="step_no">3</span>
                              <span class="step_descr">
                                  <small>Password</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'changePassword'
                              ),
                              array(
                                'escape'=>false
                              )
                            );
                          ?>
                        </li>
                        <li>
                          <?php
                            echo $this->Html->link(
                              '<span class="step_no">4</span>
                              <span class="step_descr">
                                  <small>Picture</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'changePicture'
                              ),
                              array(
                                'escape'=>false
                              )
                            );
                          ?>
                        </li>
                        <li>
                          <?php
                            echo $this->Html->link(
                              '<span class="step_no">4</span>
                              <span class="step_descr">
                                  <small>Settings</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'settings'
                              ),
                              array(
                                'escape'=>false
                              )
                            );
                          ?>
                        </li>
                      </ul>
                    </div>
                    <!-- End SmartWizard Content -->

                    <?= $this->Form->create($user,['class'=>"form-horizontal form-label-left",'novalidate'=>true]) ?>

                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('first_name',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('last_name',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?= $this->Form->input('username',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
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
                          <?= $this->Form->input('address',['class'=>'form-control col-md-7 col-xs-12','data-validate-length-range'=>'10','data-validate-words'=>'2']); ?>
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