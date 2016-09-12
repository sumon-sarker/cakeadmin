<?php
function getActiveInaction($status=0){
  $tag = '<span class="label label-danger  pull-right"><i class="fa fa-close"> Inactive</i></span>';
  if ($status) {
    $tag = '<span class="label label-success pull-right"><i class="fa fa-check-circle-o"> Active</i></span>';
  }
  return $tag;
}
?>
<div class="page-title user_profile_list">
              <div class="title_left">
                <h3><i class="fa fa-users"></i> <?php echo __('All Users') ?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-sort"></i> <?= __('Sort By') ?></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><?= $this->Paginator->sort('user_group_id') ?></li>
                        <li><?= $this->Paginator->sort('first_name') ?></li>
                        <li><?= $this->Paginator->sort('last_name') ?></li>
                        <li><?= $this->Paginator->sort('username') ?></li>
                        <li><?= $this->Paginator->sort('created') ?></li>
                        <li><?= $this->Paginator->sort('modified') ?></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12"></div>
                      <div class="clearfix"></div>
                      <?php foreach ($users as $user){ #var_dump($user)?>
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                          <div class="well profile_view">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <p>
                              <span class="label label-info pull-left"><?php echo $user->user_group->name ?></span>
                              <?php echo getActiveInaction($user->active); ?>
                            </p>
                            <hr/>
                            </div>
                            <div class="col-xs-12 col-md-4">
                              <?php
                                echo $this->Html->image(
                                  'CakeAdmin.users/img.jpg',
                                  array(
                                    'class'=>'img-circle img-responsive',
                                    'alt'=>$user->full_name,
                                  )
                                )
                              ?>
                            </div>
                            <div class="col-xs-12 col-md-8">
                              <h2><?= h($user->full_name) ?></h2>
                              <p><?= __($user->designation) ?> </p>
                              <p><i class="fa fa-mobile-phone"></i> Phone: <?= __($user->phone) ?></p>
                            </div>

                            <div class="col-xs-12 bottom">
                              <div class="col-xs-12 col-sm-12 emphasis">
                                <?php
                                  echo $this->Html->link('<i class="fa fa-edit"> </i> '.__('Edit'),
                                    array(
                                      'action' => 'edit',
                                      $user->id
                                    ),
                                    array(
                                      'class'=>'btn btn-info btn-xs',
                                      'escape'=>false
                                    )
                                  )
                                ?>

                                <?php
                                  echo $this->Form->postLink(
                                    '<i class="fa fa-remove"> </i> '.__('Delete'),
                                    array(
                                      'action' => 'delete',
                                      $user->id
                                    ),
                                    array(
                                      'confirm'=>__('Are you sure you want to delete # {0}?',
                                        $user->id
                                      ),
                                      'class'=>'btn btn-danger btn-xs',
                                      'escape'=>false
                                    )
                                  )
                                ?>

                                <?php
                                  echo $this->Html->link('<i class="fa fa-eye"> </i> '.__('View Profile'),
                                    array(
                                      'action' => 'view',
                                      $user->id
                                    ),
                                    array(
                                      'class'=>'btn btn-primary btn-xs',
                                      'escape'=>false
                                    )
                                  )
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="row">
                      <div class="paginator">
                          <ul class="pagination">
                              <?= $this->Paginator->prev('&laquo; ' . __(''),array('escape'=>false)) ?>
                              <?= $this->Paginator->numbers() ?>
                              <?= $this->Paginator->next(__('') . ' &raquo;',array('escape'=>false)) ?>
                          </ul>
                          <p>Showing <?= $this->Paginator->counter() ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
