<div class="animate form login_form">
          <?php echo $this->Flash->render('auth'); ?>
          <section class="login_content">
            <?php echo $this->Form->create() ?>
              <h1>Create An Account</h1>
                <?php
                  echo $this->Form->input('email',[
                    'placeholder'=>'Email',
                    'label'=>false,
                    'class'=>'form-control',
                    'autofocus'=>true
                    ]
                  );

                  echo $this->Form->input('password',[
                    'placeholder'=>'Password',
                    'label'=>false,
                    'class'=>'form-control'
                    ]
                  );

                  echo $this->Form->input('confirm_password',[
                    'placeholder'=>'Confirm Password',
                    'label'=>false,
                    'class'=>'form-control'
                    ]
                  );
                ?>
              <div>
                <?php echo $this->Html->link('Lost your password?',['controller'=>'users','action'=>'passwordRecovery'],['class'=>'pull-left']) ?>
                <input class="btn btn-success pull-right" value="SignUp" type="submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member?
                  <?php echo $this->Html->link(_('Log In'),['controller'=>'users','action'=>'login'],['class'=>'to_register']) ?>
                </p>
                <div class="clearfix"></div>
              </div>
            <?php echo $this->Form->end() ?>
          </section>
        </div>