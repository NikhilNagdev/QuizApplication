class AbstractModel

{

protected $table = ”;

protected $fields = array();

protected $validation = array();

protected $error_prefix = ‘<p>’;

    protected static $instance = NULL;

    protected $ci = NULL;

    protected $db = NULL;


    // Factory method that creates a singleton model object

    public static function factory($model)

    {

    if (self::$instance == NULL)

    {

    $model = ucfirst($model);

    self::$instance = new $model;

    }

    return self::$instance;

    }


    // Constructor

    public function __construct()

    {

    $this->ci = & get_instance();

    $this->db = $this->ci->db;

    $table = strtolower(get_class($this)) . ‘s’;

    if ($this->db->table_exists($table))

    {


    $this->table = $table;
    $this->fields = $this->db->field_names($this->table);

    }

    else

    {

    return;

    }

    }

    // Sets a new property for the model

    function __set($property, $value)

    {

    if(in_array($property, array_merge($this->fields, array(‘error’, ‘result’)), TRUE))

    {

    $this->$property = $value;

    }

    }


    // Gets the value of an existing property of the model

    function __get($property)

    {

    if(isset($this->$property))

    {

    return $this->$property;

    }

    return NULL;

    }


    // Fetches rows from specified table

    public function fetch($limit = NULL, $offset = NULL)

    {

    $data = array();

    foreach ($this->fields as $field)

    {

    if (isset($this->$field) AND $this->$field != ”)

    {

    $data[$field] = $this->$field;

    }

    }

    $query = !empty($data) ? $this->db->get_where($this->table, $data, $limit, $offset) : $this->db->get($this->table,
    $limit, $offset);

    if ($query->num_rows() > 0)

    {

    $this->result = $query->result();

    return $this;

    }

    $this->error = ‘No rows were returned.’;

    return FALSE;

    }


    // Inserts a new row into the specified database table

    public function save()

    {

    $data = array();

    foreach ($this->fields as $field)

    {

    if (isset($this->$field))

    {

    $data[$field] = $this->$field;


    }

    }

    // if there is any data available go ahead and save/update row

    if( !empty($data))

    {

    // validate input data

    if ($this->validate($data) === FALSE)

    {

    $this->error = $this->get_error_string();

    return FALSE;

    }

    // if id property has been set in the controller update existing row

    if ( !empty($this->id))

    {

    // Update existing record

    $this->db->where(‘id’, $this->id);

    $this->db->update($this->table, $data);

    }

    else

    {

    // otherwise insert new row

    $this->db->insert($this->table, $data);

    $this->id = $this->db->insert_id();

    }

    return TRUE;

    }

    $this->error = ‘No valid data was provided to save row.’;

    return FALSE;

    }


    // Deletes a row

    public function delete()

    {

    if (isset($this->id))

    {

    $this->db->where(‘id’, $this->id);

    $this->db->delete($this->table);

    return TRUE;

    }

    $this->error = ‘Error deleting row.’;

    return FALSE;

    }


    // Builds SELECT part of the query

    public function select($select = ‘*’, $protect_identifiers = TRUE)

    {

    if ($select != ‘*’ AND !empty($select))

    {

    $select = explode(‘,’, $select);

    foreach ($select as $key => $field)

    {

    if ( !in_array($field, $this->fields, TRUE))

    {

    unset($select[$key]);

    }

    }

    $select = !empty($select) ? $select : ‘*’;

    }

    $this->db->select($select, $protect_identifiers);

    return $this;

    }


    // Builds the select MAX part of the query

    public function select_max($field, $alias = ”)

    {

    if (in_array($field, $this->fields, TRUE))

    {

    $this->db->select_max($field, $alias);

    }

    return $this;

    }


    // Builds the select MIN part of the query

    public function select_min($field, $alias = ”)

    {

    if (in_array($field, $this->fields, TRUE))

    {

    $this->db->select_min($field, $alias);

    }

    return $this;

    }


    // Builds the select AVG part of the query

    public function select_average($field, $alias = ”)

    {

    if (in_array($field, $this->fields, TRUE))

    {

    $this->db->select_min($field, $alias);

    }

    return $this;

    }


    // Builds the select SUM part of the query

    public function select_sum($field, $alias = ”)

    {

    if (in_array($field, $this->fields, TRUE))

    {

    $this->db->select_min($field, $alias);

    }

    return $this;

    }


    // Builds the JOIN part of the query

    public function join($table, $join, $join_type = ”)

    {

    if ( !empty($table) AND !empty($join))

    {

    $this->db->join($table, $join, $join_type);

    }

    return $this;

    }


    // Builds the ORDER BY part of the query

    public function order_by($field = ‘id’, $order = ‘ASC’)

    {

    if (in_array($field, $this->fields, TRUE))

    {

    $this->db->order_by($field, $order);

    }

    return $this;

    }


    // Builds the GROUP BY part of the query

    public function group_by($field)

    {

    if (in_array($field, $this->fields, TRUE))

    {

    $this->db->group_by($field);

    }

    return $this;

    }


    // Builds the LIKE part of the query using the AND operator

    public function like($field, $match, $position = ”)

    {

    if (in_array($field, $this->fields, TRUE) AND !empty($match))

    {

    $this->db->like($field, $match, $position);

    }

    return $this;

    }


    // Builds the OR LIKE part if the query using the OR operator

    public function or_like($field, $match, $position = ”)

    {

    if (in_array($field, $this->fields, TRUE) AND !empty($match))

    {

    $this->db->or_like($field, $match, $position);

    }

    return $this;

    }


    // Builds the NOT LIKE part of the query

    public function not_like($field, $match, $position = ”)

    {

    if (in_array($field, $this->fields, TRUE) AND !empty($match))

    {

    $this->db->not_like($field, $match, $position);

    }

    return $this;

    }


    // Builds the DISTINCT part of the query

    public function distinct()

    {

    $this->db->distinct();

    return $this;

    }


    // Builds the WHERE part of the query using AND and other operators

    public function get_where($where, $protect_identifiers = TRUE)

    {

    if ((is_string($where) OR is_array($where)) AND !empty($where))

    {

    $this->db->where($where, $protect_identifiers);

    }

    return $this;

    }


    // Builds the OR WHERE part of the query using OR and other operators

    public function get_or_where($where, $protect_identifiers = TRUE)

    {

    if ((is_string($where) OR is_array($where)) AND !empty($where))

    {

    $this->db->or_where($where, $protect_identifiers);

    }

    return $this;

    }


    // Builds the WHERE IN part of the query

    public function where_in($field, $values)

    {

    if (in_array($field, $this->fields, TRUE) AND is_array($values) AND !empty($values))

    {

    $this->db->where_in($field, $values);

    }

    return $this;

    }


    // Builds the WHERE NOT IN part of the query

    public function where_not_in($field, $values)

    {

    if (in_array($field, $this->fields, TRUE) AND is_array($values) AND !empty($values))

    {

    $this->db->where_not_in($field, $values);

    }

    return $this;

    }


    // Builds the OR WHERE NOT IN part of the query using the OR operator

    public function or_where_not_in($field, $values)

    {

    if (in_array($field, $this->fields, TRUE) AND is_array($values) AND !empty($values))

    {

    $this->db->or_where_not_in($field, $values);

    }

    return $this;

    }


    // Builds the HAVING part of the query

    public function having($field, $value = ”, $protect_identifiers = TRUE)

    {

    if (in_array($field, $this->fields, TRUE))

    {

    $this->db->having($field, $value, $protect_identifiers);

    }

    return $this;

    }


    // Builds the OR HAVING part of the query using the OR operator

    public function or_having($field, $value = ”, $protect_identifiers = TRUE)

    {

    if (in_array($field, $this->fields, TRUE))

    {

    $this->db->or_having($field, $value, $protect_identifiers);

    }

    return $this;

    }


    // Builds the LIMIT part of the query

    public function limit($limit = 0)

    {

    if ($limit != 0)

    {

    $limit = (int)abs($limit);

    $this->db->limit($limit);

    }

    return $this;

    }


    // Determines the number of rows produced by an Active Record query

    public function count_all_results($table = ”)

    {

    return $this->db->count_all_results($table);

    }


    // Determines the number of rows contained in a given table

    public function count_all($table)

    {

    $table = $this->db->table_exists($table) ? $table : $this->table;

    return $this->db->count_all($table);

    }


    // Autoloads recursively child models required by the Abstract Model class

    public static function autoload($model)

    {

    // Don’t attempt to autoload CI_ or MY_ prefixed classes

    if (in_array(substr($model, 0, 3), array(‘CI_’, ‘MY_’)))

    {

    return;

    }

    // Set path and model

    $path = APPPATH . ‘/models/’;

    $model = strtolower($model) . EXT;

    // try to include recursively the model file

    $rit = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

    foreach ($rit as $entry)

    {

    if ($model === $entry->getFileName())

    {

    require_once($entry->getPathname());

    return;

    }

    }

    show_error(‘Model class not found.’);

    }


    // Validates model data

    protected function validate($data)

    {

    // If no validation rules were set trigger an error

    if (empty($this->validation))

    {

    $this->error = ‘No validation rules were set for the model.’;

    return FALSE;

    }

    // Load CI validation library

    $this->ci->load->library(‘validation’);

    // Load CI language file for validation

    $this->ci->lang->load(‘validation’);

    // reset error messages

    $this->error = array();

    foreach ($this->validation as $field => $rules)

    {

    $exprules = explode(‘|’, $rules);

    // if the field is not required check next one

    if (! in_array(‘required’, $exprules, TRUE))

    {

    continue;

    }

    // Iterates through the validation rules

    foreach ($exprules as $rule)

    {

    // Removes the parameter from the rule (when specified)

    $param = FALSE;

    if (preg_match("/(.*?)[(.*?)]/", $rule, $match))

    {

    $rule = $match[1];

    $param = $match[2];

    }

    // Calls the validation method that corresponds to the rule

    if (method_exists($this->ci->validation, $rule))

    {

    $result = $this->ci->validation->$rule($data[$field], $param);

    }

    elseif (function_exists($rule))

    {

    // Tries to run a native PHP function if method of CI validation class doesn’t exist

    $result = $rule($data[$field]);

    }

    // if an offending field was found store error message in error array

    if ($result === FALSE)

    {

    $this->error[] = sprintf($this->ci->lang->line($rule), $field);

    }

    }

    }

    return empty($this->error) ? TRUE : FALSE;

    }


    // Returns error string when performing validation

    protected function get_error_string()

    {

    $str = ”;

    $error_sufix = str_replace(‘<‘, ‘</’, $this->error_prefix);

foreach ($this->error as $error)

{

$str .= $this->error_prefix . $error . $error_sufix;

}

return $str;

}

}
Download Formatting took: 306 ms PHP Formatter made by Spark Labs
Copyright Gerben van Veenendaal
