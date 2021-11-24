<?php
namespace app\models\forms;
use app\models\entities\User;
use yii\base\Model;
/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class RegisterModel extends Model
{
    public $username;
    public $password;
    public $cpassword;
    public function rules()
    {
        return [
            [['username', 'password', 'cpassword'], 'required'],
            [['username'], 'unique', 'targetAttribute' => 'username', 'targetClass' => 'app\models\entities\User'],
            [['cpassword'], 'compare', 'compareAttribute' => 'password']
        ];
    }
    public function register() {
        if($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->password = md5($this->password);
            if($user->save()) {
                return true;
            }
        }
        return false;
    }
}