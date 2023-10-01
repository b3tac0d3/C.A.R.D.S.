Automated Concise Effortless SQL

By b3tac0d3 Created: December 2022

map (Meat And Potatoes)

- Map directory holds all working classes
- Config file is setup to accept data from any source or can be hard coded
- Will be setup to integrate directly in to Cinque by b3tac0d3

Config File
===
    - Config file automatically loaded from ~/src/app/plugins/aces/config.php
    - Uses constants to define database structure and log files
    - Default log files are located under aces/logs/
        - Custom log files can be used by change log file path constants
        - If log file doesn't exist but is called, it will be created

Database Connection (db.php)
===
    - Loads config file automatically if constants aren't defined

Queries
===
    - All functions can be chained
    - Default select is all columns (*)
    - Default return is all rows fetchAll(PDO::FETCH_ASSOC)

Methods
===

select($table, $alias = null)
---
    $table | String | Primary table name

    $alias (Optional) | String | Primary table alias

    Runs a select query on the primary table after all other paramters have been set. Can be run at end of method chain.

insert($table)
---
    $table | String | Primary table name

    Runs an insert query on the primary table. Can be chained with other methods.

update($table)
---
    $table | String | Primary table name

    Runs an update query on the primary table. Can be chained with other methods. 

delete($table)
---
    $table | String | Primary table

    Runs a delete query on the primary table. Can be chained with other methods.

custom($query, $params = array())
---
    $query | String | Full query to be exectuded including bound variables.

    $params (Optional) | Array | Execute array of bound parameters and corresponding variables

get_results()
---
    Returns query results from last run select query. Can use instead of assigning query to variable in run script.

set_join($table, $alias = null, $ons_array = array(), $type = "INNER")
---
    $table | String | Name of table to join

    $alias | String | Alias name of table to join
    
    $ons_array | Array | Relational reference for table joins using aliasing for primary and join tables.
    
    $type | String | Required. Default to inner join. All join types are possible here.

    Multiple joins can be used in a single query. Joins are reliant on aliasing and will fail if aliases are not used correctly in the $ons_array. More error reporting will be added in future releases.

set_where($column, $value, $operator = "=", $logical_operator = "AND ")
---
    $column
    $value
    $operator
    $logical_operator
