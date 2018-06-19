<?php

class Customer extends AppModel {

    public $hasMany = array(
        'Contact' => array(
            'className' => 'Contact',
            'foreignKey' => 'customer_id',
            'dependent' => true
        )
    );

}



?>