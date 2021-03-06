<?php 

class Orders { 
    
     var 	$id;
     var	$product;
     var    $idprod;
     var	$price;
     var    $name;
     var	$fname;
     var	$email; 
	 var	$date;
	 var	$time;

	public function tableName()
	{
		return '{{orders}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, product, idprod, price, name, fname, email, date, time', 'required'),
			array('id, idprod', 'numerical', 'integerOnly'=>true),
			array('product, name, fname, email', 'length', 'max'=>100),
			array('price', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product, idprod, price, name, fname, email, date, time', 'safe', 'on'=>'search'),
            array('email', 'email'),
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
			'product' => 'Product',
			'idprod' => 'Idprod',
			'price' => 'Price',
			'name' => 'Name',
			'fname' => 'Fname',
			'email' => 'Email',
			'date' => 'Date',
			'time' => 'Time',
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
		$criteria->compare('product',$this->product,true);
		$criteria->compare('idprod',$this->idprod);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
  function Orders($name,$fname,$email)
  
   {    
        $this->name  = $name; 
        $this->fname  = $fname;
        $this->email = $email;       
    } 
  
   function check_form()
   { 
     $s1 = trim($this->email);
     $s2 = trim($this->name);
     $s3 = trim($this->fname);
     if (strpos($this->email, '@')===false) return false; 
     if ((strlen($s1)<5)||(strlen($s2)<5)||(strlen($s3))<5) return false;
  
    return true;
   }
   
} 

?>