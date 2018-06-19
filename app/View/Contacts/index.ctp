<?php
    #pr($contacts); die();

?>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


<h3>All Customers Information</h3>
<?php echo $this->Html->link('Add new customer', '#', array('data-role' => 'add'
)); ?>
<br><br>
<table id='index_table'>
    <thead>
    <tr>
        <th>SL No.</th>
        <th hidden>Contact ID</th>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    <?php $i = 1; foreach ($contacts as $contact): ?>
    <tr class="contacts" id="<?php echo $contact['Contact']['id']; ?>">
        <td><?php echo $i; $i++; ?></td>
        <td data-target="contact_id" hidden><?php echo $contact['Contact']['id']; ?></td>
        <td data-target="customer_id"><?php echo $contact['Customer']['id']; ?></td>
        <td data-target="name"><?php echo $contact['Customer']['name']; ?></td>
        <td data-target="dob"><?php echo $contact['Customer']['dob']; ?></td>
        <td data-target="phone"><?php echo $contact['Contact']['phone']; ?></td>
        <td data-target="email"><?php echo $contact['Contact']['email']; ?></td>
        <td data-target="address"><?php echo $contact['Contact']['address']; ?></td>
        <td><?php echo $this->Html->link('Edit','#',array(
        'data-role' => 'update',
        'data-id' => $contact["Contact"]["id"]
          )); ?> |
          <?php echo $this->Html->link('Delete',array(
                  'controller' => 'contacts',
                   'action' => 'delete',
                    $contact['Contact']['id']
                    ), array('confirm'=>'Are you sure you want to delete?')); ?>
          </td>

    </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<!-- Add Modal -->
    <div id="addModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Customer Information</h4>
              </div>
              <div class="modal-body">

                  <div class="form-group">
                          <form action="" method="post" id="add_customer">
                              <label>Name</label>
                              <input type="text" id="addName" name="name" class="form-control" required><br>

                              <label>Date of Birth</label>
                              <input type="date" id="addDob" name="dob" class="form-control" required><br>

                              <label><h4>Contact Information</h4></label>

                              <table id="form_body" class="table ">
                                  <thead>
                                  <tr>
                                      <th>Phone</th>
                                      <th>Email</th>
                                      <th>Address</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr class="contacts_">
                                      <td><input type="text" name="phone[]" class="form-control phone"></td>

                                      <td><input type="email" name="email[]" class="form-control email"></td>

                                      <td><input type="text" name="address[]" class="form-control address"></td>
                                  </tr>
                                  </tbody>
                              </table>
                              <br>
                              <button type="button" class="btn btn-info" id="add">Add More</button>
                              </br></br></br>
                              <input type="button" class="btn btn-success" id="submit" name="submit" value="Save">
                          </form>
                      </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
<!-- End of Add Modal -->

<!-- Update Modal -->
    <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Customer Information</h4>
              </div>
              <div class="modal-body">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="text" id="dob" class="form-control">
                  </div>

                   <div class="form-group">
                    <label>Email</label>
                    <input type="text" id="email" class="form-control">
                  </div>

                  <div class="form-group">
                      <label>Phone</label>
                      <input type="text" id="phone" class="form-control">
                  </div>

                  <div class="form-group">
                      <label>Address</label>
                      <input type="text" id="address" class="form-control">
                  </div>
                    <input type="hidden" id="userId" class="form-control">
                    <input type="hidden" id="custID" class="form-control">



              </div>
              <div class="modal-footer">
                <a href="#" id="save" class="btn btn-primary pull-right">Save</a>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
<!--End of Update Modal-->

<?php unset($contact); ?>

