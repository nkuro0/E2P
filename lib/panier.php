<?php



class panier
{
    private $dbh;

    public function __construct($dbh)
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
        $this->dbh = $dbh;
    }

    public function add($product_id)
    {
        if (isset($_SESSION['panier'][$product_id])) {
            $_SESSION['panier'][$product_id]++;
        } else {
            $_SESSION['panier'][$product_id] = 1;
        }
    }

    public function count(){
        array_sum($_SESSION['panier']);
    }

    public function del($product_id){
        unset($_SESSION['panier'][$product_id]);
    }
}