<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bank ammount</title>
</head>
<body>
    <?php
        class Bank_account{
            private $balance;
            public function __construct($balance){
                $this->balance = $balance;
            }
            public function addBalance($add){
                $this->balance += $add;
            }
            public function getBalance(){
                return $this->balance;
            }
        }
        $newAccount = new Bank_account(1000);
        $newAccount->addBalance(5000);

        echo $newAccount->getBalance();
    ?>
</body>
</html>