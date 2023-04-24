<?php

class TvSeriesRepository
{
    /**
     * @var PDO
     */
    private $dbConn;

    /**
     * @param PDO $dbConn
     */
    public function __construct(PDO $dbConn)
    {
        $this->dbConn = $dbConn;
    }

    /**
     * @return array|false
     */
    public function findAll(): array
    {
        $statement = $this->dbConn->query('SELECT * FROM tv_series');

        return $statement->fetchAll();
    }
}
