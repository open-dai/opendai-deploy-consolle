<?php

/**
 * This is the model class for table "vdb".
 *
 * The followings are the available columns in table 'vdb':
 * @property integer $id
 * @property string $name
 * @property string $vdbfile
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property VdbDsRes[] $vdbDsRes
 * @property Vdbtables[] $vdbtables
 */
class Vdb extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vdb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, vdbfile, user_id', 'required'),
			array('user_id', 'numerical, process', 'integerOnly'=>true),
			array('need_refresh', 'boolean'),
			array('name, vdbfile', 'length', 'max'=>45),
			array('vdbfile', 'file', 'types'=>'vdb', 'allowEmpty'=>true, 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, vdbfile, user_id, need_refresh, process', 'safe', 'on'=>'search'),
		);
	}
	
	public function behaviors(){
		return array(
			'NUploadFile' => array(
				'class' => 'ext.NUploadFile',
				'fileField' => 'vdbfile',
				'renameFile' => false
			)
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'vdbDsRes' => array(self::HAS_MANY, 'VdbDsRes', 'vdb_id'),
			'vdbtables' => array(self::HAS_MANY, 'Vdbtables', 'vdb_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'VDB name',
			'vdbfile' => 'VDB file',
			'user_id' => 'User',
			'need_refresh' => 'Need refresh',
			'process' => 'Process',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('vdbfile',$this->vdbfile,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('need_refresh',$this->need_refresh);
		$criteria->compare('process',$this->process);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vdb the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/*
	public function fileLink() {
    	return CHtml::link($this->vdbfile, CHtml::normalizeUrl(array('file', 'id' => $this->id)));
    }

    public function deleteFile() {
    	if (strlen($this->vdbfile) > 0 && file_exists($this->fileWithPath()) && !is_dir($this->fileWithPath())) {
    		unlink($this->fileWithPath());
    	}
    }
    
    protected function afterDelete() {
    	parent::afterDelete();
    	$this->deleteFile();
    }
	*/
}
