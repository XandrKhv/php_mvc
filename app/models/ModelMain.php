<?php

class ModelMain extends Model
{

    /**
     * @param $data
     * @return mixed
     */
    public function saveTask($data)
    {
        $postData = Route::postParams();

        if (isset($postData['name']) && isset($postData['email']) && isset($postData['text'])) {
            if (empty($postData['name']) || empty($postData['email']) || empty($postData['text'])) {
                $data["login_status"] = 'empty_fields';
            } elseif (filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
                if ($this->insert($postData['name'], $postData['email'], $postData['text'])) {
                    header('Location:/');
                } else {
                    $data["login_status"] = "error_save";
                }
            } else {
                $data["login_status"] = "email_not_valid";
            }
        } else {
            $data["login_status"] = '';
        }

        return $data;
    }

    /**
     * @param $name
     * @param $email
     * @param $text
     * @return bool
     */
    public static function insert(string $name, string $email, string $text)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO `task`(`name`, `email`, `text`) VALUES (:name, :email, :text)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);

        return $result->execute();
    }
}
