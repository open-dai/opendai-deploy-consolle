<?php

/**
 * This is the model class for table "vdb_ds_res".
 *
 * The followings are the available columns in table 'vdb_ds_res':
 * @property integer $id
 * @property string $type
 * @property string $jndi
 * @property string $poolname
 * @property string $driver
 * @property string $dbname
 * @property string $dbuser
 * @property string $connectionurl
 * @property string $file
 * @property integer $vdb_id
 * @property integer $need_refresh
 * @property integer $process
 *
 * The followings are the available model relations:
 * @property Vdb $vdb
 */
class VdbDsRes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vdb_ds_res';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, jndi', 'required'),
			array('id, vdb_id, process', 'numerical', 'integerOnly'=>true),
			array('need_refresh', 'boolean'),
			array('file', 'file', 'types'=>'vdb', 'allowEmpty'=>true, 'on'=>'update'),
			array('type, jndi, poolname, driver, dbname, dbuser, connectionurl, file', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, jndi, poolname, driver, dbname, dbuser, connectionurl, file, vdb_id, need_refresh, process', 'safe', 'on'=>'search'),
		);
	}
	
	public function behaviors(){
		return array(
			'NUploadFile' => array(
				'class' => 'ext.NUploadFile',
				'fileField' => 'file',
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
			'vdb' => array(self::BELONGS_TO, 'Vdb', 'vdb_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'jndi' => 'Jndi',
			'poolname' => 'Poolname',
			'driver' => 'Driver',
			'dbname' => 'Dbname',
			'dbuser' => 'Dbuser',
			'connectionurl' => 'Connectionurl',
			'file' => 'File',
			'vdb_id' => 'Vdb',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('jndi',$this->jndi,true);
		$criteria->compare('poolname',$this->poolname,true);
		$criteria->compare('driver',$this->driver,true);
		$criteria->compare('dbname',$this->dbname,true);
		$criteria->compare('dbuser',$this->dbuser,true);
		$criteria->compare('connectionurl',$this->connectionurl,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('vdb_id',$this->vdb_id);
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
	 * @return VdbDsRes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getMultiModelForm()
	{
		//Can be a config file that returns the configuration too
		// return 'pathtoformconfig.formconfig';

		return array(
			'title'=>'Profile information',
			'elements'=>array(
				'type'=>array(
					'type'=>'dropdownlist',
					'items'=>array('DB'=>'DB','file'=>'File','WS'=>'WebService',),
					'prompt'=>'Please select:',
				),
				'jndi'=>array(
					'type'=>'text',
					'maxlength'=>40,
				),
				'poolname'=>array(
					'type'=>'text',
					'maxlength'=>40,
				),
				'driver'=>array(
					'type'=>'dropdownlist',
					'items'=>array('oracle'=>'oracle','mysql'=>'mysql','postgresql'=>'postgresql',),
					'prompt'=>'Please select:',
				),
				'dbname'=>array(
					'type'=>'text',
					'maxlength'=>40,
				),
				'dbuser'=>array(
					'type'=>'text',
					'maxlength'=>40,
				),
				'connectionurl'=>array(
					'type'=>'text',
					'maxlength'=>40,
				),
				'file'=>array(
					'type'=>'file',
					'maxlength'=>40,
				),
		));
	}  
}
