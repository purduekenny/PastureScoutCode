    <h2>Leaser Information</h2>
    <p><strong>Name:</strong> 
        <?php echo isset($user['first_name']) ? $user['first_name'] : 'No name'?>  
        <?php echo isset($user['last_name']) ? $user['last_name'] : ''?>
    </p>
    <p><strong>Email:</strong> 
        <?php echo isset($user['email']) ? $user['email'] : 'Not specified'?> </p>



