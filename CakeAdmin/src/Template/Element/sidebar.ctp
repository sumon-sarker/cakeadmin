<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <?php
                echo $this->Html->link(
                  '<i class="fa fa-windows"></i> <span>Cake Admin</span> ',
                  array(
                    'controller'=>'users',
                    'action'=>'index'
                  ),
                  array(
                    'escape'=>false,
                    'class'=>'site_title'
                  )
                );
              ?>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="sidebar_profile">
              <div class="profile_pic text-center">
                <?php
                  echo $this->Html->image(
                    'CakeAdmin.users/img.jpg',
                    array(
                      'class'=>'img-circle profile_img'
                    )
                  )
                ?>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2>Sumon Sarker</h2>
                </div>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3 id="invisible">Sumon Sarker</h3>
                <ul class="nav side-menu">
                  <li class="top-border">
                    <?php
                      echo $this->Html->link(
                        '<i class="fa fa-dashboard"></i> Dashboard ',
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
                  <li><a><i class="fa fa-users"></i>User Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <?php
                          echo $this->Html->link(
                            __('Add New User').' <span class="pull-right fa fa-plus-square"></span>',
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
                            __('Add New User Group').' <span class="pull-right fa fa-plus-square"></span>',
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
                            __('List User Groups').' <span class="pull-right fa fa-th-list"></span>',
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
                            __('User Group Permissions').' <span class="pull-right fa fa-th-list"></span>',
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
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Sidebar</a></li>
                      <li><a href="media_gallery.html">Header</a></li>
                      <li><a href="typography.html">Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
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
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>