<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <?php
                echo $this->Html->link(
                  '<i class="fa fa-heart-o"></i> <span>Cake Admin</span> ',
                  array(
                    'controller'=>'',
                    'action'=>'dashboard'
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
            <?php if($CurrentLoggedInUser['sidebar_photo']){ ?>
              <div class="sidebar_profile">
                <div class="profile_pic text-center">
                  <?php
                    echo $this->Html->image(
                      'CakeAdmin.users/img.jpg',
                      array(
                        'class'=>'img-circle profile_img',
                        'alt'=>$CurrentLoggedInUser['first_name']
                      )
                    )
                  ?>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2><?php echo $CurrentLoggedInUser['first_name'] .' '. $CurrentLoggedInUser['last_name'] ?></h2>
                  </div>
                </div>
              </div>
            <?php } ?>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3 id="invisible"><?php echo $CurrentLoggedInUser['first_name'] .' '. $CurrentLoggedInUser['last_name'] ?></h3>
                <ul class="nav side-menu">
                  <li>
                    <?php
                      echo $this->Html->link(
                        '<i class="fa fa-th-large"></i> Dashboard ',
                        array(
                          'controller'=>'',
                          'action'=>'dashboard'
                        ),
                        array(
                          'escape'=>false
                        )
                      );
                    ?>
                  </li>
                  <li><a><i class="fa fa-users"></i>User Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <?php
                          echo $this->Html->link(
                            __('Add User').' <span class="pull-right fa fa-plus-square"></span>',
                            array(
                              'controller'=>'users',
                              'action'=>'add'
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
                            __('List Users').' <span class="pull-right fa fa-th-list"></span>',
                            array(
                              'controller'=>'users',
                              'action'=>'index'
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
                            __('Add User Group').' <span class="pull-right fa fa-plus-square"></span>',
                            array(
                              'controller'=>'userGroups',
                              'action'=>'add'
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
                            __('List User Groups').' <span class="pull-right fa fa-th-list"></span>',
                            array(
                              'controller'=>'userGroups',
                              'action'=>'index'
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
                            __('Add Group Permission').' <span class="pull-right fa fa-plus-square"></span>',
                            array(
                              'controller'=>'userGroupPermissions',
                              'action'=>'add'
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
                            __('List Group Permissions').' <span class="pull-right fa fa-th-list"></span>',
                            array(
                              'controller'=>'userGroupPermissions',
                              'action'=>'index'
                            ),
                            array(
                              'escape'=>false
                            )
                          );
                        ?>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Site Config</a></li>
                      <li><a href="#">Sidebar</a></li>
                      <li><a href="#">Header</a></li>
                      <li><a href="#">Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li>
                    <?php
                      echo $this->Html->link(
                        '<i class="fa fa-adjust"></i>'.__('Synchronizer'),
                        array(
                          'controller'=>'permissionScanner',
                          'action'=>'index'
                        ),
                        array(
                          'escape'=>false
                        )
                      );
                    ?>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <?php
                echo $this->Html->link(
                  '<span class="fa fa-adjust" aria-hidden="true"></span>',
                  array(
                    'prefix'=>$CurrentLoggedInUser['prefix_routing'],
                    'controller'=>'permissionScanner',
                    'action'=>'index'
                  ),
                  array(
                    'escape'=>false,
                    'data-toggle'=>'tooltip',
                    'data-placement'=>'top',
                    'title'=>'Synchronizer',
                  )
                );
              ?>
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