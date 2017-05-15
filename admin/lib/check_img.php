<?php


class Check_img
{

    public $maxSize = '8196394';
    public $folder = '../../img/imgJeux/';
    public $extension;

    public function check($file)
    {

        if (isset($file) && ($file['error'] == 0)) {
            list($width, $height, $type) = getimagesize($file['tmp_name']);
            //vérification dimensions
            if (is_null($type) && $width == 0 && $height == 0) {
                return 'Erreur de dimensions de l\'image.';
            }
            //vérification de l'extension de l'image (JPG, JPEG, PNG)
            if (!in_array($type, array(IMAGETYPE_JPEG, IMAGETYPE_PNG))) {
                return 'Seules les extensions JPEG, JPG et PNG sont autorisées';
            }
            //vérification poid image
            if ($file['size'] > $this->maxSize) {
                return 'le poids du fichier est limité a 8mo';
            }
            //vérification de l'existence du dossier img
            if (!file_exists($this->folder)) {
                return 'Le répertoire est inexistant';
            }
            //Définition de l'extension de l'image
            if ($type == IMAGETYPE_JPEG) {
                $this->extension = '.jpg';
            } elseif ($type == IMAGETYPE_PNG) {
                $this->extension = '.png';
            }
        }
        return true;
    }

    public function upload($date, $file){
        //Définition nom de fichier
        $fichier = $date . $this->extension;
        //Verification upload
        if (move_uploaded_file($file['tmp_name'], $this->folder . $fichier)) {
            $fp = @fopen($this->folder . $fichier, 'r');
            //Vérification de lecture du fichier
            if (!$fp) {
                unlink($this->folder . $fichier);
                return 'Error';
            }
        }
        return $fichier;
    }
}
