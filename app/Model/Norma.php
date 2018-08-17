<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Norma extends AppModel {
    
    public $validate = array(
        'corpo' => array(
          'required' => array(
              'rule' => 'notBlank'
          )
        ),
        'numero' => array(
          'required' => array(
              'rule' => 'notBlank',
              'rule' => 'isUnique',
              'rule' => 'numeric'
          )
        ),
        'data' => array(
          'required' => array(
              'rule' => 'notBlank'
          )
        ),
        'ementa' => array(
          'required' => array(
              'rule' => 'notBlank'
          )
        ),
        'assunto' => array(
          'required' => array(
              'rule' => 'notBlank'
          )
        ),
        'ano' => array(
          'required' => array(
              'rule' => 'notBlank'
          )
        ),
    );
    
    public $belongsTo = array(
        'Tipo' => array(
            'className' => 'Tipo',
            'foreignKey' => 'tipo_id'
        ),
        'Nivel' => array(
            'className' => 'Nivel',
            'foreignKey' => 'nivel_id'
        ));
}