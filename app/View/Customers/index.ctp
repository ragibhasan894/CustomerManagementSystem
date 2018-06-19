<?php
    #pr($customers); die();

?>
<html>
<head>

</head>
<body>
<h3>All Customers</h3>
<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Action</th>
    </tr>

    <?php foreach ($customers as $customer): ?>
    <tr>
        <td><?php echo $customer['Customer']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($customer['Customer']['name'],
array('controller' => 'customers', 'action' => 'view', $customer['Customer']['id'])); ?>
        </td>
        <td><?php echo $customer['Customer']['dob']; ?></td>
        <td>
           <?php echo $this->Html->link('Edit',
        array('controller' => 'customers', 'action' => 'edit', $customer['Customer']['id']));?> |

         <?php echo $this->Html->link('Delete',
        array('controller' => 'customers', 'action' => 'delete', $customer['Customer']['id']),
        array('confirm'=>'Are you sure you want to delete this customer?')
        );
        ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($customer); ?>
</table>
<body>
</html>
