<?php

namespace Modules\UCP\Logical;

use Modules\ACP\Logical\Facades\Menu;

class Start
{
        public function __construct () {
            Menu::add( __('acp::nav.user'), 'ucp.backend.index', true );
        }
}
