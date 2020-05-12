<?php
class Class_admin{
    // public $ad_id;
    // public $ad_nom;
    // public $ad_prenom;
    public $et_email;
    public $et_mdp;
    // public static  function construct1($ad_id,$ad_nom,$ad_prenom,$et_email,$et_mdp)
    public static  function construct1($et_email,$et_mdp)
    {
        $admin= new self();
        // $admin->ad_id=$ad_id;
        // $admin->ad_nom=$ad_nom;
        // $admin->ad_prenom=$ad_prenom;
        $admin->et_email=$et_email;
        $admin->et_mdp=$et_mdp;
        return $admin;
    }
}