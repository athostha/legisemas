<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nivel extends AppModel {
    public $hasMany = array(
            'Norma' => array(
            'className' => 'Norma'
        )
    );
    
}