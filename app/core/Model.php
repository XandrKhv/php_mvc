<?php

class Model
{
    public $sort;
    public $page;
    public $view;
    // записей на страницу по умолчанию
    public $perPage = 3;

    /**
     * @return array
     */
    public function getData()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `task` ORDER BY ';

        if (!empty($this->view)) {
            $sql = 'SELECT * FROM `task` WHERE `id` = ' . (int)$this->view;
        } else {
            if (!empty($this->sort)) {
                $sql .= '`' . preg_replace('/[^a-zA-Z0-9]/', '', $this->sort) . '` ASC';
            } else {
                $sql .= '`id` DESC';
            }
            if (!empty($this->page)) {
                $limit = $this->perPage * ((int)$this->page - 1);
                $sql .= ' LIMIT ' . $limit . ', ' . $this->perPage;
            } else {
                $sql .= ' LIMIT 0, ' . $this->perPage;
            }
        }

        $result = $db->query($sql);
        $index = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $index[$i]['id'] = $row['id'];
            $index[$i]['name'] = $row['name'];
            $index[$i]['email'] = $row['email'];
            $index[$i]['text'] = $row['text'];
            $index[$i]['status'] = $row['status'];
            $index[$i]['edit'] = $row['edit'];
            $i++;
        }
        return $index;
    }

    /**
     * @return string
     */
    public static function countTask()
    {
        $db = Db::getConnection();

        $sql = 'SELECT count(*) FROM `task`';
        $countTask = $db->query($sql)->fetchColumn();

        return $countTask;
    }
}
