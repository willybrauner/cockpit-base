<?php
/**
 * This file is part of the Cockpit project.
 *
 * (c) Artur Heinze - 🅰🅶🅴🅽🆃🅴🅹🅾, http://agentejo.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!COCKPIT_CLI) return;

CLI::writeln('Flushing forms data');


foreach ($app->module('forms')->forms() as $name => $form) {

    $fid = $form['_id'];
    $app->storage->dropCollection("forms/{$fid}");
}
