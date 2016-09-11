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
                                  Step 1<br />
                                  <small>Step 1 description</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'add',
                                'step_one'
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
                                  Step 2<br />
                                  <small>Step 2 description</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'add',
                                'step_two'
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
                              '<span class="step_no">3</span>
                              <span class="step_descr">
                                  Step 3<br />
                                  <small>Step 3 description</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'add',
                                'step_three'
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
                                  Step 4<br />
                                  <small>Step 4 description</small>
                              </span>',
                              array(
                                'controller'=>'users',
                                'action'=>'add',
                                'step_four'
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

                    
                  </div>
                </div>
              </div>
            </div>