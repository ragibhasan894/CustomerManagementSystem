<html>
    <head>

    </head>

    <body>
        <h3>Edit Customer</h3>
        <?php

        echo $this->Form->create('Customer');
        echo $this->Form->input('id',array('type'=>'hidden'));
        echo $this->Form->input('name');
        echo $this->Form->input('dob');
        echo $this->Form->end('Update');

        ?>
    </body>

</html>