<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $gender
 * @property string $address
 * @property integer $zipcode
 * @property integer $province_id
 * @property string $username
 * @property string $password
 * @property string $lastvisit
 * @property string $typeuser
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, gender, address, zipcode, province_id, username, password, typeuser', 'required'),
			array('id, zipcode, province_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>35),
			array('gender, username, password', 'length', 'max'=>15),
			array('address', 'length', 'max'=>250),
			array('typeuser', 'length', 'max'=>20),
			array('lastvisit', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, gender, address, zipcode, province_id, username, password, lastvisit, typeuser', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'gender' => 'Gender',
			'address' => 'Address',
			'zipcode' => 'Zipcode',
			'province_id' => 'Province',
			'username' => 'Username',
			'password' => 'Password',
			'lastvisit' => 'Lastvisit',
			'typeuser' => 'Typeuser',
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
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('zipcode',$this->zipcode);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('lastvisit',$this->lastvisit,true);
		$criteria->compare('typeuser',$this->typeuser,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
