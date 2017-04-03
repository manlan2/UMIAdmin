<?php

namespace YM\Umi\DataTable;

use YM\Umi\umiDataTableBuilder;

class AdminDataTableWithSearch extends umiDataTableAbstract
{
    private $umiDataTable;

    public function __construct()
    {
        $this->umiDataTable = new umiDataTableBuilder();
    }

    public function header()
    {
        return $this->umiDataTable->tableHead();
    }

    public function tableBody()
    {
        return $this->umiDataTable->tableBody();
    }

    public function footer()
    {
        return 'customize footer';
    }
}