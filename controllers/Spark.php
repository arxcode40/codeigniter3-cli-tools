<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spark extends CI_Controller {

	protected $_commands = array(
		'cache-clear' => array(
			'usage' => 'cache-clear [<driver>]',
			'arguments' => array(
				'driver' => ' (default: "apc")'
			)
		),
		'cache-info' => array(
			'usage' => 'cache-info'
		),
		'config-show' => array(
			'usage' => 'config-show [<key>]',
			'arguments' => array(
				'key' => ' (optional)'
			)
		),
		'db-backup' => array(
			'usage' => 'db-backup [options]',
			'options' => array(
				'--format[:FORMAT]' => ' (options: "gzip", "zip", "txt") (default: "txt")'
			)
		),
		'db-create' => array(
			'usage' => 'db-create <db_name> [options]',
			'arguments' => array(
				'db_name' => ''
			),
			'options' => array(
				'--ext[:EXT]' => ' (options: "db", "sqlite") (default: "db")'
			)
		),
		'db-optimize' => array(
			'usage' => 'db-optimize'
		),
		'db-query' => array(
			'usage' => 'db-query [options]',
			'options' => array(
				'--force' => ''
			)
		),
		'db-seed' => array(
			'usage' => 'db-seed <seeder_name> [options]',
			'arguments' => array(
				'seeder_name' => ''
			),
			'options' => array(
				'--force' => ''
			)
		),
		'db-show' => array(
			'usage' => 'db-show',
		),
		'db-table' => array(
			'usage' => 'db-table [<table_name>] [options]',
			'arguments' => array(
				'table_name' => ' (optional)'
			),
			'options' => array(
				'--optimize' => '',
				'--repair' => ''
			)
		),
		'env' => array(
			'usage' => 'env [<environment>]',
			'arguments' => array(
				'environment' => ' (valid: "development", "testing", "production") (optional)'
			)
		),
		'help' => array(
			'usage' => 'help <command_name>',
			'arguments' => array(
				'command_name' => ' (default: help)'
			)
		),
		'key-generate' => array(
			'usage' => 'key-generate [options]',
			'options' => array(
				'--encoder[:ENCODER]' => ' (options: "hex2bin", "base64") (default: "hex2bin")',
				'--force' => '',
				'--length[:LENGTH]' => ' (default: 16)',
				'--show' => '',
			)
		),
		'list' => array(
			'usage' => 'list'
		),
		'make-auth' => array(),
		'make-config' => array(
			'usage' => 'make-config <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--force' => ''
			)
		),
		'make-controller' => array(
			'usage' => 'make-controller <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--force' => '',
				'--resource' => ''
			)
		),
		'make-core' => array(
			'usage' => 'make-core <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--extend' => '',
				'--force' => ''
			)
		),
		'make-driver' => array(
			'usage' => 'make-driver <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--force' => ''
			)
		),
		'make-helper' => array(
			'usage' => 'make-helper <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--extend' => '',
				'--force' => ''
			)
		),
		'make-hook' => array(
			'usage' => 'make-hook <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--force' => ''
			)
		),
		'make-htaccess' => array(
			'usage' => 'make-htaccess [options]',
			'options' => array(
				'--force' => ''
			)
		),
		'make-language' => array(
			'usage' => 'make-language <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--force' => ''
			)
		),
		'make-library' => array(
			'usage' => 'make-library <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--extend' => '',
				'--force' => '',
				'--replace' => ''
			)
		),
		'make-license' => array(
			'usage' => 'make-license [options]',
			'options' => array(
				'--force' => ''
			)
		),
		'make-migration' => array(
			'usage' => 'make-migration <name>',
			'arguments' => array(
				'name' => ''
			)
		),
		'make-model' => array(
			'usage' => 'make-model <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--force' => ''
			)
		),
		'make-readme' => array(
			'usage' => 'make-readme [options]',
			'options' => array(
				'--force' => ''
			)
		),
		'make-robots' => array(
			'usage' => 'make-robots [options]',
			'options' => array(
				'--force' => ''
			)
		),
		'make-scaffold' => array(
			'usage' => 'make-scaffold <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--force' => '',
				'--resource' => ''
			)
		),
		'make-seeder' => array(
			'usage' => 'make-seeder <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--force' => ''
			)
		),
		'make-view' => array(
			'usage' => 'make-view <name> [options]',
			'arguments' => array(
				'name' => ''
			),
			'options' => array(
				'--force' => ''
			)
		),
		'migrate' => array(
			'usage' => 'migrate [options]',
			'options' => array(
				'--force' => ''
			)
		),
		'migrate-refresh' => array(
			'usage' => 'migrate-refresh [options]',
			'options' => array(
				'--force' => ''
			)
		),
		'migrate-rollback' => array(
			'usage' => 'migrate-rollback [options]',
			'options' => array(
				'--force' => '',
				'--version' => ''
			)
		),
		'migrate-status' => array(
			'usage' => 'migrate-status'
		),
		'routes' => array(
			'usage' => 'routes'
		),
		'repl' => array(
			'usage' => 'repl'
		),
		'serve' => array(
			'usage' => 'serve [options]',
			'options' => array(
				'--host[:HOST]' => ' (default: localhost)',
				'--port[:PORT]' => ' (default: 8080)',
				'--tries[:TRIES]' => ' (default: 10)',
			)
		),
		'version' => array(
			'usage' => 'version'
		)
	);
	protected $_options;
	protected $_template_path = APPPATH.'templates/';

	public function __construct()
	{
		parent::__construct();

		if ( ! $this->input->is_cli_request())
		{
			show_404();
		}

		$this->load->helper('file');
	}

	public function cache_clear($driver = 'apc')
	{
		$driver = strtolower($driver);

		if ( ! in_array($driver, array('apc', 'file', 'memcached', 'wincache', 'redis')))
		{
			show_error('Invalid caching driver.');
		}

		$this->load->driver('cache', array('adapter' => $driver, 'backup' => 'file'));

		$this->cache->clean();
	}

	public function cache_info()
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		
		echo "\n";
		echo $this->_json_pretty(array_diff_key($this->cache->cache_info(), array('index.html' => '')));
		echo "\n\n";
	}

	public function config_show($key = NULL)
	{
		$configuration = $this->config->config;

		if ($key === NULL)
		{
			echo $this->_json_pretty($configuration);
		}
		else
		{
			$key = strtolower($key);

			if (isset($configuration[$key]) === FALSE)
			{
				show_error('Invalid configuration key.');
			}
			else
			{
				echo $this->config->item($key);
			}
		}
	}

	public function db_backup(...$params)
	{
		$this->load->dbutil();

		$this->options = $this->_parse_params($params, array('format'));

		$format = $this->options['format'] ?? 'txt';

		if ( ! in_array($format, array('gzip', 'zip', 'txt')))
		{
			show_error('Invalid export format.');
		}

		if (in_array($this->db->platform(), array('mysql', 'mysqli', 'ibase')) === FALSE)
		{
			show_error('This feature is only available for MySQL and Interbase/Firebird databases.');
		}
		else
		{
			$db_name = $this->db->query("SELECT DATABASE() AS db_name")->row_array()['db_name'];
			$query = $this->dbutil->backup(array(
				'format' => $format
			));
			write_file(FCPATH."{$db_name}.sql", $query);
		}
	}

	public function db_create($db_name, ...$params)
	{
		$db_name = strtolower($db_name);
		$this->options = $this->_parse_params($params, array('ext'));

		$extension = $this->options['ext'] ?? 'db';

		if ( ! in_array($extension, array('db', 'sqlite')))
		{
			show_error('Invalid database extension.');
		}

		if (in_array($this->db->platform(), array('sqlite', 'sqlite3')) === FALSE)
		{
			$this->load->dbforge();
			$this->load->dbutil();

			if ($this->dbutil->database_exists($db_name) === TRUE)
			{
				show_error("\"{$db_name}\" database already exists.");
			}
			else
			{
				$this->dbforge->create_database($db_name);
			}
		}
		else
		{
			$database_path = APPPATH.'databases/';
			$file = "{$database_path}{$db_name}.{$extension}";

			if ( ! is_dir($database_path))
			{
				mkdir($database_path);
				copy(APPPATH.'index.html', "{$database_path}index.html");
			}

			if (file_exists($file) === TRUE)
			{
				show_error("\"{$db_name}\" database already exists.");
			}
			else
			{
				write_file($file, '');
			}
		}
	}

	public function db_optimize()
	{
		$this->load->dbutil();

		if( ! $this->dbutil->optimize_database())
		{
			show_error('Failed to optimize database.');
		}
	}

	public function db_query(...$params)
	{
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		if (ENVIRONMENT !== 'development' AND $force === FALSE)
		{
			show_error('Application is not under development.');
		}
		else
		{
			while (TRUE)
			{
				echo "\n";
				$query = readline('>>> ');

				if ($query === 'exit')
				{
					break;
				}
				elseif ($query === 'clear')
				{
					system('clear');
				}
				else
				{
					echo '=> ';
					if ($this->db->is_write_type($query) === FALSE)
					{
						$result = $this->db->query($query);
						echo "\n".$this->_json_pretty($result->result_array());
					}
					else
					{
						$this->db->trans_start();
						$this->db->query($query);
						$this->db->trans_complete();

						echo ($this->db->trans_status() ? 'TRUE' : 'FALSE');
					}
				}
				echo "\n\n";
			}
		}
	}

	public function db_seed($seeder_name, ...$params)
	{
		$this->config->load('seeder');

		$seeder_name = ucfirst(strtolower($seeder_name));
		$seeder_name = str_replace('_seeder', '', $seeder_name);
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$seeder_path = $this->config->item('seeder_path') ?? APPPATH.'seeders/';
		$file = "{$seeder_path}{$seeder_name}_seeder.php";

		if (ENVIRONMENT !== 'development' AND $force === FALSE)
		{
			show_error('Application is not under development.');
		}
		else
		{
			if (file_exists($file) === FALSE)
			{
				show_error("\"{$seeder_name}\" seeder not found.");
			}
			else
			{
				require_once($file);

				$seeder_name = "{$seeder_name}_seeder";
				$seeder = new $seeder_name();
				$seeder->run();
			}
		}
	}

	public function db_show()
	{
		$platform = array(
			'cubrid' => 'CUBRID',
			'ibase' => 'Interbase/Firebird',
			'mssql' => 'Microsoft SQL Server',
			'mysql' => 'MySQL',
			'mysqli' => 'MySQL',
			'oci8' => 'Oracle',
			'odbc' => 'ODBC',
			'pdo' => 'PDO',
			'postgre' => 'PostgreSQL',
			'sqlite' => 'SQLite',
			'sqlite3' => 'SQLite',
			'sqlsrv' => 'Microsoft SQL Server'
		);
		echo "\n".$platform[$this->db->platform()].' v'.$this->db->version();

		require(APPPATH.'config/database.php');

		echo "\nDatabase Configuration:\n\n";
		echo $this->_json_pretty($db[$active_group])."\n";

		echo "\nDatabase Lists:\n\n";
		$this->load->dbutil();
		$databases = $this->dbutil->list_databases();
		array_walk(
			$databases,
			function($database)
			{
				echo "- {$database}\n";
			}
		);
		echo "\n";
	}

	public function db_table($table_name = NULL, ...$params)
	{
		$this->options = $this->_parse_params($params, array('optimize', 'repair'));

		$optimize = isset($this->options['optimize']);
		$repair = isset($this->options['repair']);

		echo "\n";
		if ($table_name === NULL)
		{
			$list_tables = $this->db->list_tables();

			foreach ($list_tables as $table)
			{
				$field_data = $this->db->field_data($table);
				$tables[$table] = $field_data;
			}

			echo $this->_json_pretty($tables);
			echo "\n\n";
		}
		else
		{
			$this->load->dbutil();

			if ( ! $this->db->table_exists($table_name))
			{
				show_error("\"{$table_name}\" table not found.");
			}

			if ($optimize === TRUE)
			{
				if ( ! $this->dbutil->optimize_table($table_name))
				{
					show_error("Failed to optimize \"{$table_name}\" table.");
				}
			}
			elseif ($repair === TRUE)
			{
				if ( ! $this->dbutil->repair_table($table_name))
				{
					show_error("Failed to repair \"{$table_name}\" table.");
				}
			}
			else
			{
				$table_name = strtolower($table_name);

				echo $this->_json_pretty($this->db->get($table_name)->result_array());
				echo "\n\n";
			}
		}
	}

	public function env($environment = NULL)
	{
		if ($environment === NULL)
		{
			echo "\n".ENVIRONMENT."\n\n";
		}
		else
		{
			$environment = strtolower($environment);

			if ( ! in_array($environment, array('development', 'testing', 'production', 'maintenance')))
			{
				show_error('Invalid application environment.');
			}

			$bootstrap = read_file(FCPATH.'index.php');
			$bootstrap = preg_replace('/(define\(\'ENVIRONMENT\', isset\(\$_SERVER\[\'CI_ENV\'\]\) \? \$_SERVER\[\'CI_ENV\'\] :) \'(development|testing|production|maintenance)\'\);/', '$1 '."'{$environment}');", $bootstrap);
			write_file(FCPATH.'index.php', $bootstrap);
		}
	}

	public function help($command_name = 'help')
	{
		if ( ! isset($this->_commands[$command_name]))
		{
			show_error("\"{$command_name}\" command not found.");
		}

		$command = $this->_commands[$command_name];

		echo "\nUsage: \n";
		echo "  {$command['usage']}\n";

		if (isset($command['arguments']))
		{
			echo "\nArguments: \n";
			foreach ($command['arguments'] as $key => $value)
			{
				echo "  {$key}{$value}\n";
			}
		}

		if (isset($command['options']))
		{
			echo "\nOptions: \n";
			foreach ($command['options'] as $key => $value)
			{
				echo "  {$key}{$value}\n";
			}
		}
		echo "\n";
	}

	public function key_generate(...$params)
	{
		$this->load->library('encryption');

		$this->options = $this->_parse_params($params, array('encoder', 'force', 'length', 'show'));

		$encoder = $this->options['encoder'] ?? 'hex2bin';
		$force = isset($this->options['force']);
		$length = (int) ($this->options['length'] ?? 16);
		$show = isset($this->options['show']);

		$encryption_key = $this->encryption->create_key($length);
		switch ($encoder)
		{
			case 'hex2bin':
				$encryption_key = bin2hex($encryption_key);
				break;

			case 'base64':
				$encryption_key = base64_encode($encryption_key);
				$encoder = 'base64_decode';
				break;

			default:
				show_error("Invalid encryption encoder.");
				break;
		}

		if ($this->config->item('encryption_key') !== '' AND $force === FALSE)
		{
			show_error('Application key encryption already exists.');
		}
		else
		{
			$config = read_file(APPPATH.'config/config.php');
			$config = preg_replace('/(\$config\[\'encryption_key\'\] =) .+;/', '$1 '."{$encoder}('{$encryption_key}');", $config);
			write_file(APPPATH.'config/config.php', $config);

			if ($show)
			{
				echo "\n{$encoder}(\"{$encryption_key}\")\n\n";
			}
		}
	}

	public function list()
	{
		$commands = array_keys($this->_commands);
		sort($commands);

		echo "\nCodeIgniter v".CI_VERSION." CLI Tools\n\n";
		array_walk(
			$commands,
			function($command)
			{
				echo "- {$command}\n";
			}
		);
		echo "\n";
	}

	public function make_auth()
	{
		echo "\nComing soon.\n\n";
	}

	public function make_config($name, ...$params)
	{
		$name = strtolower($name);
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$config_path = APPPATH.'config/';
		$file = "{$config_path}{$name}.php";

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			$name = ucfirst($name);
			show_error("\"{$name}\" config already exists.");
		}
		else
		{
			$template = read_file("{$this->_template_path}config.template");
			write_file($file, $template);
		}
	}

	public function make_controller($name, ...$params)
	{
		$name = ucfirst(strtolower($name));
		$this->options = $this->_parse_params($params, array('force', 'resource'));

		$force = isset($this->options['force']);
		$resource = isset($this->options['resource']);

		$controller_path = APPPATH.'controllers/';
		$file = "{$controller_path}{$name}.php";

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			show_error("\"{$name}\" controller already exists.");
		}
		else
		{
			$template = read_file("{$this->_template_path}controller/".($resource ? 'resource.template' : 'default.template'));
			$template = str_replace('{class}', $name, $template);
			write_file($file, $template);
		}
	}

	public function make_core($name, ...$params)
	{
		$name = ucfirst(strtolower($name));
		$this->options = $this->_parse_params($params, array('extend', 'force'));

		$extend = isset($this->options['extend']);
		$force = isset($this->options['force']);

		$core_path = APPPATH.'core/';
		$subclass_prefix = $extend ? $this->config->item('subclass_prefix') : '';
		$file = "{$core_path}{$subclass_prefix}{$name}.php";

		if ( ! in_array($name, array('Benchmark', 'Config', 'Controller', 'Exceptions', 'Hooks', 'Input', 'Lang', 'Loader', 'Log', 'Output', 'Router', 'Security', 'URI', 'Utf8')))
		{
			show_error('Invalid core system.');
		}

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			show_error("\"{$name}\" core already exists.");
		}
		else
		{
			if ($extend === FALSE)
			{
				$template = read_file("{$this->_template_path}core/replace.template");
				$template = str_replace('{class}', "CI_{$name}", $template);
			}
			else
			{
				$template = read_file("{$this->_template_path}core/extend.template");
				$template = str_replace(
					array('{class}', '{extends}'),
					array("{$subclass_prefix}{$name}", "CI_{$name}"),
					$template
				);
			}
			write_file($file, $template);
		}
	}

	public function make_driver($name, ...$params)
	{
		$name = ucfirst(strtolower($name));
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$driver_basepath = BASEPATH."libraries/{$name}/";
		$driver_path = APPPATH."libraries/{$name}/";
		$driver_subpath = APPPATH."libraries/{$name}/drivers/";

		if (is_dir($driver_basepath) === TRUE OR is_dir($driver_path) === TRUE AND $force === FALSE)
		{
			show_error("\"{$name}\" driver already exists.");
		}
		else
		{
			mkdir($driver_path);
			copy(APPPATH.'index.html', "{$driver_path}index.html");
			write_file("{$driver_path}{$name}.php", '');

			mkdir($driver_subpath);
			copy(APPPATH.'index.html', "{$driver_subpath}index.html");
			write_file("{$driver_subpath}{$name}_sub_1.php", '');
		}
	}

	public function make_helper($name, ...$params)
	{
		$name = strtolower($name);
		$name = str_replace('_helper', '', $name);
		$this->options = $this->_parse_params($params, array('extend', 'force'));

		$extend = isset($this->options['extend']);
		$force = isset($this->options['force']);

		$helper_basepath = BASEPATH.'helpers/';
		$basefile = "{$helper_basepath}{$name}_helper.php";
		$helper_path = APPPATH.'helpers/';
		$subclass_prefix = $extend ? $this->config->item('subclass_prefix') : '';
		$file = "{$helper_path}{$subclass_prefix}{$name}_helper.php";

		$template = read_file("{$this->_template_path}helper.template");
		if ($extend === FALSE)
		{
			if ((file_exists($file) === TRUE OR file_exists($basefile) === TRUE) AND $force === FALSE)
			{
				$name = ucfirst($name);
				show_error("\"{$name}\" helper already exists.");
			}
			else
			{
				write_file($file, $template);
			}
		}
		else
		{
			if ( ! file_exists($basefile))
			{
				show_error('Invalid helper system.');
			}

			if (file_exists($file) === TRUE AND $force === FALSE)
			{
				$name = ucfirst($name);
				show_error("\"{$name}\" helper already exists.");
			}
			else
			{
				write_file($file, $template);
			}
		}
	}

	public function make_hook($name, ...$params)
	{
		$name = ucfirst(strtolower($name));
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$hook_path = APPPATH.'hooks/';
		$file = "{$hook_path}{$name}.php";

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			show_error("\"{$name}\" hook already exists.");
		}
		else
		{
			$template = read_file("{$this->_template_path}hook.template");
			$template = str_replace('{class}', $name, $template);
			write_file($file, $template);
		}
	}

	public function make_htaccess(...$params)
	{
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$file = FCPATH.'.htaccess';

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			show_error('.htaccess file already exists.');
		}
		else
		{
			$template = read_file("{$this->_template_path}htaccess.template");
			write_file($file, $template);
		}
	}

	public function make_language($name, ...$params)
	{
		$name = strtolower($name);
		$name = str_replace('_lang', '', $name);
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$localization = $this->config->item('language');
		$language_path = APPPATH."language/{$localization}/";
		$file = "{$language_path}{$name}_lang.php";

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			$name = ucfirst($name);
			show_error("\"{$name}\" language already exists.");
		}
		else
		{
			$template = read_file("{$this->_template_path}language.template");
			$template = str_replace('{prefix}', $name, $template);
			write_file($file, $template);
		}
	}

	public function make_library($name, ...$params)
	{
		$name = ucfirst(strtolower($name));
		$this->options = $this->_parse_params($params, array('extend', 'force', 'replace'));

		$extend = isset($this->options['extend']);
		$force = isset($this->options['force']);
		$replace = isset($this->options['replace']);

		$library_basepath = BASEPATH.'libraries/';
		$basefile = "{$library_basepath}{$name}.php";
		$library_path = APPPATH.'libraries/';
		$subclass_prefix = $extend ? $this->config->item('subclass_prefix') : '';
		$file = "{$library_path}{$subclass_prefix}{$name}.php";

		if ($extend === TRUE)
		{
			if ( ! file_exists($basefile))
			{
				show_error('Invalid library system.');
			}

			if (file_exists($file) === TRUE AND $force === FALSE)
			{
				show_error("\"{$name}\" library already exists.");
			}
			else
			{
				$template = read_file("{$this->_template_path}library/extend.template");
				$template = str_replace(
					array('{class}', '{extends}'),
					array("{$subclass_prefix}{$name}", "CI_{$name}"),
					$template
				);
				write_file($file, $template);
			}
		}
		elseif ($replace === TRUE)
		{
			if ( ! file_exists($basefile))
			{
				show_error('Invalid library system.');
			}

			if (file_exists($file) === TRUE AND $force === FALSE)
			{
				show_error("\"{$name}\" library already exists.");
			}
			else
			{
				$template = read_file("{$this->_template_path}library/default.template");
				$template = str_replace('{class}', "CI_{$name}", $template);
				write_file($file, $template);
			}
		}
		else
		{
			if ((file_exists($file) === TRUE OR file_exists($basefile) === TRUE) AND $force === FALSE)
			{
				show_error("\"{$name}\" library already exists.");
			}
			else
			{
				$template = read_file("{$this->_template_path}library/default.template");
				$template = str_replace('{class}', "{$subclass_prefix}{$name}", $template);
				write_file($file, $template);
			}
		}
	}

	public function make_license(...$params)
	{
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$file = FCPATH.'LICENSE';

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			show_error('LICENSE file already exists.');
		}
		else
		{
			write_file($file, '');
		}
	}

	public function make_migration($name)
	{
		$this->load->helper('date');
		$this->config->load('migration');

		$name = strtolower($name);

		$migration_path = $this->config->item('migration_path') ?? APPPATH.'migrations/';
		$version = $this->config->item('migration_type') === 'sequential' ? str_pad($this->config->item('migration_version') + 1, 3, 0, STR_PAD_LEFT) : mdate('%Y%m%d%H%i%s');
		$file = "{$migration_path}{$version}_{$name}.php";

		if ( ! is_dir($migration_path))
		{
			mkdir($migration_path);
			copy(APPPATH.'index.html', "{$migration_path}index.html");
		}

		$template = read_file("{$this->_template_path}migration.template");
		$template = str_replace('{class}', 'Migration_'.ucfirst($name), $template);
		write_file($file, $template);

		$version = (int) $version;
		$config = read_file(APPPATH.'config/migration.php');
		$config = preg_replace('/(\$config\[\'migration_version\'\] =) \d+;/', '$1'." {$version};", $config);
		write_file(APPPATH.'config/migration.php', $config);
	}

	public function make_model($name, ...$params)
	{
		$name = ucfirst(strtolower($name));
		$name = str_replace('_model', '', $name);
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$model_path = APPPATH.'models/';
		$file = "{$model_path}{$name}_model.php";

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			show_error("\"{$name}\" model already exists.");
		}
		else
		{
			$template = read_file($this->_template_path.'model.template');
			$template = str_replace('{class}', "{$name}_model", $template);
			write_file($file, $template);
		}
	}

	public function make_readme(...$params)
	{
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$file = FCPATH.'README.md';

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			show_error('README.md file already exists.');
		}
		else
		{
			write_file($file, '');
		}
	}

	public function make_robots(...$params)
	{
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$file = FCPATH.'robots.txt';

		if (file_exists($file) === TRUE)
		{
			show_error('robots.txt file already exists.');
		}
		else
		{
			$template = read_file("{$this->_template_path}robots.template");
			write_file($file, $template);
		}
	}

	public function make_scaffold($name, ...$params)
	{
		$name = strtolower($name);

		$this->make_controller($name, ...$params);
		$params = array_diff($params, array('--resource'));
		$this->make_model($name, ...$params);
		$this->make_migration($name);
		$this->make_seeder($name, ...$params);
	}

	public function make_seeder($name, ...$params)
	{
		$this->config->load('seeder');

		$name = ucfirst(strtolower($name));
		$name = str_replace('_seeder', '', $name);
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$seeder_path = $this->config->item('seeder_path') ?? APPPATH.'seeders/';
		$file = "{$seeder_path}{$name}_seeder.php";

		if ( ! is_dir($seeder_path))
		{
			mkdir($seeder_path);
			copy(APPPATH.'index.html', "{$seeder_path}index.html");
		}

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			show_error("\"{$name}\" seeder already exists.");
		}
		else
		{
			$template = read_file("{$this->_template_path}seeder.template");
			$template = str_replace('{class}', "{$name}_seeder", $template);
			write_file($file, $template);
		}
	}

	public function make_view($name, ...$params)
	{
		$name = strtolower($name);
		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		$file = VIEWPATH."{$name}.php";

		if (file_exists($file) === TRUE AND $force === FALSE)
		{
			$name = ucfirst($name);
			show_error("\"{$name}\" view already exists.");
		}
		else
		{
			write_file($file, '');
		}
	}

	public function migrate(...$params)
	{
		$this->load->library('migration');

		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		if (ENVIRONMENT !== 'development' AND $force === FALSE)
		{
			show_error('Application is not under development.');
		}
		else
		{
	    if ($this->migration->current() === FALSE)
	    {
	      show_error($this->migration->error_string());
	    }
		}
	}

	public function migrate_refresh(...$params)
	{
		$this->load->library('migration');

		$this->options = $this->_parse_params($params, array('force'));

		$force = isset($this->options['force']);

		if (ENVIRONMENT !== 'development' AND $force === FALSE)
		{
			show_error('Application is not under development.');
		}
		else
		{
		  if ($this->migration->version(0) === FALSE)
		  {
		    show_error($this->migration->error_string());
		  }

		  if ($this->migration->current() === FALSE)
		  {
		    show_error($this->migration->error_string());
		  }
		}
	}

	public function migrate_rollback(...$params)
	{
		$this->load->library('migration');

		$this->options = $this->_parse_params($params, array('force', 'version'));

		$force = isset($this->options['force']);

		$version = (int) ($this->options['version'] ?? 0);

		if (ENVIRONMENT !== 'development' AND $force === FALSE)
		{
			show_error('Application is not under development.');
		}
		else
		{
			if ($this->migration->version($version) === FALSE)
	    {
	      show_error($this->migration->error_string());
	    }
		}
	}

	public function migrate_status()
	{
		$this->load->library('migration');
		$this->config->load('migration');
		$this->lang->load('migration');

		$migrations = $this->migration->find_migrations();
		if (empty($migrations))
		{
			show_error($this->lang->line('migration_none_found'));
		}
		$migrations = array_map(
			function($migration)
			{
				return basename($migration, '.php');
			},
			$migrations
		);

		$migration_table = $this->config->item('migration_table') ?? 'migrations';
		$version = $this->db->select('version')->get($migration_table)->row_array()['version'];

		foreach ($migrations as $number => $migration)
		{
			$migrate_status[$migration] = $number <= $version;
		}

		echo "\n";
		echo $this->_json_pretty($migrate_status);
		echo "\n\n";
	}

	public function repl()
	{
		while (TRUE)
		{
			echo "\n";
			$input = readline('>>> ');

			if ($input === 'exit')
			{
				break;
			}
			elseif ($input === 'clear')
			{
				system('clear');
			}
			else
			{
				echo '=> ';
				eval($input);
			}
			echo "\n";
		}
	}

	public function routes()
	{
		require(APPPATH.'config/routes.php');
		$routes = $route;
		$routes = array_merge(array('/' => $routes['default_controller'].'/index'), $routes);
		$routes = array_filter(
			$routes,
			function($route)
			{
				return in_array($route, array('default_controller', '404_override', 'translate_uri_dashes')) === FALSE;
			},
			ARRAY_FILTER_USE_KEY
		);

		echo "\n";
		foreach ($routes as $route => $handlers)
		{
			if (is_array($handlers) === FALSE)
			{
				$handler = $handlers;
				echo "[GET]: \"{$route}\" => \"{$handler}\"\n";
			}
			else
			{
				foreach ($handlers as $method => $handler)
				{
					echo "[{$method}]: \"{$route}\" => \"{$handler}\"\n";
				}
			}
		}
		echo "\n";
	}

	public function serve(...$params)
	{
		$this->options = $this->_parse_params($params, array('host', 'port', 'tries'));

		$host = $this->options['host'] ?? 'localhost';
		$port = (int) ($this->options['port'] ?? 8080);
		$tries = (int) ($this->options['tries'] ?? 10);

		static $port_offset = 0;

		passthru("php -S {$host}:{$port}", $status);

		if ($status AND $port_offset < $tries)
		{
			$port_offset++;

			$this->serve($params);
		}
	}

	public function version()
	{
		echo "\nCodeIgniter v".CI_VERSION."\n\n";
	}

	protected function _parse_params($params, $valid_params)
	{
		$params = array_map(
			function($param)
			{
				return explode(':', str_replace('--', '', $param));
			},
			$params
		);

		foreach ($params as $index => $param)
		{
			$params[$param[0]] = $param[1] ?? TRUE;
			unset($params[$index]);
		}

		foreach ($params as $key => $value)
		{
			if ( ! in_array($key, $valid_params))
			{
				show_error("Option \"{$key}\" has an invalid options.");
			}
		}

		return $params;
	}

	protected function _json_pretty($value)
	{
		return json_encode($value, JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
	}
}
