<?php

class ModelAdmin extends Model
{

    public function updateStatus(int $taskId, string $status)
    {
        $status = $status == "true" ? 1 : 0;

        $db = Db::getConnection();
        $sql = 'UPDATE `task` SET `status`=:status WHERE `id`=:taskId';
        $result = $db->prepare($sql);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':taskId', $taskId, PDO::PARAM_INT);

        return $result->execute();
    }

    /**
     * @param int $taskId
     * @param string $text
     * @return bool
     */
    public static function update(int $taskId, string $text)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `task` SET `text`=:text,`edit`=1 WHERE `id`=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':id', $taskId, PDO::PARAM_INT);

        return $result->execute();
    }
}
