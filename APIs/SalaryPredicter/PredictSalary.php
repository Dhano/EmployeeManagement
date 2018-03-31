<?php 
/**
  * Created by : Tirth Shah
  * Created at : 1:00 am 31-3-2018
  * Modifications made : none
  */
	class PredictSalary {
		//Here 'x' will be the months
		//Here 'y' will be the salary
		private $mean_x = 0 ;
		private $mean_y = 0 ;
	    private $sizeOfSalaryArray ;
	    private $salaryArray;
	    public function __construct($salaryArray) {
	    	$this->salaryArray = $salaryArray;
	    	$this->sizeOfSalaryArray = sizeof($salaryArray);
		}

		private function calculateMean() {
				for ($i = 0; $i < $this->sizeOfSalaryArray; $i++) {
					$this->mean_x += $i+1;
					$this->mean_y +=  $this->salaryArray[$i];
				}
				$this->mean_x /= $this->sizeOfSalaryArray;
				$this->mean_y /= $this->sizeOfSalaryArray;
		}

		//Here coeffiecient Of Regression will be b(yx) since value of x will be input and the expected value y will be its output
		private function calculateRegressionCoefficient() {
			$summation_xy = 0;
			$summation_xsquare = 0;
			$this->calculateMean();
			for ($i = 0; $i < $this->sizeOfSalaryArray; $i++) {
				$summation_xy += ($i+1)*$this->salaryArray[$i];
				$summation_xsquare += (($i+1)*($i+1));
			}
			
			$size = $this->sizeOfSalaryArray;
			//this is the formula for coefficient of correlation
			$numerator = $summation_xy - (($this->sizeOfSalaryArray)) * $this->mean_x * $this->mean_y;
			$denominator = $summation_xsquare - (($this->sizeOfSalaryArray)*$this->mean_x*$this->mean_x);
			$b = $numerator / $denominator;
			return $b;
		}

		//Give the month number as input and it will give the salary 
	 	public function predictSalary($x){
			$b = $this->calculateRegressionCoefficient();
			$y = ($b * ($x - $this->mean_x)) + $this->mean_y;
			return $y;
		}	

	} 

	$a = array(100 , 200 , 400 , 800 , 1600 , 3200);
	$calcSalary = new PredictSalary($a);
	$salary = $calcSalary->predictSalary(7);
	echo " Salary = $salary" ;

?>