<div class="page-title">
              <div class="x_panel">
                <h3><?= __('User Groups') ?></h3>
              </div>
              <div class="title_right"></div>
            </div>

            <div class="clearfix"></div>

            <div id="user-groups-index" class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <?php foreach ($userGroups as $userGroup){ ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="thumbnail">
                            <div class="image view view-first">
                              <i class="user-group-image fa fa-users"></i>
                                <h5><?= h($userGroup->name) ?></h5>
                                <div class="links">
                                  <?php
                                    if ($userGroup->plugin_prefix!='administrator') {
                                      echo $this->Html->link(
                                        '<i class="fa fa-lock"></i> '.__('Permissions'),
                                        ['action' => 'view', $userGroup->id],
                                        [
                                          'escape'=>false,
                                          'class'=>'label label-success'
                                        ]
                                        );
                                    }
                                  ?>
                                  <?= $this->Html->link(
                                    '<i class="fa fa-pencil"></i>'.__('Edit'),
                                    ['action' => 'edit', $userGroup->id],
                                    [
                                      'escape'=>false,
                                      'class'=>'label label-warning'
                                    ]
                                    )
                                  ?>
                                  <?php
                                    if ($userGroup->plugin_prefix!='administrator') {
                                      echo $this->Form->postLink(
                                        '<i class="fa fa-remove"></i>'.__('Delete'),
                                        ['action' => 'delete', $userGroup->id],
                                        [
                                          'confirm' => __('Are you sure you want to delete # {0}?', $userGroup->id),
                                          'escape'=>false,
                                          'class'=>'label label-danger'
                                        ]
                                        );
                                      }
                                  ?>
                                </div>
                            </div>
                            <div class="caption">
                              <?php if ($userGroup->plugin_prefix=='administrator') { ?>
                                <p>
                                  <strong>Permissions </strong>
                                  <span class="label label-info"><?= __('All') ?></span>
                                </p>
                              <?php }else{ ?>
                                <p>
                                  <strong>Permissions </strong>
                                  <span class="label label-info"><?= count($userGroup->user_group_permissions) ?></span>
                                </p>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>

                    <div class="row">
                      <div class="paginator">
                          <ul class="pagination">
                              <?= $this->Paginator->prev('&laquo; ' . __(''),['escape'=>false]) ?>
                              <?= $this->Paginator->numbers() ?>
                              <?= $this->Paginator->next(__('') . ' &raquo;',['escape'=>false]) ?>
                          </ul>
                          <p>Showing <?= $this->Paginator->counter() ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
