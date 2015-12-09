<?php

require_once __DIR__ . '/app/bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(\Tipsy\Tipsy::db()->entityManager());
