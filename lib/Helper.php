<?php

class Helper
{
    public function cutString($txt, $id)
    {
        if (strlen($txt) > 250){
            $txt = substr($txt, 0, 250);
            $space = strrpos($txt, ' ');
            $txt = substr($txt, 0, $space);
            $txt .='...';
            return $txt.'<br><a href="?page=news&amp;id='.$id.'"><button class="positive ui button">Lire la suite</button></a>';
        }
        else {
            return $txt;
        }
    }

    public function cutString2($txt, $id)
    {
        if (strlen($txt) > 250){
            $txt = substr($txt, 0, 250);
            $space = strrpos($txt, ' ');
            $txt = substr($txt, 0, $space);
            $txt .='...';
            return $txt.'<br><a href="?page=catalogue&amp;id='.$id.'"><button class="positive ui button">Suite et infos du jeu</button></a>';
        }
        else {
            return $txt;

        }
    }

    public function justcut($txt){
        if (strlen($txt) > 100) {
            $txt = substr($txt, 0, 100);
            $space = strrpos($txt, ' ');
            $txt = substr($txt, 0, $space);
            $txt .= '...';
            return $txt;
        }
        else{
            return $txt;
        }
    }

    // Sécurise les données pour l'envoi du mail
    public static function secure($str) {
        return trim(addslashes(htmlspecialchars(strip_tags($str))));
    }
    // Création du slug
    public static function slug($string)
    {

        //Retire tout les accents de la chaîne;
        $string = strtr($string, ['Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
            'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y']);

        //Conversion des caractères non alphanumérique en tiret
        $string = preg_replace('#[^0-9a-z]#', '-', strtolower($string));
        //Convertion de tirets multiples en tiret unique
        $string = preg_replace('#-{2,}#', '-', $string);
        //Retrait des tirets éventuels de chaque côté de la chaine.
        $string = trim($string, '-');
        return $string;
    }
    public static function verif($level) {
        if (!isset($_SESSION['user']) || $_SESSION['user']->levelUser < $level){
            return header ('location: ../../404.php');
            exit;
        }
    }
}