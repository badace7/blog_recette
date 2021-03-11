<?php
// namespace app\model;

// use PDO;
// use Exception;
// use PDOException;

/**
 * Class Dao permettant la connexion a la base de donnée
 */


 class Dao {

    static private ?PDO $connectBdd = null;

    private const DATA_SERVER_NAME = 'mysql:host=localhost;port=3306;dbname=blog_recette;charset=utf8';
    private const  USERNAME = 'root';
    private const PASSWORD = 'rootdwwm';

    public function __construct() {

        if (is_null(self::$connectBdd)) {

            try {

                $pdo = new PDO(self::DATA_SERVER_NAME, self::USERNAME, self::PASSWORD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo 'Connexion Réussie';

                self::$connectBdd = $pdo;

            } catch (PDOException $e) {

                echo "Erreur : ".$e->getMessage();

            }
        }
    }

    public function pdoConnect() {
        return self::$connectBdd;
    }
 }


 $test = new Dao();
 $test->pdoConnect();


 class ModelLogin extends Dao {


    public function getUser(string $email) {
    

        try {
            $bddConnect = $this->pdoConnect();
    
            $requestLogin = "SELECT * FROM Utilisateur WHERE email_utilisateur=:email";
            $statement = $bddConnect->prepare($requestLogin);
        
            $statement->bindParam('email', $email);
            $statement->execute();
    
            if ($statement->rowCount() == 1) {
                $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'app\entity\User.php');
                return $statement->fetch();       
            }
        } catch (Exception $e) {

            throw new Exception("Error Processing Request BRO", 1);
            
        }
    }

    public function newUser(string $email, string $password, string $pseudo, string $nom, string $prenom) {
        try {
            $bddConnect = $this->pdoConnect();

            $requestNew = "INSERT INTO Utilisateur (`email_utilisateur`,`password_utilisateur`,`pseudo_utilisateur`,`nom_utilisateur`,`prenom_utilisateur`,`role_utilisateur`)
            VALUES (:email, :password, :pseudo, :nom, :prenom, :role)";

            $password = password_hash($password, PASSWORD_BCRYPT);
            $role = 'ROLE_USER';
            
            $statement = $bddConnect->prepare($requestNew);
            $statement->bindParam('email', $email);
            $statement->bindParam('password', $password);
            $statement->bindParam('pseudo', $pseudo);
            $statement->bindParam('nom', $nom);
            $statement->bindParam('prenom', $prenom);
            $statement->bindParam('role', $role);
            $statement->execute();

            
        } catch (Exception $e) {
            throw new Exception("Error Request", 1);
        }
}
    }

    class User {

        private $id_utilisateur;
        private $email_utilisateur;
        private $password_utilisateur;
        private $pseudo_utilisateur;
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $role_utilisateur;
    
       
        function __construct($email_utilisateur = '', $password_utilisateur = '', $pseudo_utilisateur = '', $nom_utilisateur = '', $prenom_utilisateur = '')
        {   
            $this->id_utilisateur = 0;
            $this->email_utilisateur = $email_utilisateur;
            $this->password_utilisateur = $password_utilisateur;
            $this->pseudo_utilisateur = $pseudo_utilisateur;
            $this->nom_utilisateur = $nom_utilisateur;
            $this->prenom_utilisateur = $prenom_utilisateur;
            $this->role_utilisateur = 'ROLE_USER';
        }
    
    
        /**
         * Get the value of id_utilisateur
         */ 
        public function getId_utilisateur()
        {
            return $this->id_utilisateur;
        }
    
        /**
         * Set the value of id_utilisateur
         *
         * @return  self
         */ 
        public function setId_utilisateur($id_utilisateur)
        {
            $this->id_utilisateur = $id_utilisateur;
    
            return $this;
        }
    
        /**
         * Get the value of email_utilisateur
         */ 
        public function getEmail_utilisateur()
        {
            return $this->email_utilisateur;
        }
    
        /**
         * Set the value of email_utilisateur
         *
         * @return  self
         */ 
        public function setEmail_utilisateur($email_utilisateur)
        {
            $this->email_utilisateur = $email_utilisateur;
    
            return $this;
        }
    
        /**
         * Get the value of password_utilisateur
         */ 
        public function getPassword_utilisateur()
        {
            return $this->password_utilisateur;
        }
    
        /**
         * Set the value of password_utilisateur
         *
         * @return  self
         */ 
        public function setPassword_utilisateur($password_utilisateur)
        {
            $this->password_utilisateur = $password_utilisateur;
    
            return $this;
        }
    
        /**
         * Get the value of pseudo_utilisateur
         */ 
        public function getPseudo_utilisateur()
        {
            return $this->pseudo_utilisateur;
        }
    
        /**
         * Set the value of pseudo_utilisateur
         *
         * @return  self
         */ 
        public function setPseudo_utilisateur($pseudo_utilisateur)
        {
            $this->pseudo_utilisateur = $pseudo_utilisateur;
    
            return $this;
        }
    
        /**
         * Get the value of nom_utilisateur
         */ 
        public function getNom_utilisateur()
        {
            return $this->nom_utilisateur;
        }
    
        /**
         * Set the value of nom_utilisateur
         *
         * @return  self
         */ 
        public function setNom_utilisateur($nom_utilisateur)
        {
            $this->nom_utilisateur = $nom_utilisateur;
    
            return $this;
        }
    
        /**
         * Get the value of prenom_utilisateur
         */ 
        public function getPrenom_utilisateur()
        {
            return $this->prenom_utilisateur;
        }
    
        /**
         * Set the value of prenom_utilisateur
         *
         * @return  self
         */ 
        public function setPrenom_utilisateur($prenom_utilisateur)
        {
            $this->prenom_utilisateur = $prenom_utilisateur;
    
            return $this;
        }
    
        /**
         * Get the value of role_utilisateur
         */ 
        public function getRole_utilisateur()
        {
            return $this->role_utilisateur;
        }
    
        /**
         * Set the value of role_utilisateur
         *
         * @return  self
         */ 
        public function setRole_utilisateur($role_utilisateur)
        {
            $this->role_utilisateur = $role_utilisateur;
    
            return $this;
        }
    }
    
$test = new User('email', 'password', 'pseudo', 'nom', 'prenom');

var_dump($test);


    $test = new ModelLogin();

    




    // $test = new ModelLogin();
    // $test = $test->getUser('admin@afpa.fr');

    // $_SESSION['user'] = $test;

    // extract($_SESSION['user']);




    // var_dump($role_utilisateur);


    // // if (password_verify($password, $test['password_utilisateur'])) {
    // //     echo 'Mot de passe valide !';
    // // }   else {
    // //     echo 'Mot de passe non valide :/ ! ';
    // // }
    