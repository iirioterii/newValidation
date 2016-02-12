<?php

namespace Rioter\Validation\Helpers;


trait ErrorsHelper
{

    public function outputErrors(array $err)
    {
        foreach($err as $fieldName => $errors) {
            foreach($errors as $error){
                echo $error . '<br>';
            }
        }
    }

}