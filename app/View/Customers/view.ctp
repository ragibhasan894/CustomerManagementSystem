<h4><?php echo h($customer['Customer']['name']); ?></h4>

<p>Date of Birth: <?php echo $customer['Customer']['dob']; ?></p>
<br>

<?php $i=1; foreach($customer['Contact'] as $contact): ?>
    <p>Phone-<?php echo $i; ?>: <?php echo $contact['phone']; ?></p>
    <p>Email-<?php echo $i; ?>: <?php echo $contact['email']; ?></p>
    <p>Address-<?php echo $i; ?>: <?php echo $contact['address']; ?></p>
    <br>
<?php $i++; endforeach; ?>