<?php

/**
 * Shade
 *
 * @version 0.1
 * @author  Denis Shapkin <i@denis-shapkin.ru>
 */

namespace Shade\Controller;

/**
 * Controller "Profiler"
 *
 * @package Shade
 * @author  Denis Shapkin <i@denis-shapkin.ru>
 */
class Profiler extends \Shade\Controller
{
    /**
     * Output profiler information
     *
     * @param string $startTime Application start time
     * @param bool   $debugMode Is debug mode enabled
     *
     * @return \Shade\Response
     */
    public function outputAction($startTime, $debugMode)
    {
        if ($debugMode) {
            $data = array(
                'debugMode' => true,
                'memory' => \Shade\Converter::formatBytes(memory_get_usage(true)),
                'memoryPeak' => \Shade\Converter::formatBytes(memory_get_peak_usage(true)),
                'execTime' => (microtime(true) - $startTime),
            );
        } else {
            $data = array('debugMode' => false);
        }

        return $this->render('system/profiler.phtml', $data);
    }
}
