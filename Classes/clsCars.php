<?php
	
	class clsCars extends clsDBConnection
	{
		private $StockNumber;	
		private $Make;	
		private $Model;	
		private $Status;	
		private $RegYear;	
		private $BodyType;	
		private $Engine;	
		private $DriveTrain;
		private $Transmission;	
		private $FuelType;	
		private $OldPrice;	
		private $CurrentPrice;	
		private $Mileage;	
		private $Doors;	
		private $Seats;	
		private $ExtColor;	
		private $IntColor;	
		private $Photo;
		
		function __construct($Make, $Model, $Status, $RegYear, $BodyType, $Engine, 
							 $DriveTrain, $Transmission, $FuelType, $OldPrice, $CurrentPrice, 
							 $Mileage, $Doors, $Seats, $ExtColor, $IntColor, $Photo, 
							 $StockNumber = null )
		{
			$this->StockNumber = $StockNumber;	
			$this->Make = $Make;	
			$this->Model = $Model;	
			$this->Status = $Status;	
			$this->RegYear = $RegYear;	
			$this->BodyType = $BodyType;	
			$this->Engine = $Engine ;	
			$this->DriveTrain = $DriveTrain;
			$this->Transmission = $Transmission;	
			$this->FuelType = $FuelType;	
			$this->OldPrice = $OldPrice;	
			$this->CurrentPrice = $CurrentPrice;	
			$this->Mileage = $Mileage;	
			$this->Doors = $Doors;	
			$this->Seats = $Seats;	
			$this->ExtColor = $ExtColor;	
			$this->IntColor = $IntColor;	
			$this->Photo = $Photo;

		}	
		
		public static function GetCarInfo($query)
		{
			$result = self::SQLSelect($query);			
			
			return $result;
		}
		
		public static function AddNewCar()
		{
			///TODO
		}
	}
?>

