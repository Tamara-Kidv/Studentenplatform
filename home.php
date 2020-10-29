<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        <main>
            <img id="homeimg" src="images/Stendenhome.jpg" alt="foto van de school">

                <div id="Hgrid">
                    <div id="Homeleft">
                        <h2 class="Homekopje">Latest News:</h2> 
                        <?php 
                            $feeds = array(
                            "https://www.nu.nl/rss/Tech",
                            "http://feeds.feedburner.com/tweakers/nieuws"
                            );
                            $entries = array();
                            foreach($feeds as $feed) {
                                $xml = simplexml_load_file($feed);
                                $entries = array_merge($entries, $xml->xpath("//item"));
                            }
                            usort($entries, function ($feed1, $feed2) {
                                return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
                            });
                        ?>
                        <div class="homenews">
                            <?php
                                //Print all the entries
                                $NUMITEMS   = 3;

                                $count = 0;
                                foreach($entries as $entry){
                            ?>
                            <div>
                                <div>
                                    <br>
                                    <h3><?= $entry->title ?></h3>
                                    <p id="homep"><?= strftime('%A %e %B %Y %T', strtotime($entry->pubDate)) ?></p>
                                    <p id="homep"><?= $entry->description ?></p>
                                    <a class="leesmeer" href="<?= $entry->link ?>">Lees Meer</a>
                                    <hr>
                                </div>
                            </div>
                            <?php
                            if(++$count >= $NUMITEMS) break;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="Homeline"></div>
                   
                    <div id="Homemid">
                        <h5 class="Homekopje">Soon in agenda:</h5>
                        <?php 
                            $feeds = array(
                            "Article.xml"
                            );
                            $entries = array();
                        foreach($feeds as $feed) {
                            $xml = simplexml_load_file($feed);
                            $entries = array_merge($entries, $xml->xpath("//item"));
                        }
                        usort($entries, function ($feed1, $feed2) {
                            return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
                        });
                        ?>
                        <div class="homenews">
                        <?php
                        //Print all the entries
                        $NUMITEMS   = 3;

                        $count = 0;
                        foreach($entries as $entry){
                        ?>
                        <div>
                            <div>
                                <br>
                                <h3><?= $entry->title ?></h3>
                                <p id="homep"><?= strftime('%A %e %B %Y %T', strtotime($entry->pubDate)) ?></p>
                                <p id="homep"><?= $entry->description ?></p>
                                <a class="leesmeer" href="readblog.php?title=<?= $entry->title ?>">Lees Meer</a>
                                <hr>
                            </div>
                        </div>
                        <?php
                        if(++$count >= $NUMITEMS) break;
                        }
                        ?>
                        </div>
                    </div>
                    <div id="homecalendar">
        <?php
        
        class Calendar {  
     
    /**
     * Constructor
     */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show() {
        $year  = null;
         
        $month = null;
         
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        return $content;   
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;

                $this->currentDay++;   

        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }
             
         
        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
    }
     
    /**
    * create navigation
    */
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="header">'.
                '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
            '</div>';
    }
         
    /**
    * create calendar week labels
    */
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
 
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
     
}

    $calendar = new Calendar();

    echo $calendar->show();
        ?>
             
            
                    <div id="FaQhome">
                        <h2 class="Homekopje">FAQ:</h2>
                        <ul id="homelist">
                            <li><a href="http://localhost/studentenplatform/index.php?FAQ">How is NHL Stenden handeling the situation around Covid-19 virus?</a></li>
                            <li><br></li>
                            <li><a href="http://localhost/studentenplatform/index.php?FAQ">Where can i order my books?</a></li>
                            <li><br></li>
                            <li><a href="http://localhost/studentenplatform/index.php?FAQ">How can i see my schedule?</a></li>
                            <li><br></li>
                            <li><a href="http://localhost/studentenplatform/index.php?FAQ">See more...</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
