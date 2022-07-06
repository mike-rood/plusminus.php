<?php

namespace Modules\Core\Models;

/**
 * Description of MigrationModel
 *
 * @author mihej
 */

class MigrationModel {
    use \Library\Singleton;
    use \Library\Connection;
    
    static public function executeMigration(string $destination, string $migrationTitle, string $migrationMethod) {
        $pdo = self::setConnection($destination);
        $sql = $migrationTitle::$migrationMethod();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        unset($pdo);
    }
}
