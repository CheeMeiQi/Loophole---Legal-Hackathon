<?php
    session_start();
    $user = 'root'; 
    $pass = '';
    $db='loophole';
    $conn = mysqli_connect('localhost', $user, $pass, $db);
    date_default_timezone_set("Singapore");
?>
<!DOCTYPE html>
<html>


<?php
    // Bing to run a trigger function once a day for this as well
    
    function lower($num) {
        if ($num == 0) {
            return -1;
        } else {
            return 0;
        }
    }
    //echo 'I enter the for loop';
    $bArr = json_decode($_POST["finalBArr"]);
    $currHelpAreas = array(); // Array of 1s and 0s
    $convertedHelpAreas = array(); // Converted array to compare with lawyers' 'quotes'
    $catalogue = ["crimDefence", "commCrime", "magComplaint", "cyberCrime", "harassment", "divorce", "syariahDivorce", "divorceInEng", "preNuptial", "personalProt", "adoption", "lpa", "probate", "wills", "muslimWills", "mentalCap", "trusts", "deedPolls", "notary", "iou", "bankruptcy", "commissioner", "powAttorney", "debtRecovery", "emplyDisputes", "medNeglce", "civilLit", "copyright", "personalInjury", "defamation", "mcst", "conveyancing", "landlord", "renovation"];
    $finalMatches = array(); // Array containing [beneficiary, lawyer] match pair arrays
    //echo 'I enter the for loop';
    //print_r($bArr[0][0]);
    // Step 3: Run through all 34 columns of beneficiary to find out which areas they need help with (aka the value is 1)
    for ($x = 0; $x < sizeof($bArr); $x++) {
        //echo 'I enter the for loop';
        $userId = $bArr[$x][0];
        $areas = "SELECT * FROM helpAreas WHERE userId = $userId;";
        $results = mysqli_query($conn, $areas);

        if ($results) {
            //echo 'console.log("I enter the for loop");';
            $resultCheck = mysqli_num_rows($results);
            $data = array();
            //echo 'I have found the beneficiary';
            if ($resultCheck > 0) {
                //echo 'I have found the beneficiary';
                while ($row = mysqli_fetch_assoc($results)) {
                    $data[] = $row;   
                }
                foreach($data as $single) {
                    for ($y = 0; $y < sizeof($single); $y++) {
                        array_push($currHelpAreas, (int) $single[$catalogue[$y]]);
                        array_push($convertedHelpAreas, lower((int) $single[$catalogue[$y]]));
                    }
                }
                //print_r($currHelpAreas);
                //print_r($convertedHelpAreas);

                $rightLawyers = "SELECT * FROM practiceAreas WHERE crimDefence >= $convertedHelpAreas[0] AND commCrime >= $convertedHelpAreas[1] AND magComplaint >= $convertedHelpAreas[2] AND cyberCrime >= $convertedHelpAreas[3] AND harassment >= $convertedHelpAreas[4] AND divorce >= $convertedHelpAreas[5] AND syariahDivorce >= $convertedHelpAreas[6] AND divorceInEng >= $convertedHelpAreas[7] AND preNuptial >= $convertedHelpAreas[8] AND personalProt >= $convertedHelpAreas[9] AND adoption >= $convertedHelpAreas[10] AND lpa >= $convertedHelpAreas[11] AND probate >= $convertedHelpAreas[12] AND wills >= $convertedHelpAreas[13] AND muslimWills >= $convertedHelpAreas[14] AND mentalCap >= $convertedHelpAreas[15] AND trusts >= $convertedHelpAreas[16] AND deedPolls >= $convertedHelpAreas[17] AND notary >= $convertedHelpAreas[18] AND iou >= $convertedHelpAreas[19] AND bankruptcy >= $convertedHelpAreas[20] AND commissioner >= $convertedHelpAreas[21] AND powAttorney >= $convertedHelpAreas[22] AND debtRecovery >= $convertedHelpAreas[23] AND emplyDisputes >= $convertedHelpAreas[24] AND medNeglce >= $convertedHelpAreas[25] AND civilLit >= $convertedHelpAreas[26] AND copyright >= $convertedHelpAreas[27] AND personalInjury >= $convertedHelpAreas[28] AND defamation >= $convertedHelpAreas[29] AND mcst >= $convertedHelpAreas[30] AND conveyancing >= $convertedHelpAreas[31] AND landlord >= $convertedHelpAreas[32] AND renovation >= $convertedHelpAreas[33];";

                // Obtaining lawyers that practice the current beneficiary's help areas
                $finalLawyers = mysqli_query($conn, $rightLawyers);

                //echo 'There is at least 1 lawyer that can help the beneficiary';

                if ($finalLawyers) {
                    $resultCheck2 = mysqli_num_rows($finalLawyers);
                    $data2 = array();
                    $availLawyers = array();

                    if ($resultCheck2 > 0) {
                        //echo 'There is at least 1 lawyer that can help the beneficiary';
                        while ($row4 = mysqli_fetch_assoc($finalLawyers)) {
                            $data2[] = $row4;   
                        }
                        foreach($data2 as $single4) {
                            // Getting the lawyer's Id
                            $lawyerId = $single4['userId'];
                            // Finding the lawyer's remaining number of cases
                            $remainingCases = "SELECT * FROM lawyers WHERE userId = $lawyerId;";
                            $cases = mysqli_query($conn, $remainingCases);
                            if ($cases) {
                                $resultCheck3 = mysqli_num_rows($cases);
                                $data3 = array();
                                if ($resultCheck3 > 0) {
                                    //echo 'There is at least 1 lawyer that can help the beneficiary';
                                    while ($row1 = mysqli_fetch_assoc($cases)) {
                                        $data3[] = $row1;   
                                    }
                                    foreach($data3 as $single1) {
                                        $remainingCases = $single1["remainingCases"];
                                    }
                                }
                            }

                            // Finding out if this lawyer has rejected this beneficiary before
                            $possibleRejection = "SELECT * FROM rejections WHERE lawyerId = $lawyerId AND beneficiaryId = $userId;";
                            $rejections = mysqli_query($conn, $possibleRejection);
                            
                            // If the lawyer is available and has not rejected beneficiary before
                            if ($remainingCases > 0 && mysqli_num_rows($rejections) == 0) {
                                // Obtaining the 'quotes' for the different practice areas
                                $currLawyer = "SELECT * FROM practiceAreas WHERE userId = $lawyerId;";
            
                                $currPracAreas = mysqli_query($conn, $currLawyer);
                                if ($currPracAreas) {
                                    $resultCheck4 = mysqli_num_rows($currPracAreas);
                                    $data4= array();

                                    if ($resultCheck4 > 0) {
                                        //echo 'I have at least 1 lawyer that I can match with';
                                        while ($row2 = mysqli_fetch_assoc($currPracAreas)) {
                                            $data4[] = $row2;   
                                        }
                                        foreach($data4 as $single2) {
                                            $indivArr = array();
                                            $total = 0;
                                            for ($z = 0; $z < sizeof($currHelpAreas); $z++) {
                                                if ($currHelpAreas[$j] == 1) {
                                                    // Accumulating the 'quotes' for the relevant areas
                                                    $total += $single2[$catalogue[$j]];
                                                }
                                            }
                                            array_push($availLawyers, array($lawyerId, $total, $remainingCases));
                                        }
                                    }
                                }
                            } else {
                                echo "Sorry, there are no available lawyers that are able to take up your case as of now.";
                                //echo "Beneficiary " . "2" . " is matched with lawyer " . "1" . "!";
                            }
                        }
                    
                        $currB = "SELECT * FROM beneficiaries WHERE userId = $userId;";
                        $budget = 0;
                        $waitPeriod = 0;
                        $currBFinding = mysqli_query($conn, $currB);

                        if ($currBFinding) {
                            $resultCheck5 = mysqli_num_rows($currBFinding);
                            $data5 = array();
                            if ($resultCheck5 > 0) {
                                //echo 'I am able to find the beneficiary';
                                while ($row3 = mysqli_fetch_assoc($currBFinding)) {
                                    $data5[] = $row3;   
                                }
                                foreach($data5 as $single3) {
                                    // Finding out the beneficiary's budget
                                    $budget = (int) $single3["budget"];
                                    $waitPeriod = (string) $single3["waitPeriod"];
                                }
                            }
                        }

                        // Comparing the budget against the 'quotes' to find the best lawyer
                        $currLawyerPos = 0;
                        while ($currLawyerPos < sizeof($availLawyers) && $budget - $availLawyers[$currLawyerPos][1] < 0) {
                            $currLawyerPos++;
                        }
                        if ($currLawyerPos == sizeof($availLawyers) - 1) {
                            // Adding the matched pair to the finalMatch array
                            array_push($finalMatches, array($userId, $availLawyers[$currLawyerPos][0], $waitPeriod));
                            // Immediately updating the number of avail cases for the lawyer as it will affect the next beneficiary

                            $cases = $availLawyers[$currLawyerPos][2];
                            $lawyerUserId = $availLawyers[$currLawyerPos][0];
                            $updateAvail = "UPDATE lawyers SET remainingCases = $cases WHERE userId = $lawyerUserId;";
                            mysqli_query($conn, $updateAvail);

                        } else if ($currLawyerPos < sizeof($availLawyers) - 1) {
                            $diff = $budget - $availLawyers[$currLawyerPos][1];
                            // Iterating through all possible lawyers to find the best match
                            for ($i = $currLawyerPos + 1; $i < sizeof($availLawyers); $i++) {
                                $currDiff = $budget - $availLawyers[$currLawyerPos][1];
                                if ($currDiff >= 0 && $currDiff < $diff) {
                                    $currLawyerPos = $i;
                                    $diff = $currDiff;
                                }
                            }
                            // Adding the matched pair to the finalMatch array
                            array_push($finalMatches, array($userId, $availLawyers[$currLawyerPos][0], $waitPeriod));
                            // Immediately updating the number of avail cases for the lawyer as it will affect the next beneficiary
                            $cases = $availLawyers[$currLawyerPos][2];
                            $lawyerUserId = $availLawyers[$currLawyerPos][0];
                            $updateAvail = "UPDATE lawyers SET remainingCases = $cases WHERE userId = $lawyerUserId;";
                            mysqli_query($conn, $updateAvail);
                        } else {
                            echo "Sorry, we are unable to find a lawyer that can match your price point at the moment.";
                            //echo "Beneficiary " . "Sarah" . " is matched with lawyer " . "1" . "!";
                            //echo "Beneficiary " . "2" . " is matched with lawyer " . "1" . "!";
                        }
                    } else {
                    echo "Sorry, there are no lawyers that offer all of the required practice areas.";
                    //echo "Beneficiary " . "2" . " is matched with lawyer " . "1" . "!";
                    }
                } else {
                    echo "I cannot do it :(";
                }
            }
        } else {
            echo "I cannot do it :(";
        }
    }

    for ($j = 0; $j < sizeof($finalMatches); $j++) {
        //echo "I make it to the final for loop";
        $days = $finalMatches[$j][2];
        //echo $days;
        //echo "I make it pass days";
        $newDate = new DateTime();
        //echo "I make it pass days";
        $newDate->add(new DateInterval("P" . "$days" . "D"));
        //echo "I make it pass days";
        $latestReq = $newDate->format('Y-m-d H:i:s');
        //echo $latestReq;
        //echo "I make it past datetime calc";
        // Updating the firstReqExpiry date if it is still null
        $lawyer = $finalMatches[$j][1];
        $beneficiary = $finalMatches[$j][0];

        $updateFirstReqDate = "UPDATE beneficiaries SET reqLawyerId = $lawyer, latestReqExpiry = '$latestReq', firstReqDate = '$latestReq' WHERE userId = $beneficiary AND firstReqDate is null;";

        mysqli_query($conn, $updateFirstReqDate);

        //echo "I make it past first query";
        // Updating the latestReqExpiry date (based on their wait period) and the reqLawyerId
        $sendRequest = "UPDATE beneficiaries SET reqLawyerId = $lawyer, latestReqExpiry = '$latestReq' WHERE userId = $beneficiary;";

        mysqli_query($conn, $sendRequest);

        echo "Beneficiary " . "$beneficiary" . " is matched with lawyer " . "$lawyer" . "!";
    }
    ?>
</html>
