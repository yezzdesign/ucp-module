<?php

namespace Modules\UCP\Services;

use Modules\ACP\Services\StartServices;

class StartService extends StartServices
{
    protected string    $prefix             =   'ucp::forms.';
    protected array     $pageModules        =   [ 'email', 'password', 'delete' ];

    protected string    $tableBodyPrefix    =   'ucp::tableComponents.';
    protected array     $tableHeadNames     =   [ 'Options', 'Profilpicture', 'ID', 'E-Mail/Name', 'Userrole', 'Date' ];
    protected array     $tableBodyViews     =   [ 'options', 'image', 'id', 'title', 'role', 'date'];

    public function __construct()
    {
        parent::__construct();

        $this->addMenu( __('acp::nav.user'), 'ucp.backend.index', true );

        $this->createPage('UCPEditPage', $this->pageModules, $this->prefix);

        $this->createTable('UCPIndexTable', $this->tableHeadNames, $this->tableBodyViews);


    }
}
