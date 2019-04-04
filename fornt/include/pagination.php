<?php
	$con = mysqli_connect("localhost","root","","test");

	function pagination($con,$table,$pno,$n)
	{
		$totalRecords = 100000;
		$Pageno = $pno;
		$numberOfRecordsPerPage = $n;
		$pagination="";
		$last = ceil($totalRecords/$numberOfRecordsPerPage);
		if ($last!= 1) {
			for ($i=1; $i <= $last; $i++) { 
				$pagination ="<a href='".$i."'>$i</a>";
	
			}
		}
		return $pagination;
	}


	echo pagination($con,"xxx",1,10);

?>