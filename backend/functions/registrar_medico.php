<?php

    function registrarMedico($cedula, $name, $lastname, $ages, $address, $cellphone, $email, $sex, $specialty, $collegiate) {

        $query = " INSERT INTO medicos(cedula_medico, nombre, apellido, edad, direccion, telefono, correo, sexo, especialidad, n_colegiado) 
            VALUES ('$cedula', '$name', '$lastname', '$ages', '$address', '$cellphone', '$email', '$sex', '$specialty', '$collegiate')";

        return $query;
        
    }

?>