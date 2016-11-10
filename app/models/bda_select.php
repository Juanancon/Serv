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


    function CreaSelect($name, $opciones, $valorDefecto=''){
        $html="\n".'<select name="'.$name.'">';
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




