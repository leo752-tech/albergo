<?php

class VStatistics {

    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    public function showDashboard($stats) {
		$this->smarty->assign('admin_logged_in', true);
        $this->smarty->assign('roomStats', $stats['roomStats'] ?? []);
        $this->smarty->assign('avgStay', $stats['avgStay'] ?? 0);
        $this->smarty->assign('cancelRate', $stats['cancelRate'] ?? 0);
        $this->smarty->assign('extraServiceRevenue', $stats['extraServiceRevenue'] ?? 0);
        $this->smarty->assign('reviewRatings', $stats['reviewRatings'] ?? [0, 0, 0, 0, 0]);
        $this->smarty->assign('frequentKeywords', $stats['frequentKeywords'] ?? []);

        $this->smarty->display('statistics_dashboard.tpl');  
    }
}
