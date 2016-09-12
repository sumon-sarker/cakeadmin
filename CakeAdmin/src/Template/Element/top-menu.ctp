<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-reorder"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php
                      echo $this->Html->image(
                        'CakeAdmin.users/img.jpg',
                        array(
                          'alt'=>$CurrentLoggedInUser['first_name']
                        )
                      )
                    ?>
                    <?php echo $CurrentLoggedInUser['first_name'] .' '. $CurrentLoggedInUser['last_name'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <?php
                        echo $this->Html->link(
                          'Profile',
                          array(
                            'controller'=>'users',
                            'action'=>'profile',
                            $CurrentLoggedInUser['id']
                          )
                        );
                      ?>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <?php
                        echo $this->Html->link(
                          'Help',
                          array(
                            'controller'=>'users',
                            'action'=>'index'
                          )
                        );
                      ?>
                    </li>
                    <li>
                      <?php
                        echo $this->Html->link(
                          '<i class="fa fa-sign-out pull-right"></i> Log Out',
                          array(
                            'prefix'=>false,
                            'controller'=>'users',
                            'action'=>'logout'
                          ),
                          array(
                            'escape'=>false
                          )
                        );
                      ?>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image">
                          <?php
                            echo $this->Html->image(
                              'CakeAdmin.users/img.jpg',
                              array(
                                'alt'=>'Profile Image'
                              )
                            )
                          ?>
                        </span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                          <?php
                            echo $this->Html->image(
                              'CakeAdmin.users/img.jpg',
                              array(
                                'alt'=>'Profile Image'
                              )
                            )
                          ?>
                        </span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>