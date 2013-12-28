<div id="data">
<table class="liste_tab">
<tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>     
        <th></th>
  </tr>
<?php foreach ($enseignants as $enseignant){ ?>
  <tr>
  <td><?php echo $enseignant->nom ?> </td> 
  <td><?php echo $enseignant->prenom ?> </td> 
  <td><?php echo $enseignant->email ?> </td> 
  <td><?php echo $enseignant->tel ?> </td> 
   <td>
   <a href="<?php echo base_url(); ?>admin/modifier_utilisateur/enseignant/<?php echo $enseignant->id;  ?>"><img title="Modifier" src="<?php echo base_url();?>assets/img/modify.png" /></a> 
   <a class="supprimer" id="<?php echo $enseignant->id_compte; ?>" href="#"><img title="Supprimer" class="supprimer" src="<?php echo base_url();?>assets/img/delete.png" /> </a> 
   </td>
  </tr>
<?php } ?>
     </table>
</div>
<div id="pagination">
    <?php
    /* Pour la partie de pagination */

    $cur_page = $page;
    $per_page = $nbr_pp;
    $page -= $page;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $msg ="";
    
    /* ---------------------------------- Calcule des valeurs de début et de fin de la boucle ---------------------------------- */
    $no_of_paginations = ceil($nbr_etu / $per_page);
    if ($cur_page >= 7) {
        $start_loop = $cur_page - 3;
        if ($no_of_paginations > $cur_page + 3)
            $end_loop = $cur_page + 3;
        else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
            $start_loop = $no_of_paginations - 6;
            $end_loop = $no_of_paginations;
        }
        else
            $end_loop = $no_of_paginations;
    }
    else {
        $start_loop = 1;
        if ($no_of_paginations > 7)
            $end_loop = 7;
        else
            $end_loop = $no_of_paginations;
    }

    /* ---------------------------------- Calcule des valeurs de début et de fin de la boucle ---------------------------------- */
    
    
    $msg .= "<div class='pagination'><ul>";

	// FOR ENABLING THE FIRST BUTTON
	if($first_btn && $cur_page > 1)
	{
		$msg .= "<li p='1' class='active' onclick='pagin(1)'>l<</li>";
	}
	else if($first_btn)
	{
		$msg .= "<li p='1' class='inactive'>l<</li>";
	}

	// FOR ENABLING THE PREVIOUS BUTTON
	if($previous_btn && $cur_page > 1)
	{
		$pre = $cur_page - 1;
		$msg .= "<li p='$pre' class='active' onclick='pagin($pre)'><<</li>";
	}
	else if($previous_btn)
	{
		$msg .= "<li class='inactive'><<</li>";
	}

	for($i = $start_loop; $i <= $end_loop; $i++)
	{
		if ($cur_page == $i)
			$msg .= "<li p='$i' style='border: 1px solid #76A2B6;color:#fff;background-color:#377393;' onclick='pagin($i)' class='active current'>{$i}</li>";
		else
			$msg .= "<li p='$i' class='active' onclick='pagin($i)'>{$i}</li>";
	}

	// TO ENABLE THE NEXT BUTTON
	if($next_btn && $cur_page < $no_of_paginations)
	{
		$nex = $cur_page + 1;
		$msg .= "<li p='$nex' class='active' onclick='pagin($nex)'>>></li>";
	}
	else if($next_btn)
	{
		$msg .= "<li class='inactive'>>></li>";
	}

	// TO ENABLE THE END BUTTON
	if($last_btn && $cur_page < $no_of_paginations)
	{
		$msg .= "<li p='$no_of_paginations' class='active' onclick='pagin($no_of_paginations)'>>l</li>";
	}
	else if ($last_btn)
	{
		$msg .= "<li p='$no_of_paginations' class='inactive'>>l</li>";
	}
	
	$msg .= (($no_of_paginations>1)?"<label> / ".$no_of_paginations." Pages</label>":"");  // Content for pagination

	// ---------------------------------- Affichage du code ----------------------------------
	
	echo $msg;
        ?>
</div>