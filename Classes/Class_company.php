<?php


class Classe_company{

    public $et_email;
    public $et_mdp;
   
    function __construct() {
        
    }
    
    public static function construct3(array $row){
        $instance = new self();

        $instance->et_email = $row['et_email'];
        $instance->et_mdp = $row['et_mdp'];

        return $instance;
    }
     //public static function construct2($etudiant_id, $et_nom, $et_prenom, $et_email, $et_mdp, $et_annee, $et_naissance,$et_tele){

    public static function construct2($et_email, $et_mdp){
        $instance = new self();

        $instance->et_email = $et_email;
        $instance->et_mdp = $et_mdp;

        return $instance;
    }
    
}

