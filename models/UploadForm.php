<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Foto;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $image;
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'image' => 'Изображения'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 10, 'maxSize' => 2000 * 1024, 'tooBig' => 'Размер фото не долже привышать 2МБ'],
        ];
    }
    
    /**
     * Upload and save in foto database
     *
     * @return bool whether upload and save was successful
     */
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->image as $file) {
                $filename = '/uploads/' .  uniqid() . '.' . $file->extension;

                $file->saveAs(Yii::getAlias('@webroot') . $filename);

                $foto = new Foto();
                $foto->image = $filename; 
                $foto->user_id = Yii::$app->user->id;
                $foto->save(); 
            }
            return true;
        } else {
            return false;
        }
    }
}