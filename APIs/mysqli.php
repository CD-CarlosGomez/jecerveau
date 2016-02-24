<?php 
class api_mysqli {
/* Propiedades */
public $affected_rows;//int 
public $client_info;//string
public $client_version;//string
public $connect_errno;//string
public $connect_error;//string
public $errno;//int
public $error_list=array();
public $error;//string
public $field_count;//int
public $client_version;//int
public $host_info;//string
public $protocol_version;//String
public $server_info;//string
public $server_version;//int
public $info;//string
public $insert_id;//mixed
public $sqlstate;//string
public $thread_id;//int
public  $warning_count;//int
/* Métodos */
//function __construct ($string_host = ini_get("mysqli.default_host") , $string_username = ini_get("mysqli.default_user") , string $passwd = ini_get("mysqli.default_pw") , string $dbname = "" , int $port = ini_get("mysqli.default_port") [, string $socket = ini_get("mysqli.default_socket") ]]]]]] );
function bool_autocommit ( bool $mode );
function bool_change_user ( $user="" , $password="" , $database="" );
function string_character_set_name ();
function bool_close ();
function bool_commit ();
function bool_debug ( $message="" );
function bool_dump_debug_info ();
function object_get_charset ();
function string_get_client_info ();
function bool_get_connection_stats ();
function mysqli_warning_get_warnings ();
function mysqli_init ();
function bool_kill ($processid=0 );
function bool_more_results ();
function bool_multi_query ($query="");
function bool_next_result ();
function bool_options ( $option=0 , $value="mixed");
function bool_ping ();
//function int_poll( array &$read , array &$error , array &$reject ,  [$sec=0  ,  $usec=1] );
function mysqli_stmt_prepare ( $query="" );
//function mixed_query ( string $query [, int $resultmode = MYSQLI_STORE_RESULT ] )
//function bool real_connect ([ string $host [, string $username [, string $passwd [, string $dbname [, int $port [, string $socket [, int $flags ]]]]]]] )
function string_escape_string ($escapestr="" );
function bool_real_query ( $query="" );
public function mysqli_result_reap_async_query ();
public function bool_refresh ($options=0);
function bool_rollback ();
function int_rpl_query_type ($query="" );
function bool_select_db ($dbname="" );
function bool_send_query ($query="" );
function bool_set_charset ($charset="");
function bool_set_local_infile_handler ( $link="obj" , $read_func="callable" );
function bool_ssl_set ($key , $cert , $ca , $capath , $cipher );
function string_stat ();
function mysqli_stmt_stmt_init ();
function mysqli_result_store_result ();
function mysqli_result_use_result ();
}
?>