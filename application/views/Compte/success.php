<meta http-equiv="refresh" content="600">
<?php

$this->load->library('session');
echo "<h4>".$this->session->userdata('username')."</h4>";
echo "<h4>".$this->session->userdata('logged_in')."</h4>";
echo "<h4>".$this->session->userdata('id')."</h4>";
echo "$message";
echo "<h4>".  anchor("logout","Deconnexion")."</h4>";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
