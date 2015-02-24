<div class="page-header">
    <h1>Assistant Prévention Suicide</h1>
</div>


<div class="row">
        <div class="col-md-7">
          <div class="well well-sm">
            <?php echo $this->Form->create('Admins', $this->Form->addClass(null, 'form-horizontal')); ?>
              <fieldset>
                <legend>Connexion</legend>
                <?php // Champs username
                echo $this->Form->input(
                        'Admin.username',
                        array(
                            'div' => array(
                                'class' => 'form-group'
                            ),
                            'label' => array(
                                'text' => 'Identifiant',
                                'class' => 'col-sm-3 control-label',
                            ),
                            'between' => '<div class="col-sm-9">',
                            'after' => '</div>',
                            'required' => true,
                            'placeholder' => 'votre login',
                            'class' => 'form-control'
                        )
                    );
                ?>

                <?php 
                    $helpBlock = '<span class="help-block">
                        <a class="btn btn-link" data-toggle="modal" data-target="#myModal">
                            Mot de passe oublié ?
                        </a>
                        </span>'; ?>

                <?php // Champs password
                echo $this->Form->input(
                        'Admin.password',
                        array(
                            'type' => 'password',
                            'div' => array(
                                'class' => 'form-group'
                            ),
                            'label' => array(
                                'class' => 'col-sm-3 control-label',
                                'text' => 'Mot de passe',
                            ),
                            'between' => '<div class="col-sm-9">',
                            'after' => $helpBlock.'</div>',
                            'required' => true,
                            'placeholder' => 'Votre mot de passe',
                            'class' => 'form-control'
                        )
                    );
                ?>

                <?php // Bouton de connexion
                echo $this->Form->submit(
                        'Se connecter',
                        array(
                            'div' => array(
                                'class' => 'form-group'
                            ),
                            'before' => '<div class="col-sm-offset-3 col-sm-9">',
                            'after' => '</div>',
                            'class' => 'btn btn-primary'
                        )
                    );
                ?>

            </fieldset>
            <?php echo $this->Form->end(); ?>
          </div>
        </div>



        <div class="col-md-5">
          <?php echo $this->Form->create('Admins', $this->Form->addClass(null, 'form-horizontal')); ?>
            <fieldset>
              <legend>Inscription</legend>
              <?php // Champs username
                echo $this->Form->input(
                        'Admin.username',
                        array(
                            'div' => array(
                                'class' => 'form-group'
                            ),
                            'label' => array(
                                'text' => 'Identifiant',
                                'class' => 'col-sm-4 control-label',
                            ),
                            'between' => '<div class="col-sm-8">',
                            'after' => '</div>',
                            'required' => true,
                            'placeholder' => 'votre futur login',
                            'class' => 'form-control'
                        )
                    );
                ?>

                <?php // Champs email
                echo $this->Form->input(
                        'Admin.email',
                        array(
                            'type' => 'email',
                            'div' => array(
                                'class' => 'form-group'
                            ),
                            'label' => array(
                                'text' => 'Email',
                                'class' => 'col-sm-4 control-label',
                            ),
                            'between' => '<div class="col-sm-8">',
                            'after' => '</div>',
                            'required' => true,
                            'placeholder' => 'un@exemple.fr',
                            'class' => 'form-control'
                        )
                    );
                ?>

                <?php // Champs password
                echo $this->Form->input(
                        'Admin.password',
                        array(
                            'type' => 'password',
                            'div' => array(
                                'class' => 'form-group'
                            ),
                            'label' => array(
                                'text' => 'Mot de passe',
                                'class' => 'col-sm-4 control-label',
                            ),
                            'between' => '<div class="col-sm-8">',
                            'after' => '</div>',
                            'required' => true,
                            'placeholder' => 'Votre mot de passe',
                            'class' => 'form-control'
                        )
                    );
                ?>

                <?php // Champs confirmPassword
                echo $this->Form->input(
                        'Admin.confirmPassword',
                        array(
                            'type' => 'Confirmation',
                            'div' => array(
                                'class' => 'form-group'
                            ),
                            'label' => array(
                                'text' => 'Mot de passe',
                                'class' => 'col-sm-4 control-label',
                            ),
                            'between' => '<div class="col-sm-8">',
                            'after' => '</div>',
                            'required' => true,
                            'placeholder' => 'Confirmez votre mot de passe',
                            'class' => 'form-control'
                        )
                    );
                ?>

                <?php // Bouton d'enregistrement
                echo $this->Form->submit(
                        'S\'inscrire',
                        array(
                            'div' => array(
                                'class' => 'form-group'
                            ),
                            'before' => '<div class="col-sm-offset-4 col-sm-8">',
                            'after' => '</div>',
                            'class' => 'btn btn-primary'
                        )
                    );
                ?>
            </fieldset>
          <?php echo $this->Form->end(); ?>
        </div>
      </div>


<!-- Modal forgotten password -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Mot de passe oublié</h4>
          </div>
          <div class="modal-body">
            <p>Si vous avez oublié votre mot de passe, un message peut vous etre envoyer pour vous permettre de le changer.</p>
            <p>Pour cela, Merci d'indiquer votre adresse email dans le formulaire ci-dessous.</p>
            <form class="form-horizontal">
              <fieldset>
              <legend>Formulaire</legend>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Votre email">
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary">Envoyer le mail</button>
          </div>
        </div>
      </div>
    </div>
