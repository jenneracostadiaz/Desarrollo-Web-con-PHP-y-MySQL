<?php 
    require ("page.php");
    class ServicesPage extends Page {
        private $row2buttons = array(
            "Re-engineering" => "reengineering.php",
            "Standards Compliance" => "standards.php",
            "Buzzword Compliance" => "buzzword.php",
            "Mission Statements" => "mission.php"
        );

        public function Display() {
            echo "<html>\n<head>\n";
            $this->DisplayTitle();
            $this->DisplayKeywords();
            $this->DisplayStyles();
            echo "</head>\n<body>\n";
            $this->DisplayHeader();
            $this->DisplayMenu($this->buttons);
            $this->DisplayMenu($this->row2buttons);
            echo $this->content;
            $this->DisplayFooter();
            echo "</body>\n</html>\n";
        }
    }

    $services = new ServicesPage();

    $services -> content ="<p>At TLA Consulting, we offer a number
    of services.  Perhaps the productivity of your employees would
    improve if we re-engineered your business. Maybe all your business
    needs is a fresh mission statement, or a new batch of
    buzzwords.</p>";

    $services->Display();

    class Math {
        static function squared($input){
            return $input*$input;
        }
    }
    $num = 12;
    echo "Math $num x $num = ".Math::squared($num);

    class myClass {
        public $a = "5";
        public $b = "7";
        public $c = "9";
        public $d = "10";
        public $e = "11";
    }

    $x = new myClass;
    foreach($x as $attr){
        echo $attr."<br />";
    }
?>