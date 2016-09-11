<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <?php
                echo $this->Html->link(
                  '<i class="fa fa-heart-o"></i> <span>Cake Admin</span> ',
                  array(
                    'controller'=>'users',
                    'action'=>'dashboard',
                    'prefix'=>$CurrentLoggedInUser['prefix_routing']
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
                  <li class="top-border">
                    <?php
                      echo $this->Html->link(
                        '<i class="fa fa-windows"></i> Dashboard ',
                        array(
                          'controller'=>'users',
                          'action'=>'dashboard',
                          'prefix'=>$CurrentLoggedInUser['prefix_routing']
                        ),
                        array(
                          'escape'=>false
                        )
                      );
                    ?>
                  </li>
                  <li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Sidebar</a></li>
                      <li><a href="#">Header</a></li>
                      <li><a href="#">Footer</a></li>
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