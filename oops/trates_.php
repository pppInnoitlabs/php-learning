<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trates</title>
</head>
<body>
    <?php
            trait One{
                public function sound(){
                    echo "this is one";
                }
            }
            trait Two{
                public function sound(){
                    echo "this is Two";
                }
            }
            class Main{
                use One , Two{
                    One :: sound insteadof Two;
                    Two :: sound as Dsound;

                
                }
                public function sound(){
                    // echo "this is main";
                }
            }

            $obj = new Main();

            $obj->sound();
            $obj->Dsound();
    ?>
</body>
</html>