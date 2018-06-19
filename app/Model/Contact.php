<?php

class Contact extends AppModel {
    public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer'
        )
    );
}


?>