<?php

/**
 * This is the model class for table "sm_sms".
 *
 * The followings are the available columns in table 'sm_sms':
 * @property integer $id
 * @property string $address
 * @property string $datehandle
 * @property boolean $read
 * @property integer $type
 * @property string $body
 * @property boolean $seen
 */
class Sms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sms the static model class
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
		return 'sm_sms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address, read, type, body, seen', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('address', 'length', 'max'=>128),
			array('body', 'length', 'max'=>160),
			array('datehandle', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, address, datehandle, read, type, body, seen', 'safe', 'on'=>'search'),
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
			'address' => 'Address',
			'datehandle' => 'Datehandle',
			'read' => 'Read',
			'type' => 'Type',
			'body' => 'Body',
			'seen' => 'Seen',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('datehandle',$this->datehandle,true);
		$criteria->compare('read',$this->read);
		$criteria->compare('type',$this->type);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('seen',$this->seen);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}