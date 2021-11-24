<?php
namespace app\modules\account\controllers;

use app\models\entities\Profile;
use app\models\entities\User;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\ImagineInterface;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class IdentityController extends Controller
{
    public function actionEdit() {
        /* @var User $user */
        $user = \Yii::$app->user->identity;
//        die(var_dump($user));
        $profile = $user->profile;


        if(empty($profile)) {
            $profile = new Profile();
        }

        if(\Yii::$app->request->isPost) {
            if($profile->load(\Yii::$app->request->post())) {
                $profile->avatarFile = UploadedFile::getInstance($profile, 'avatarFile');

                if($profile->validate()) {
                    if(!empty($profile->avatarFile)) {
                        $fileName = static::generateAvatarName($profile->avatarFile);
                        $fileFullName = \Yii::getAlias('@app/web/images/avatars/' . $fileName);

                        $imagine = new Imagine();
                        $imagine->open($profile->avatarFile->tempName)
                            ->save($fileFullName . '-original.jpg')
                            ->thumbnail(new Box(1000, 1000), ImageInterface::THUMBNAIL_INSET)
                            ->save($fileFullName . '-big.jpg')
                            ->thumbnail(new Box(700, 700), ImageInterface::THUMBNAIL_INSET)
                            ->save($fileFullName . '-mid.jpg')
                            ->thumbnail(new Box(400, 400), ImageInterface::THUMBNAIL_INSET)
                            ->save($fileFullName . '-small.jpg')
                            ->thumbnail(new Box(150, 150), ImageInterface::THUMBNAIL_OUTBOUND)
                            ->save($fileFullName . '-thumb.jpg');

                        $profile->avatar = $fileName;
                    }

                    $profile->user_id = $user->id;
                    $profile->save();
                }
            }
        }

        return $this->render('edit', [
            'profile' => $profile
        ]);
    }

    public static function generateAvatarName($file) {
        $fileName = hash('crc32', $file->name . time());

        if(file_exists(\Yii::getAlias('@app/web/images/avatars/') . $fileName . '-original.jpg')) {
            return static::generateAvatarName($file);
        }

        return $fileName;
    }
}