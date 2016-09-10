<?php
function getActiveInaction($status=0){
  $tag = '<span class="label label-danger"><i class="fa fa-close"> Inactive</i></span>';
  if ($status) {
    $tag = '<span class="label label-success"><i class="fa fa-check-circle-o"> Active</i></span>';
  }
  return $tag;
}
?>
<div class="page-title user_profile_list">
              <div class="title_left">
                <h3><?php echo __('All Users') ?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                  <ul class="nav navbar-right panel_toolbox">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-sort"></i> Sort Result by</a>
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
                      <?php foreach ($users as $user){ #var_dump($user)?>
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                          <div class="well profile_view">
                            <?php echo getActiveInaction($user->active); ?>
                            <div class="col-xs-12 text-center">
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
                            <div class="col-sm-12">
                              <div class="left col-xs-12">
                                <h2><?= h($user->full_name) ?></h2>
                                <p><strong>Designation: </strong> <?= __($user->designation) ?> </p>
                                <ul class="list-unstyled">
                                  <li><i class="fa fa-mobile-phone"></i> Phone #: <?= __($user->phone) ?></li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-xs-12 bottom text-right">
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
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="paginator">
                    <p>Showing <?= $this->Paginator->counter() ?></p>
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('Prev')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('Next') . ' >') ?>
                    </ul>
                </div>
              </div>
            </div>
