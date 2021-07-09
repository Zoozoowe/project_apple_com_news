<?php

/* Базовый шаблонизатор для PHP */
class Template
{
	private $dir_tmpl; // директория с шаблонами
	private $data = array(); // данные передаваемые в шаблон

	public function __construct( $a_dir )
	{
		$this->dir_tmpl = $a_dir;
	}

	public function set( $a_name, $a_value )
	{
		$this->data[$a_name] = $a_value;
	}

	public function delete( $a_name )
	{
		unset( $this->data[$a_name] );
	}
	
	public function __get( $a_name )
	{
		if( isset($this->data[$a_name]) )
		{	
			return $this->data[$a_name];
		}
		
		return false;
	}

	/* Отображает выбранны шаблон из $dir_tml */
	public function display( $a_tmp )
	{
		$template = $this->dir_tmpl . $a_tmp . ".html";
		
		ob_start();
			include( $template );
		echo ob_get_clean();
	}
}

?>