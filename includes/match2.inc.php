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

    $bArr = $_POST["finalBArr"];
    $currHelpAreas = array(); // Array of 1s and 0s
    $convertedHelpAreas = array(); // Converted array to compare with lawyers' 'quotes'
    $catalogue = ["crimDefence", "commCrime", "magComplaint", "cyberCrime", "harassment", "divorce", "syariahDivorce", "divorceInEng", "preNuptial", "personalProt", "adoption", "lpa", "probate", "wills", "muslimWills", "mentalCap", "trusts", "deedPolls", "notary", "iou", "bankruptcy", "commissioner", "powAttorney", "debtRecovery", "emplyDisputes", "medNeglce", "civilLit", "copyright", "personalInjury", "defamation", "mcst", "conveyancing", "landlord", "renovation"];
    $finalMatches = array(); // Array containing [beneficiary, lawyer] match pair arrays

    // Step 3: Run through all 34 columns of beneficiary to find out which areas they need help with (aka the value is 1)
    for ($x = 0; $x < sizeof($bArr); $x++) {
        $areas = "SELECT * FROM helpAreas WHERE userId = $bArr[$x]";
        $results = mysqli_query($conn, $areas);

        if ($results) {
            $resultCheck = mysqli_num_rows($results);
            $data = array();
            if ($resultCheck > 0) {
                echo 'console.log("I have found the beeneficiary");';
                while ($row = mysqli_fetch_assoc($results)) {
                    $data[] = $row;   
                }
                foreach($data as $single) {
                    for ($y = 0; $y < sizeof($single); $y++) {
                        array_push($currHelpAreas, (int) $single[$catalogue[$y]]);
                        array_push($convertedHelpAreas, lower((int) $single[$catalogue[$y]]));
                    }
                }
                $rightLawyers = "SELECT * FROM helpAreas WHERE $crimDefence >= $convertedHelpAreas[0] AND $commCrime >= $convertedHelpAreas[1] AND $magComplaint >= $convertedHelpAreas[2] AND $cyberCrime >= $convertedHelpAreas[3] AND $harassment >= $convertedHelpAreas[4] AND $divorce >= $convertedHelpAreas[5] AND $syariahDivorce >= $convertedHelpAreas[6] AND $divorceInEng >= $convertedHelpAreas[7] AND $preNuptial >= $convertedHelpAreas[8] AND $personalProt >= $convertedHelpAreas[9] AND $adoption >= $convertedHelpAreas[10] AND $lpa >= $convertedHelpAreas[11] AND $probate >= $convertedHelpAreas[12] AND $wills >= $convertedHelpAreas[13] AND $muslimWills >= $convertedHelpAreas[14] AND $mentalCap >= $convertedHelpAreas[15] AND $trusts >= $convertedHelpAreas[16] AND $deedPolls >= $convertedHelpAreas[17] AND $notary >= $convertedHelpAreas[18] AND $iou >= $convertedHelpAreas[19] AND $bankruptcy >= $convertedHelpAreas[20] AND $commissioner >= $convertedHelpAreas[21] AND $powAttorney >= $convertedHelpAreas[22] AND $debtRecovery >= $convertedHelpAreas[23] AND $emplyDisputes >= $convertedHelpAreas[24] AND $megNeglce >= $convertedHelpAreas[25] AND $civilLit >= $convertedHelpAreas[26] AND $copyright >= $convertedHelpAreas[27] AND $personalInjury >= $convertedHelpAreas[28] AND $defamtion >= $convertedHelpAreas[29] AND $mcst >= $convertedHelpAreas[30] AND $conveyancing >= $convertedHelpAreas[31] AND $landlord >= $convertedHelpAreas[32] AND $renovation >= $convertedHelpAreas[33];";

                // Obtaining lawyers that practice the current beneficiary's help areas
                $finalLawyers = mysqli_query($conn, $rightLawyers);

                if ($finalLawyers) {
                    $resultCheck2 = mysqli_num_rows($finalLawyers);
                    $data2 = array();
                    $availLawyers = array();

                    if ($resultCheck2 > 0) {
                        echo 'console.log("There is at least 1 lawyer that can help the beneficiary");';
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
                                    echo 'console.log("I can find the remainingCases");';
                                    while ($row1 = mysqli_fetch_assoc($cases)) {
                                        $data3[] = $row1;   
                                    }
                                    foreach($data3 as $single1) {
                                        $remainingCases = $single1["remainingCases"];
                                    }
                                }
                            }

                            // Finding out if this lawyer has rejected this beneficiary before
                            $possibleRejection = "SELECT * FROM rejections WHERE lawyerId = $lawyerId AND beneficiaryId = $bArr[$x];";
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
                                        echo 'console.log("I have at least 1 lawyer that I can match with");';
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
                                echo 'console.log("Sorry, there are no available lawyers that are able to take up your case as of now.");';
                            }
                        }
                    
                        $currB = "SELECT * FROM beneficiaries WHERE userId = $bArr[$x];";
                        $budget = 0;
                        $waitPeriod = 0;
                        $currBFinding = mysqli_query($conn, $areas);

                        if ($currBFinding) {
                            $resultCheck5 = mysqli_num_rows($currBFinding);
                            $data5 = array();
                            if ($resultCheck5 > 0) {
                                echo 'console.log("I am able to find the beneficiary");';
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
                            array_push($finalMatches, array($bArr[$x], $availLawyers[$currLawyerPos][0], $waitPeriod));
                            // Immediately updating the number of avail cases for the lawyer as it will affect the next beneficiary
                            $updateAvail = "UPDATE lawyers SET $remainingCases = $availLawyers[$currLawyerPos][2] WHERE userId = $availLawyers[$currLawyerPos][0];";
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
                            array_push($finalMatches, array($bArr[$x], $availLawyers[$currLawyerPos][0], $waitPeriod));
                            // Immediately updating the number of avail cases for the lawyer as it will affect the next beneficiary
                            $updateAvail = "UPDATE lawyers SET $remainingCases = $availLawyers[$currLawyerPos][2] WHERE userId = $availLawyers[$currLawyerPos][0];";
                            mysqli_query($conn, $updateAvail);
                        } else {
                            echo 'console.log("Sorry, we are unable to find a lawyer that can match your price point at the moment.");';
                        }
                    } else {
                    echo 'console.log("Sorry, there are no lawyers that offer all of the required practice areas.");';
                    }
                }
            }
        }
    }

    for ($j = 0; $j < sizeof($finalMatches); $j++) {
        $newDate = new DateTime();
        $newDate->add(new DateInterval("P" . $finalMatches[$j][2] . "D"));
        $latestReq = $newDate->format('Y-m-d H:i:s');
        
        // Updating the firstReqExpiry date if it is still null
        $updateFirstReqDate = "UPDATE beneficiaries SET reqLawyerId = $finalMatches[$j][1], latestReqExpiry = $latestReq, firstReqDate = $latestReq WHERE userId = $finalMatches[$j][0] AND firstReqDate = null;";

        mysqli_query($conn, $updateFirstReqDate);

        // Updating the latestReqExpiry date (based on their wait period) and the reqLawyerId
        $sendRequest = "UPDATE beneficiaries SET reqLawyerId = $finalMatches[$j][1], latestReqExpiry = $latestReq WHERE userId = $finalMatches[$j][0];";

        mysqli_query($conn, $sendRequest);
    }

    // Terminate account function for beneficiaries
    // So (if it is the expiry date and confirmation still 0) or (confirmation is 1), then delete profile from sql
    function terminate($bId) {
        $caseConfirmDetails = "SELECT * FROM beneficiaries WHERE userId = $bId;";
        $confirmation = mysqli_query($conn, $caseConfirmDetails);

        if ($caseConfirmDetails) {
            $resultCheck = mysqli_num_rows($caseConfirmDetails);
            $data = array();

            if ($resultCheck > 0) {
                echo 'console.log("I have found the beneficiary record");';
                while ($row = mysqli_fetch_assoc($caseConfirmDetails)) {
                    $data[] = $row;   
                }
                foreach($data as $single) {
                    $caseDoneReqExpiry = $single["caseDoneReqExpiry"];
                    $caseDoneConfirm = (int) $single["caseDoneConfirm"];

                    if ($caseDoneConfirm == 1 || new DateTime() >= $caseDoneReqExpiry) {
                        $terminate = "DELETE * FROM users where userId = $bId;";
                        $removeB = "DELETE * FROM beneficiaries where userId = $bId;";
                        $removeRejected = "DELETE * FROM rejections where beneficiaryId = $bId;";
                        $removeHelpAreas = "DELETE * FROM helpAreas where userId = $bId;";

                        mysqli_query($conn, $terminate);
                        mysqli_query($conn, $removeB);
                        mysqli_query($conn, $removeRejected);
                        mysqli_query($conn, $removeHelpAreas);
                    }
                }
            }
        }
    }

    // Withdraw accounts function (for beneficiaries and lawyers) 
    //TODO: $userid will be the user's id as I am assuming this will be done from their profile
    function withdrawLawyer() {
        $currCases = "SELECT * FROM beneficiaries WHERE finalLawyerId = $userid;";
        $cases = mysqli_query($conn, $currCases);

        if ($cases) {
            $resultCheck = mysqli_num_rows($cases);
            $data = array();

            if ($resultCheck > 0) {
                // There are ongoing cases and thus cannot withdraw
                echo 'console.log("Sorry, you are unable to withdraw your account at the moment as you have at least ongoing case. If you have completed all your cases, please check with your beneficiaries on whether they have replied to the case confirmation request sent by you. You may check on pending requests at the case confirmation requests page. Thank you");';
            } else {
                $terminate = "DELETE * FROM users where userId = $userid;";
                $removeLawyer = "DELETE * FROM lawyers where userId = $userid;";
                $removeRejected = "DELETE * FROM rejections where lawyerId = $userid;";
                $removePracAreas = "DELETE * FROM practiceAreas where userId = $userid;";

                mysqli_query($conn, $terminate);
                mysqli_query($conn, $removeLawyer);
                mysqli_query($conn, $removeRejected);
                mysqli_query($conn, $removePracAreas);
            }
        }
    }

    //TODO: $userid will be the user's id as I am assuming this will be done from their profile
    function withdrawBeneficiary() {
        $bDetails = "SELECT * FROM beneficiaries WHERE userId = $userid;";
        $details = mysqli_query($conn, $bDetails);

        if ($details) {
            $resultCheck = mysqli_num_rows($details);
            $data = array();

            if ($resultCheck > 0) {
                echo 'console.log("I have found the beneficiary record");';
                while ($row = mysqli_fetch_assoc($details)) {
                    $data[] = $row;   
                }
                foreach($data as $single) {
                    $finalLawyerId = (int) $single["finalLawyerId"];
                    // If no lawyer has been officially attached to their case, beneficiary can withdraw the case
                    if ($finalLawyerId == -1) {
                        $terminate = "DELETE * FROM users where userId = $userid;";
                        $removeB = "DELETE * FROM beneficiaries where userId = $userid;";
                        $removeRejected = "DELETE * FROM rejections where beneficiaryId = $userid;";
                        $removeHelpAreas = "DELETE * FROM helpAreas where userId = $userid;";

                        mysqli_query($conn, $terminate);
                        mysqli_query($conn, $removeB);
                        mysqli_query($conn, $removeRejected);
                        mysqli_query($conn, $removeHelpAreas);
                    } else {
                        echo 'console.log("Sorry, you are unable to withdraw your profile as a lawyer is now looking into your case. If you wish to not pursue your case further, please inform your lawyer and request them to send a case confirmation request that will allow you to withdraw your profile. Thank you.");';
                    }
                }
            }
        }
    }

    // Reject function (what happens when a lawyer rejects a beneficiary?)
    // Lawyer's remainingCases increases by 1 and beneficiary gets thrown back into the algo
    function reject($bId) {
        $reject = "UPDATE beneficiaries SET reqLawyerId = -1 WHERE userId = $bId;";
        mysqli_query($conn, $reject);

        //TODO: userid in this case refers to lawyer's userid bc we are assuming this will be done from his or her profile
        //TODO: retrieve the remaining number of cases and + 1
        $updateRemainingCases = "UPDATE lawyers SET remainingCases =  WHERE userId = $userid;";
        mysqli_query($conn, $updateRemainingCases);
    }

    // Accepting function (what happens when a lawyer accepts a beneficiary?)
    function accept($bId) {
        //TODO: userid in this case refers to lawyer's userid bc we are assuming this will be done from his or her profile
        $accept = "UPDATE beneficiaries SET finalLawyerId = $userid WHERE userId = $bId;";
        mysqli_query($conn, $accept);
    }

    // Registering accounts (beneficiaries and lawyers)
    ?>
</html>
