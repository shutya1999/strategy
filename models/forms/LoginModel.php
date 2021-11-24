<?php
namespace app\models\forms;
use app\models\entities\User;
use yii\base\Model;
/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class LoginModel extends Model
{
    public $username;
    public $password;
    public function rules()
    {
        return [
            [['username'], 'exist', 'targetClass' => User::className(), 'targetAttribute' => 'username'],
            [['username', 'password'], 'required'],
            [['password'], 'validatePassword']
        ];
    }
    public function validatePassword($attribute, $params) {
        $user = User::findOne(['username' => $this->username]);
        if(!empty($user)) {
            if(!empty($this->password)) {
                if(md5($this->password) == $user->password) {
                    return;
                }
            }
        }
        $this->addError('password', 'Incorrect username or password.');
    }
    public function login() {
        /* @var User $user */
        $user = User::findOne(['username' => $this->username]);
        $user->access_key = md5(time() . $user->username);
        if($user->save()) {
            if(\Yii::$app->user->login($user, 3600*24*30)) {
                return true;
            }
        }
        return false;
    }
}