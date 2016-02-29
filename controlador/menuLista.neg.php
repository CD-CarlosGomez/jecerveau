<?php	//WHAT TO DO ITEMS AT THE TOP OF THE HTML BODY
if( isset( $rpt ) ) return;  // Don't print menu on reports..
?>



<?







// Check user permissions
include("controlador/permisos.neg.php");

$pipeflag = 0;
if ($s_register_new_tickets == 1) {
  $pipeflag = 1;
  print "<a href=\"$g_base_url/index.php?whattodo=addjob\">$l_addjob</a>\n";
}
if ($s_view_department_tickets == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=viewjobs\">";
  print "$l_viewjobs</a>\n";
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=search\">";
  print "$l_search</a>\n";
}
if ($s_manage_users == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=adduser\">";
  print "$l_adduser</a>\n";
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=modifyuser\">";
  print "$l_modifyuser</a>\n";
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=deleteuser\">";
  print "$l_deleteuser</a>\n";
}
if ($s_add_categories == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=addcategory\">";
  print "$l_addcategory</a>\n";
}
if ($s_delete_categories == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=deletecategory\">";
  print "$l_deletecategory</a>\n";
}

if ($s_add_departments == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=adddepartment\">";
  if ($g_dept_or_comp == 0) {
    print "$l_adddepartment</a>\n";
  }
  else {
    print "$l_addcompany</a>\n";
  }
}
if ($s_delete_departments == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=deletedepartment\">";
  if ($g_dept_or_comp == 0) {
    print "$l_deletedepartment</a>\n";
  }
  else {
    print "$l_deletecompany</a>\n";
  }
}

if ($s_add_parts == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=addparts\">";
  print "$l_addparts</a>\n";
}

if ($s_generate_reports == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=reports\">";
  print "$l_reports</a>\n";
}

if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
print "<a href=\"$g_base_url/index.php?whattodo=preferences\">";
print "$l_preferences</a>\n";

/*
if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
print "<a href=\"$g_base_url/index.php?whattodo=help\">";
print "$l_help</a>\n";
*/

if ($s_add_type == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=addtype\">";
  print "$l_addtype</a>\n";
}
if ($s_update_type == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=modifytype\">";
  print "$l_modifytype</a>\n";
}
if ($s_delete_type == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=deletetype\">";
  print "$l_deletetype</a>\n";
}

if ($s_add_area == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=addarea\">";
  print "$l_add_area</a>\n";
}
if ($s_update_area == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=modifyarea\">";
  print "$l_modify_area</a>\n";
}

if ($s_add_location == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=addlocation\">";
  print "$l_add_location</a>\n";
}
if ($s_update_location == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=modifylocation\">";
  print "$l_modify_location</a>\n";
}

if ($s_add_position == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=addposition\">";
  print "$l_add_position</a>\n";
}
if ($s_update_position == 1) {
  if ($pipeflag == 1) { print " | "; } else { $pipeflag = 1; }
  print "<a href=\"$g_base_url/index.php?whattodo=modifyposition\">";
  print "$l_modify_position</a>\n";
}

?>

| <a href="<?echo $g_base_url;?>/index.php?logout=true"><?echo $l_logout?></a>
]</center><br><br>
