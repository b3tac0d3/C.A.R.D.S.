<?php

/* 
    This is an optional use file.
    
    If you're going to use active status to track records in the database, this is the file that automatically logs
    the record life and edits in the database log tables.

    To shut this file off, you can change the setttings in aces/config.php
*/
namespace aces;

class query_audits{
/*==================================================================================================================
    Database Audit Logging
==================================================================================================================*/

private function audit_db_record_create($table, $record_id){
    if(empty($_SESSION)) session_start();
    $user_id = $_SESSION["user_session"]["user_id"] ?? null;
    $insert_cols = ["rec_table_name", "rec_row_id", "create_date", "create_ip", "create_id", "create_sess_id"];
    $insert_vals = [$table, $record_id, date("Y-m-d h:i:s"), $_SERVER["REMOTE_ADDR"], $user_id, $_SESSION["fnd"]["id"]];
    $db = new query();
    $db -> set_insert_array($insert_cols, $insert_vals) -> insert("log_record_life");
    return $this;
} // audit_db_record_create()

private function audit_db_record_edit(){} // audit_db_record_edit()

private function audit_db_record_delete($table, $record_id){
    if(empty($_SESSION)) session_start();
    $user_id = $_SESSION["user_session"]["user_id"] ?? null;
    $update_cols = ["rec_table_name", "rec_row_id", "kill_date", "kill_ip", "kill_id", "kill_sess_id"];
    $update_vals = [$table, $record_id, date("Y-m-d h:i:s"), $_SERVER["REMOTE_ADDR"], $user_id, $_SESSION["fnd"]["id"]];
    $db = new query();
    $db -> set_update_array($update_cols, $update_vals) -> set_where_array(["rec_table_name", "rec_row_id"], [$table, $record_id]) -> update("log_record_life");
    return $this;
} // audit_db_record_delete()

} // class query_audits
?>