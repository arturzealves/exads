<?php

class TvSeriesIntervalsRepository
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
     * @param int $id
     *
     * @return array|false
     */
    public function findAllById(int $id): array
    {
        $statement = $this->dbConn
            ->prepare('SELECT * FROM tv_series_intervals WHERE id_tv_series = ?');

        $statement->execute([$id]);

        return $statement->fetchAll();
    }
}
