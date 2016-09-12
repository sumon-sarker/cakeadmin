<div class="page-title">
              <div class="title_left">
                <h3><?= __('Basic Information') ?></h3>
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
                                  <small>Update Informations</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'editInformations'
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
                              '<span class="step_no">2</span>
                              <span class="step_descr">
                                  <small>Change Email</small>
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
                                  <small>Change Password</small>
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
                                  <small>Change Picture</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'changePicture'
                              ),
                              array(
                                'escape'=>false,
                                'class'=>'selected'
                              )
                            );
                          ?>
                        </li>
                      </ul>
                    </div>
                    <!-- End SmartWizard Content -->

                    <div class="ln_solid"></div>
                    
                    <div class="clearfix"></div>

                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php echo $this->Html->image('CakeAdmin.users/img.jpg') ?>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="dropzone" action="<?php echo $this->request->here ?>"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php echo $this->Html->css('CakeAdmin.vendors/dropzone/dist/min/dropzone.min',['inline'=>'false']) ?>
<?php echo $this->Html->script('CakeAdmin.vendors/dropzone/dist/min/dropzone.min',['block'=>'footerScript']) ?>