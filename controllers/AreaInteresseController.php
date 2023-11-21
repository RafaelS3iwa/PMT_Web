<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/AreaInteresse.php";
    
class AreaInteresseController
{
    private $areaInteresseModel; 

    public function __construct()
    {
        $this->areaInteresseModel = new AreaInteresse();
    }

    public function listarAreas($id_area_interesse_atual = null){
        $areas = $this->areaInteresseModel->listar(); 

        $options = '<option value="" disabled selected>Selecione uma área</option>';
        foreach($areas as $area){
            $id_area_interesse = $area['id_area_interesse']; 
            $area_interesse = $area['area_interesse']; 
            
            $selected = ($id_area_interesse == $id_area_interesse_atual) ? 'selected' : '';

            $options .= "<option value='$id_area_interesse' $selected>$area_interesse</option>";
        }
        return $options;
    }
}