    <?php
        $firstName = array(
            'name'        => 'firstName',
            'id'          => 'firstName',
            'value'       => 'First Name',
            'maxlength'   => '50',
            'style'       => 'width:50%',
        );

        $lastName = array(
            'name'        => 'lastName',
            'id'          => 'lastName',
            'value'       => 'Last Name',
            'maxlength'   => '100',
            'style'       => 'width:50%',
        );

        $email = array(
            'name'        => 'email',
            'id'          => 'email',
            'value'       => 'email',
            'maxlength'   => '100',
            'style'       => 'width:50%',
        );

        $zipCode = array(
            'name'        => 'zipCode',
            'id'          => 'zipCode',
            'value'       => 'zipCode',
            'maxlength'   => '7',
            'style'       => 'width:50%',
        );

        $button = array(
            'name' => 'submit',
            'id' => 'submit',
            'value' => 'Join Now',
            'content' => 'Join Now'
        );

        echo form_open('register/submit');
        echo form_input($firstName);
        echo form_input($lastName);
        echo form_input($email);
        echo form_input($zipCode);
        echo form_button($button);
        echo form_close();
?>