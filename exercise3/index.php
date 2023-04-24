<?php

require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . '/TvSeries.php';
require_once dirname(__FILE__) . '/TvSeriesRepository.php';
require_once dirname(__FILE__) . '/TvSeriesIntervalsRepository.php';
require_once dirname(__FILE__) . '/TvSeriesSchedule.php';

// Starts a new PDO connection
$dbConn = new PDO(sprintf('mysql:host=%s;dbname=%s', $dbHost, $dbName), $dbUser, $dbPass);

// Create a TvSeriesRepository and a TvSeriesIntervalsRepository instance
$tvSeriesRepository = new TvSeriesRepository($dbConn);
$tvSeriesIntervalsRepository = new TvSeriesIntervalsRepository($dbConn);

// Create and initializes the TvSeriesSchedule with all available TvSeries instances
$tvSeriesSchedule = new TvSeriesSchedule();

// Loop each TvSeries found in the database, create a new TvSeries instance and add it to the TvSeriesSchedule
foreach ($tvSeriesRepository->findAll() as $tvSeriesData) {
    $showTimes = $tvSeriesIntervalsRepository->findAllById($tvSeriesData['id']);

    $tvSeriesSchedule->addTvSeries(
        new TvSeries(
            $tvSeriesData['id'],
            $tvSeriesData['title'],
            $tvSeriesData['channel'],
            $tvSeriesData['gender'],
            $showTimes
        )
    );
}

// Gets the next TvSeries that will air
$nextShows = $tvSeriesSchedule->getNextShow(new DateTime('now'));
foreach ($nextShows as $nextShow) {
    echo "Title: " . $nextShow['title'] . "\n";
    echo "Channel: " . $nextShow['channel'] . "\n";
    echo "Show Time: " . $nextShow['show_time'] . "\n";
}