<script>

    $(document).ready(function() {
        $("#index_table").DataTable();

        var i=1;
                $('#add').click(function(){
                    /*$('tr.contacts_').each(function(){
                        var phone = $(this).find("td").eq(0).find("input").val();
                        var email = $(this).find("td").eq(1).find("input").val();
                        var address = $(this).find("td").eq(2).find("input").val();
                        console.log(phone);
                        console.log(email);
                        console.log(address);
                    });*/
                    i++;
                    $('#form_body').append('<tr class="contacts_" id="row'+i+'"><td><input type="text" name="phone[]" class="form-control phone" placeholder="Phone-'+i+'"/></td><td><input type="email" name="email[]" class="form-control email" placeholder="Email-'+i+'"></td><td><input type="text" name="address[]" class="form-control address" placeholder="Address-'+i+'"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">x</button></td></tr>');

                });
                $(document).on('click', '.btn_remove', function(){
                    var button_id = $(this).attr("id");
                    $('#row'+button_id+'').remove();
                    i--;
                });

        $(document).on("click","a[data-role=update]",function(){
                    var id  = $(this).data("id");
                    var name  = $("#"+id).children("td[data-target=name]").text();
                    var dob  = $("#"+id).children("td[data-target=dob]").text();
                    var email  = $("#"+id).children("td[data-target=email]").text();
                    var phone  = $("#"+id).children("td[data-target=phone]").text();
                    var address  = $("#"+id).children("td[data-target=address]").text();
                    var customer_id  = $("#"+id).children("td[data-target=customer_id]").text();

        //           console.log(id);
                    $("#custID").val(customer_id);
                    $("#name").val(name);
                    $("#dob").val(dob);
                    $("#email").val(email);
                    $("#phone").val(phone);
                    $("#address").val(address);
                    $("#userId").val(id);
                    $("#myModal").modal("toggle");
              });

              // now create event to get data from fields and update in database

               $("#save").click(function(){
                  var id  = $("#userId").val();
                  var name =  $("#name").val();
                  var dob =  $("#dob").val();
                  var email =   $("#email").val();
                  var phone =   $("#phone").val();
                  var address =   $("#address").val();
                  var customer_id =   $("#custID").val();
        //          var customerID = [];

                //console.log(jQuery("#modal_form").serialize());

                  $.ajax({

                      //url      : "Router::url(array('controller'=>'contacts','action'=>'edit'))",
                      url      : "/CakeProject_v2/contacts/edit/id",
                      method   : 'post',
                      //data     : {name : name , dob: dob , email : email , phone : phone , address : address , id: id , customer_id : customer_id},
                      data     : {Contact:{id:id,email:email,phone:phone,address:address,customer_id:customer_id},
                      Customer:{id:customer_id,name:name,dob:dob}},


                      complete  : function(response){
                                console.log(id);
                                    // now update user record in table
                                    $('#'+id).children('td[data-target=name]').text(name);
                                     $('#'+id).children('td[data-target=dob]').text(dob);
                                     $('#'+id).children('td[data-target=email]').text(email);
                                     $('#'+id).children('td[data-target=phone]').text(phone);
                                     $('#'+id).children('td[data-target=address]').text(address);
                                     $('#'+id).children('td[data-target=address]').text(address);
                                     $('#'+id).children('td[data-target=customer_id]').text(customer_id);

                                      $('tr.contacts').each(function(){
                                          //$this = $(this);
                                          //var customerID = [];
        //                                  var customerId = $(this).find(".customer_id").html();
                                          var contactsID = $(this).find("td:first").html();
                                          var customerID = $(this).find("td").eq(1).html();
                                          if(customerID === customer_id) {
        //                                      console.log(customerId);
        //                                      $('#'+customerId).children('td[data-target=name]').text(name);
        //                                      $('#'+customerId).children('td[data-target=dob]').text(dob);
                                              /*var name = $(this).find("td").eq(2).html();
                                              var dob = $(this).find("td").eq(3).html();
                                              console.log(contactsID);
                                              console.log(name);
                                              console.log(dob);*/
                                              $('#'+contactsID).children('td[data-target=name]').text(name);
                                              $('#'+contactsID).children('td[data-target=dob]').text(dob);
                                          }
                                          //console.log(customerId);
                                          //processing this row
                                          //how to process each cell(table td) where there is checkbox
                                          /*$($(this).find('input[name^="line"]').val(

                                              $('$(this).find('input[name^="family"]'').val() + ' ' + // common input(family) on row, use for all table cells(td)
                                          $('#$(this).find('input[name^="size"]'').val() + ', ' + // this cells input called size, unique to this cell only
                                          $('#$(this).find('input[name^="grade"]'').val() // common input(grade) on row, use for all table cells(td)
                                      );*/

        //                                  if(this.customer_id === customer_id) {
        //                                      console.log(this.name);
        //                                      console.log(this.dob);
        //                                  }
                                          // end of cell row processing
                                      });


                                    //var res = JSON.parse(response.responseText);

        //                            for(var x in res) {
        //                                $('#'+res[x].id).children('td[data-target=name]').text(res[x].name);
        //                                $('#'+res[x].id).children('td[data-target=dob]').text(res[x].dob);
        //                                $('#'+res[x].id).children('td[data-target=email]').text(res[x].email);
        //                                $('#'+res[x].id).children('td[data-target=phone]').text(res[x].phone);
        //                                $('#'+res[x].id).children('td[data-target=address]').text(res[x].address);
        //                                $('#'+res[x].id).children('td[data-target=customer_id]').text(res[x].customer_id);
        //                                console.log(res[x].id);
        //                            }
                          $('#myModal').modal('toggle');
                                 }
                  });
               });

               // Add customer

               $(document).on("click","a[data-role=add]",function(){

                    $("#addModal").modal("toggle");
               });


               $('#submit').click(function(){
               //var fd = new FormData(jQuery(this));
                //console.log($('#add_customer').serialize());
                //console.log(fd);
                //console.log(i);
                var name =   $('#addName').val();
                var dob =   $('#addDob').val();
                  //var phone = form.elements["phone"].value;
                   var item = document.getElementsByClassName("phone");
                   var phones = [];
                   for (var j = 0; j < item.length; ++j) {
                       if (typeof item[j].value !== "undefined") {
                           phones.push(item[j].value);
                       }
                   }
                   var item = document.getElementsByClassName("email");
                   var emails = [];
                   for (var j = 0; j < item.length; ++j) {
                       if (typeof item[j].value !== "undefined") {
                           emails.push(item[j].value);
                       }
                   }
                   var item = document.getElementsByClassName("address");
                   var addresses = [];
                   for (var j = 0; j < item.length; ++j) {
                       if (typeof item[j].value !== "undefined") {
                           addresses.push(item[j].value);
                       }
                   }

                   /*console.log(name);
                   console.log(dob);
                   console.log(phones);
                   console.log(emails);
                   console.log(addresses);*/
                   //var customer = {"name":name,"dob":dob,"Contact":""};
                    //var contact = {"phone":"","email":"","address":""};
                   //var temp = [];
                   var customer = {"Customer":{},"Contact":{}};
                   customer["Customer"]["name"] = name;
                   customer["Customer"]["dob"] = dob;
                   var index = 0;
                   $('tr.contacts_').each(function(){
                       var row = {"phone":"","email":"","address":""};
                       var phone = $(this).find("td").eq(0).find("input").val();
                       var email = $(this).find("td").eq(1).find("input").val();
                       var address = $(this).find("td").eq(2).find("input").val();
                       /*row.push(phone);
                       row.push(email);
                       row.push(address);*/
                       row['phone']=phone;
                       row['email']=email;
                       row['address']=address;
                       //contact.push(row);
                       /*customer["Contact"][index]["phone"] = phone;
                       customer["Contact"][index]["email"] = email;
                       customer["Contact"][index]["address"] = address;*/
                       //customer["Contact"] = row;
                       customer["Contact"][index] = row;
                       console.log(index);
                       index++;
                   });
                   /*customer.push(name);
                   customer.push(dob);
                   customer.push(contact);*/
                   //temp['name'] = name;
                   //temp['dob'] = dob;

                   //temp['Contact'] = contact;
                   //customer['Customer']=temp;

                   //var myJsonString = JSON.stringify(customer);

                   console.log(customer);

                           $.ajax({
                               url:"/CakeProject_v2/customers/add",
                               method:"POST",
                               //data:$('#add_customer').serialize(),
                               data:customer,
                               success:function()
                               {
                               console.log('success');
                                   $('#add_customer')[0].reset();
                                   //window.location = "index.php";
                                   //alert('New Customer Added!');
                               }
                           });
                           $("#addModal").modal("toggle");
               });

    });

</script>

