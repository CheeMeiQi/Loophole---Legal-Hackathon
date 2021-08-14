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
<form action="includes/match2.inc.php" method="POST" id="ele">
<script>
    <?php
        echo 'match();';
    ?>
    // Bing's trigger function: This whole process (Step 1-9) has to be run everytime a beneficiary clicks 'Refer me a lawyer' and every few hours (6 hours) and when a new lawyer joins and when a lawyer rejects a case

    // We will run for each person
    function match() {
         console.log("I make it to match"); //TEST
        // Step 1: Sort beneficiaries according to urgency score (datetime diff + categories) (put in an array)
        let currB, currCourt, currAbuse, currScore, tempArr, bArr;
        <?php
            $beneficiaries = "SELECT * FROM beneficiaries WHERE reqLawyerId = -1"; // IF reqLawyerId = -1 means beneficiary is not currently requesting any lawyers

            $results = mysqli_query($conn, $beneficiaries);
            if ($results) {
                $resultCheck = mysqli_num_rows($results);
                $data = array();
                if ($resultCheck > 0) {
                    echo 'console.log("I have obtained at least 1 unlawyered beneficiary");';
                    while ($row = mysqli_fetch_assoc($results)) {
                        $data[] = $row;   
                    }
                    foreach($data as $single) {
                        $currB = $single['userId'];
                        echo "currB = parseInt($currB);";
                        $currCourt = $single['court'];
                        echo "currCourt = parseInt($currCourt);";
                        $currAbuse = $single['abuse'];
                        echo "currAbuse = parseInt($currAbuse);";
                        $currScore = $currCourt + (2 * $currAbuse);
                        //TODO: Only calculating the total number of days waited right?
                        $firstReqDate = $single['firstReqDate'];
                        if ($firstReqDate != null) {
                            $interval = date_diff(new DateTime(), $firstReqDate);
                            $daysWaited = (int) $interval->format('%a');
                            $currScore += $daysWaited;
                        }
                        echo "tempArr = [$currB, $currScore];";
                        echo "bArr.push(tempArr);";
                    }
                }
            }
        ?>
        // Sorting beneficiaries
        bArr.sort(function(first, second) {
            return second[1] - first[1];
        });

        let finalBArr = document.createElement("input");
        finalBArr.type = "hidden";
        finalBArr.value = bArr;
        finalBArr.name = "finalBArr";
        ele.appendChild(finalBArr);

        ele.submit();
    }
</script>
</html>