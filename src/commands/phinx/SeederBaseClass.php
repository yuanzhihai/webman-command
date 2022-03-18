<?php
namespace yzh52521\command\commands\phinx;

use Phinx\Db\Table;
use Phinx\Seed\AbstractSeed;

class SeederBaseClass extends AbstractSeed
{
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
        return new Table($tableName, $options, $this->getAdapter());
    }
}
