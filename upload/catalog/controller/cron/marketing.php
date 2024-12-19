<?php
namespace Ventocart\Catalog\Controller\Cron;
/**
 * Class Marketing
 *
 * @package Ventocart\Catalog\Controller\Cron
 */
class Marketing extends \Ventocart\System\Engine\Controller
{
    /**
     * @param int    $cron_id
     * @param string $code
     * @param string $cycle
     * @param string $date_added
     * @param string $date_modified
     *
     * @return void
     */
    public function index(int $cron_id, string $code, string $cycle, string $date_added, string $date_modified): void
    {

        // Initialize a bridge
        $this->load->bridge('Admin');

        // Sends nessesry notifications and updates analytics
        $this->load->controller('marketing/abandonedcart.sendNotifications');

        $this->log->write("Running abandoned cart cron...");
    }
}

