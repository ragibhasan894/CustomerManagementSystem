
        <h3>Add Customer</h3>

        <?php

            echo $this->Form->create('Customer',array('id' => 'add_customer'));
            echo $this->Form->input('Customer.name',array('class'=>'form-control','placeholder'=>'Name'));
            echo $this->Form->input('Customer.dob',array('class'=>'form-control','placeholder'=>'Date of Birth'));
            echo $this->Form->input('Contact.0.phone',array('class'=>'form-control','placeholder'=>'Phone'));
            echo $this->Form->input('Contact.0.email',array('class'=>'form-control','placeholder'=>'Email'));
            echo $this->Form->input('Contact.0.address',array('class'=>'form-control','placeholder'=>'Address'));
            //echo $this->Form->end('Save',array('id'=>'submit'));
            echo $this->Html->link( 'Submit', '#', array('id' => 'submit', 'class' => 'btn btn-primary'));


    echo $this->Js->buffer('

    jQuery(document).ready(function(){

        jQuery("#submit").click(function(){
                     jQuery.ajax({
                        url: "'.Router::url(array(
                                   'controller' => 'customers',
                                   'action'=>'add'
                               )).'",

                        method:"POST",
                        data:jQuery("#add_customer").serialize(),
                        success:function()
                        {

                            jQuery("#add_customer")[0].reset();
                            //window.location = "index";
                        }

                    });
                    //alert("Helo JS!");
        });

    });

'); ?>