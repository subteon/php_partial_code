<?php

/* example */

require_once( 'pageLoadTimer.class.php' );

$my_timer = new pageLoadTimer();

echo( round( $my_timer->getTime(), 3 ) . ' sec.' );
echo('<br />' . "\n");

for($i=0; $i<=1000; $i++){
    usleep(2000);
}

echo( round( $my_timer->getTime(), 3 ) . ' sec.' );
echo('<br />' . "\n");

for($i=0; $i<=10; $i++){
    usleep(10000);
}

echo( round( $my_timer->getTime(), 3 ) . ' sec.' );
