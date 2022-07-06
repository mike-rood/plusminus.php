<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Modules\Core\Views\Body;

/**
 * Description of PageBody
 *
 * @author mihej
 */
class BodyView {
    
    public function getBody() {
        include 'Header/Auth/authTemplate.php';
    }
    
}
