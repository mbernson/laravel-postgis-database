<?php namespace Lamb\LaravelPostgisDatabase;

class PostgisConnection extends \Illuminate\Database\PostgresConnection {

	protected function getDefaultQueryGrammar()
	{
		return $this->withTablePrefix(new PostgisQueryGrammar);
	}

	protected function getDefaultSchemaGrammar()
	{
		return $this->withTablePrefix(new PostgisSchemaGrammar);
	}
	
	public function getSchemaBuilder()
	{
		if (is_null($this->schemaGrammar)) { $this->useDefaultSchemaGrammar(); }

		return new PostgisBuilder($this);
	}

}