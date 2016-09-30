		<?php if(!empty($NewControllerActions)) { ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <?php foreach ($NewControllerActions as $CA) { ?>
                      <div class="table-responsive">
                      <div class="alert alert-success">
                        <p>New <?= count($CA); ?> actions added!</p>
                      </div>
                        <table class="new-controller-actions table table-bordered projects">
              						<thead>
              							<tr>
              								<th class="text-center">Controller</th>
              								<th class="text-center">Action</th>
              								<th class="text-center">Progress</th>
              								<th class="text-center">Status</th>
              							</tr>
              						</thead>
              						<tbody>
                      			<?php foreach ($CA as $key => $value) { ?>
                                  <tr>
                                    <td><span class="label label-default"><?php echo $value['controller'] ?>Controller</span></td>
                                    <td><span class="label label-success"><?php echo $value['action'] ?>()</span></td>
                                    <td class="project_progress">
                                      <div class="progress progress_sm">
                                        <div style="width: 100%;" class="progress-bar bg-green"></div>
                                      </div>
                                    </td>
                                    <td class="text-center">
                                      <small>100% Complete</small>
                                    </td>
                                  </tr>
                              <?php } ?>
              						</tbody>
                        </table>
                      </div>
                    <?php } ?>
                    <div class="text-right alert">
                      <?php
                        echo $this->Html->link(
                          __('Set Permission'),
                          [
                            'controller'=>'userGroupPermissions'
                          ],[
                            'class'=>'btn btn-success'
                          ]
                        );
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      	<?php }else{ ?>
          <div id="permission-scanner">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
          	        <div style="margin-top:50px" class="alert text-center">
          	          <h5><?= __('No new actions found!') ?></h5>
          	        </div>
                </div>
              </div>
          </div>
        <?php } ?>
