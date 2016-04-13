<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    public function business()
    {
    	return $this->belongsTo(Business::class, 'license_number', 'license_number');
    }





    public function getInspectionDetails($inspectionVisitId, $inspectionNumber)
    {
    	$numberOfSections = 0;

	    $startOfSection = "<td><font face='verdana' size='-1' color=\"red\">";
	    $currentSectionPointer = 0;
	    
	    $beforeCode = ")\"><u>";
	    $codeStartPointer = 0;
	    $afterCode = "</u></a></font>";
	    $codeEndPointer = 0;

	    $beforeDescription = "<font face='verdana' size='-1'>";
	    $descriptionStartPointer = 0;
	    $afterDescription = "</font>";
	    $descriptionEndPointer = 0;

	    // See if it is already in local DB
	    $inspectionViolationDetails = $this->get_inspection_violation_details($inspectionVisitId);
	    if(count($inspectionViolationDetails))
	    {
	    	return $inspectionViolationDetails;
	    }

	    // Get file
	    $uri = "https://www.myfloridalicense.com/inspectionDetail.asp?InspVisitID=" . $inspectionVisitId . "&id=" . $inspectionNumber;

	    $fileContents = file_get_contents($uri);


	    if ($fileContents) 
	    {
	        
	        $results = array();
	        // Find out how many sections (report entries)
	        $numberOfSections = substr_count($fileContents, $startOfSection);
	        // Set pointer to first section
	        $currentSectionPointer = strpos($fileContents, $startOfSection);

	        // Loop over each section
	        for ($i=0; $i < $numberOfSections ; $i++) 
	        { 
	        
	            // Set pointer for start of code
	            $codeStartPointer = strpos($fileContents, $beforeCode, $currentSectionPointer) + strlen($beforeCode);   

	            // Set pointer for end of code
	            $codeEndPointer = strpos($fileContents, $afterCode, $codeStartPointer);

	            // Get code
	            $key = substr($fileContents, $codeStartPointer,$codeEndPointer-$codeStartPointer);


	            //Set pointer for start of description
	            $descriptionStartPointer = strpos($fileContents, $beforeDescription, $codeEndPointer) + strlen($beforeDescription);

	            // Set pointer for end of description
	            $descriptionEndPointer = strpos($fileContents, $afterDescription, $descriptionStartPointer);

	            // Get description
	            $val = trim(substr($fileContents, $descriptionStartPointer, $descriptionEndPointer-$descriptionStartPointer));

	             // Save to DB
		        $this->save_inspection_detail_item($val,$key,$inspectionVisitId,$inspectionNumber);


	            //$results = $this->array_push_assoc($results, $key, $val);
				//dd($results);

		        $inspectionViolationDetail 						= new inspectionViolationDetail();
		        $inspectionViolationDetail->text 				= $key;
		        $inspectionViolationDetail->violationCode		= $val;
		        $inspectionViolationDetail->inspectionVisitId	= $inspectionVisitId;
		        $inspectionViolationDetail->inspectionNumber 	= $inspectionNumber;
		        $results[] = $inspectionViolationDetail; 

	            $currentSectionPointer = $codeEndPointer;

	        }
	       
	       

	        return $results;

	    }
	    else
	    {
	        return "";
	    }
    }
    private function get_inspection_violation_details($inspectionVisitId)
    {
    	$inspectionViolationDetails = inspectionViolationDetail::where('inspectionVisitId', '=', $inspectionVisitId)->get();

	    	return $inspectionViolationDetails;
	    
    }
    private function save_inspection_detail_item($text,$violationCode,$inspectionVisitId,$inspectionNumber)
    {
    	$inspectionViolationDetail 		 				= new inspectionViolationDetail();
        $inspectionViolationDetail->text 				= $text;
        $inspectionViolationDetail->violationCode		= $violationCode;
        $inspectionViolationDetail->inspectionVisitId	= $inspectionVisitId;
        $inspectionViolationDetail->inspectionNumber 	= $inspectionNumber;
        $inspectionViolationDetail->save();
    }

    private function array_push_assoc(&$array, $key, $value)
    {
		$array[$key] = $value;
		return $array;
	}
}
