<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <?php
                echo $this->Html->link(
                  '<i class="fa fa-heart-o"></i> <span>Cake Admin</span> ',
                  array(
                    'controller'=>'users',
                    'action'=>'dashboard',
                    'prefix'=>$CakeAdminUser['prefix_routing']
                  ),
                  array(
                    'escape'=>false,
                    'class'=>'site_title'
                  )
                );
              ?>
            </div>

            <div class="clearfix"></div>
            <!-- SIDEBAR PHOTO -->
            <?php
              $display = '';
              if(!$CakeAdminUser['sidebar_profile_photo']){
                $display = 'style="display:none"';
              }
            ?>
              <div class="sidebar_profile">
                <div <?= $display ?> class="profile_pic text-center">
                  <?php
                    echo $this->Html->image(
                      'CakeAdmin.'.$CakeAdminUser['photo'],
                      array(
                        'class'=>'img-circle profile_img',
                        'alt'=>$CakeAdminUser['first_name']
                      )
                    )
                  ?>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2><?php echo $CakeAdminUser['first_name'] .' '. $CakeAdminUser['last_name'] ?></h2>
                  </div>
                </div>
              </div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3 id="invisible"><?php echo $CakeAdminUser['first_name'] .' '. $CakeAdminUser['last_name'] ?></h3>
                <ul class="nav side-menu">
                  <li class="top-border">
                    <?php
                      echo $this->Html->link(
                        '<i class="fa fa-th-large"></i> Dashboard ',
                        array(
                          'controller'=>'users',
                          'action'=>'dashboard',
                          'prefix'=>$CakeAdminUser['prefix_routing']
                        ),
                        array(
                          'escape'=>false
                        )
                      );
                    ?>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Edit Profile <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <?php
                          echo $this->Html->link(
                            __('Update Informations').' <span class="pull-right fa fa-info-circle"></span>',
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
                            __('Change Email').' <span class="pull-right fa fa-envelope-o"></span>',
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
                            __('Change Password').' <span class="pull-right fa fa-lock"></span>',
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
                            __('Change Picture').' <span class="pull-right fa fa-file-image-o"></span>',
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
                            __('Settings').' <span class="pull-right fa fa-cogs"></span>',
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
                  </li>
                  <li><a><i class="fa fa-wechat"></i> Messages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Unread Messages</a></li>
                      <li><a href="#">All Messages</a></li>
                      <li><a href="#">New Message</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>

              <?php
                echo $this->Html->link(
                  '<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>',
                  array(
                    'prefix'=>false,
                    'controller'=>'users',
                    'action'=>'login'
                  ),
                  array(
                    'escape'=>false,
                    'data-toggle'=>'tooltip',
                    'data-placement'=>'top',
                    'title'=>'Lock Screen',
                  )
                );
              ?>

              <?php
                echo $this->Html->link(
                  '<span class="glyphicon glyphicon-off" aria-hidden="true"></span>',
                  array(
                    'prefix'=>false,
                    'controller'=>'users',
                    'action'=>'logout'
                  ),
                  array(
                    'escape'=>false,
                    'data-toggle'=>'tooltip',
                    'data-placement'=>'top',
                    'title'=>'Logout',
                  )
                );
              ?>
            </div>
            <!-- /menu footer buttons -->
          </div>