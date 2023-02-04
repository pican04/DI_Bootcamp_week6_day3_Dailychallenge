<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dailychallenge</title>
    </head>
    <body>
    <h1>Electricity Bill</h1>
  <!--You need to write a PHP program to calculate electricity bill using if-else conditions.-->    
   <?php
    $result_str = $result = '';
    if (isset($_POST['unit-submit'])) {
        $units = $_POST['units'];
        if (!empty($units)) {
            $result = calculate_bill($units);
            $result_str = 'Total amount of ' . $units . ' - ' . $result;
        }
    }
    /* calculate electricity bill as per unit cost */
    function calculate_bill($units) {
        $firstCost = 3.50;
        $secondCost = 4.00;
        $thirdCost = 5.20;
        $fourthCost = 6.50;

        if($units <= 50) {
            $bill = $units * $firstCost;
        }
        else if($units > 50 && $units <= 100) {
            $temp = 50 * $firstCost;
            $resteUnits = $units - 50;
            $bill = $temp + ($resteUnits * $secondCost);
        }
        else if($units > 100 && $units <= 200) {
            $temp = (50 * 3.5) + (100 * $secondCost);
            $resteUnits = $units - 150;
            $bill = $temp + ($resteUnits * $thirdCost);
        }
        else {
            $temp = (50 * 3.5) + (100 * $secondCost) + (100 * $thirdCost);
            $resteUnits = $units - 250;
            $bill = $temp + ($resteUnits * $fourthCost);
        }
        return number_format((float)$bill, 2, '.', '');
    }

    /* Form */
    ?>
    <body>
        <div id="page-wrap">
            <h1>Calculate Electricity Bill</h1>

            <form action="" method="post" id="quiz-form">
                    <input type="number" name="units" id="units" placeholder="Please enter a number of Units" />
                    <input type="submit" name="unit-submit" id="unit-submit" value="Submit" />
            </form>

            <div>
                <?php echo '<br />' . $result_str; ?>
            </div>
        </div>
    </body>
</html>