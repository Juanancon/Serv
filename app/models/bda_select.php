<?php

include_once 'bda_sg.php';

// Funciones propias de la base

    function ListaProvincias() {

        /*Creamos la instancia del objeto. Ya estamos conectados*/
        $bd=Db::getInstance();

        /*Creamos una query sencilla*/
        $sql='SELECT * FROM TBL_PROVINCIAS';

        /*Ejecutamos la query ASI DEBERIA FUNCIONAR */
        $bd->Consulta($sql);

        $provincias=[];

        /*Realizamos un bucle para ir obteniendo los resultados*/
        while ($reg=$bd->LeeRegistro()) {
            $provincias[$reg['cod']]=$reg['nombre'];
        }

        return $provincias;
    }

    function devuelveProvincia($cod){

    $bd = Db::getInstance();
    $sql='SELECT * FROM tbl_provincias WHERE cod = "'.$cod.'";';

    $rs=$bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    $reg=$bd->LeeRegistro($rs);

        return $reg["nombre"];

    }


    function CreaSelect($name, $opciones, $valorDefecto=''){
        $html="\n".'<select name="'.$name.'" class="custom-select">';
        foreach($opciones as $value=>$text)
        {
            if ($value==$valorDefecto)
                $select='selected="selected"';
            else
                $select="";
            $html.= "\n\t<option value=\"$value\" $select>$text</option>";
        }
        $html.="\n</select>";

        return $html;
    }

function CreaRadio($name, $opciones, $valorDefecto=''){

    $html="\n";

    foreach($opciones as $value=>$text)
    {
        if ($value==$valorDefecto)
            $checked='checked="checked"';
        else
            $checked="";

        $html.= "\t<input type=\"radio\" name=\"$name\" value=\"$value\" $checked> $text";

    }

    $html.="\n";

    return $html;
}

    //Intentaremos que el campo lo saque readonly, revisar
function CreaSelectPSICO($name, $opciones, $valorDefecto=''){
    $html="\n".'<select name="'.$name.'" class="custom-select" readonly>';
    foreach($opciones as $value=>$text)
    {
        if ($value==$valorDefecto)
            $select='selected="selected"';
        else
            $select="";
        $html.= "\n\t<option value=\"$value\" $select readonly=''>$text</option>";
    }
    $html.="\n</select>";

    return $html;
}




