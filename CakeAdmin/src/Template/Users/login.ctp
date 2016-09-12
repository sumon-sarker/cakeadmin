<div class="animate form login_form">
          <?php echo $this->Flash->render('auth'); ?>
          <section class="login_content">
            <?php echo $this->Form->create() ?>
              <h1>User Login</h1>
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
                ?>
              <div>
                <?php echo $this->Html->link('Lost your password?',[],['class'=>'pull-left']) ?>
                <input class="btn btn-default pull-right" value="Log in" type="submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create a Free Account </a>
                </p>
                <div class="clearfix"></div>
              </div>
            <?php echo $this->Form->end() ?>
          </section>
        </div>