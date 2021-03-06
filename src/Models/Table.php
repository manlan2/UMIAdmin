<?php

namespace YM\Models;

class Table extends UmiBase
{
    use BreadOperation;

    protected $table = 'umi_tables';

    protected $openCache = true;
    protected $cacheAllRecord = true;

    public function TableRelationOperationActive()
    {
        return $this->belongsTo('TableRelationOperation', 'active_table_id');
    }

    public function TableRelationOperationResponse()
    {
        return $this->belongsTo('TableRelationOperation', 'response_table_id');
    }

    public function getTableById($id)
    {
        if ($this->openCache)
            return $this->cachedTable->where('id', $id)->first();
        return self::find($id);
    }

    public function getTableName($id)
    {
        return $this->getTableById($id)->table_name;
    }

    public function getTableId($tableName)
    {
        if ($this->openCache){
            $record = $this->cachedTable->where('table_name', $tableName)->first();
        } else {
            $record = self::where('table_name', $tableName)->first();
        }

        if ($record)
            return $record->id;
        return 0;
    }

    public function getAllTable()
    {
        if ($this->openCache)
            return $this->cachedTable;
        return self::all();
    }

    #仅仅获取id和table_name的字段 以键值对返回
    #only get id and table_name return as key=>value
    public function getTableNameAndIdList()
    {
        return $this->getAllTable()->map(function ($value) {
            return [$value->table_name => $value->id];
        })->collapse()->toArray();
    }
}
