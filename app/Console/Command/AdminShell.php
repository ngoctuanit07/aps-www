<?php

/**
 * CakePHP AdminShell
 * @author rmonin
 */
class AdminShell extends AppShell {

    const SUCCESS = 0;

    const ERROR = 1;
    
    public $uses = array('Admin');
    
    public $task = array();

    public function main() {
        $this->out('Création du compte Administrateur');
        $this->hr();
        $login = $this->in('Login :');
        $password = $this->in('Mot de passe : ');
        $data = array(
            'Admin' => array(
                'username' => $login,
                'username_canonical' => $login,
                'password' => $password,
                'status' => 'activated',
            ),
        );
        $this->hr();
        $this->Admin->begin();
        $result = $this->Admin->save($data);
        if ($result ) {
            $this->Admin->commit();
            $this->out('<success>Succès</success> Administrateur créé');
            $this->_stop( self::SUCCESS );
        } else {
            $this->Admin->rollback();
            $this->err( '<error>Problème lors de la création de l’administrateur</error>' );
            $this->_stop( self::ERROR );
        }
    }

}
