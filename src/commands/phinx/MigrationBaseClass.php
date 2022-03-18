<?php


namespace yzh52521\command\commands\phinx;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Builder;
use Phinx\Db\Table;
use Phinx\Migration\AbstractMigration;

class MigrationBaseClass extends AbstractMigration
{

    /** @var Capsule $capsule */
    public $capsule;
    /** @var Builder $capsule */
    public $schema;

    public function init()
    {
        $database = config('database');
        $connection = $database['connections'][$database['default']];
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            'driver' => $connection['driver'],
            'host' => $connection['host'],
            'port' => $connection['port'],
            'database' => $connection['database'],
            'username' => $connection['username'],
            'password' => $connection['password'],
            'charset' => $connection['charset'],
            'collation' => $connection['collation'],
            'prefix' => $connection['prefix']
        ]);

        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }

    /**
     * @inheritDoc
     */
    public function table($tableName, $options = [])
    {
        $database = config('database');
        $connection = $database['connections'][$database['default']];
        if (isset($connection['prefix']) || !empty($connection['prefix'])) {
            $tableName = $connection['prefix'] . $tableName;
        }
        $table = new Table($tableName, $options, $this->getAdapter());
        $this->tables[] = $table;
        return $table;
    }
}
