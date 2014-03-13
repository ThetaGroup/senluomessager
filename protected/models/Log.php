<?php

/**
 * This is the model class for table "sm_log".
 *
 * The followings are the available columns in table 'sm_log':
 * @property integer $id
 * @property string $log_time
 * @property string $log_content
 * @property string $log_state
 */
class Log extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Log the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sm_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_time, log_content, log_state', 'required'),
			array('log_content, log_state', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, log_time, log_content, log_state', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'log_time' => '记录时间',
			'log_content' => '记录内容',
			'log_state' => '记录状态',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('log_time',$this->log_time,true);
		$criteria->compare('log_content',$this->log_content,true);
		$criteria->compare('log_state',$this->log_state,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array('defaultOrder'=>'id DESC'),
		));
	}
}
