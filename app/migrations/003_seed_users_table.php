<?php

class Seed_users_table {

    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
    }

    public function up()
    {
        $this->_lava->db->raw("
            INSERT IGNORE INTO users (firstname, lastname, email, username)
            VALUES
                ('Juan', 'Dela Cruz', 'juan.delacruz@example.com', 'juandelacruz'),
                ('Maria', 'Santos', 'maria.santos@example.com', 'mariasantos'),
                ('Pedro', 'Reyes', 'pedro.reyes@example.com', 'pedroreyes'),
                ('Ana', 'Garcia', 'ana.garcia@example.com', 'anagarcia'),
                ('Luis', 'Mendoza', 'luis.mendoza@example.com', 'luismendoza')
        ");
    }

    public function down()
    {
        $this->_lava->db->raw("DELETE FROM users WHERE email IN (
            'juan.delacruz@example.com',
            'maria.santos@example.com',
            'pedro.reyes@example.com',
            'ana.garcia@example.com',
            'luis.mendoza@example.com'
        )");
    }
}
