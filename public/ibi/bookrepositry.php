<?php

/**
 * @copyright Copyright (c) 5/12/16 compeast.
 * @license Proprietary
 * @author Mohamed Ziada <mohamed@compeast.com>
 */
include_once('simple_html_dom.php');
include_once('RandomStringGenerator.php');
ini_set('default_charset', 'UTF-8');

error_reporting(E_ALL ^ E_STRICT ^ E_USER_DEPRECATED);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

ini_set('xdebug.var_display_max_depth', 8);
ini_set('xdebug.var_display_max_children', 512);
ini_set('xdebug.var_display_max_data', 1024);



class bookrepositry {
    
    /** function to get rmformat
    * @param decimal $p_wegiht wegiht of book
    * @param decimal $p_depth depth of book
    * @param decimal $p_length length of book
    * @param decimal $p_width width of book
    * @param int $p_pages no of pages
    * @param char $p_format mailformat
    * @return char $mailformat
    */
   function rmformat($p_wegiht, $p_depth, $p_length, $p_width, $p_pages, $p_format){
       $mail_format = $p_format;
       if ($p_wegiht > 0 AND $p_depth > 0 AND $p_length > 0 AND $p_width > 0) {// All dimensions are available:
           If ($p_wegiht > 720 OR $p_depth > 24 OR $p_length > 300 OR $p_width > 300) {
               $mail_format = 'SP';
           } else If ($p_wegiht <= 720 AND $p_depth <= 24 AND $p_length <= 300 AND $p_width <= 300) {
               $mail_format = 'LL';
           }
       }
   //======p_depth================
       if ($p_depth > 0 && $p_format == 'UN') {
           if ($p_depth > 24) {
               $mail_format = 'SP';
           } else {
               $mail_format = 'LL';
           }
       }
   //======$p_wegiht=========
       if ($p_wegiht > 0) {
           if ($p_wegiht > 350) {
               $mail_format = 'SP';
           } else {
               $mail_format = 'LL';
           }
       }
   //==========$p_pages===========
       if ($p_pages > 0) {
           if ($p_pages > 300) {
               $mail_format = 'SP';
           } else if ($p_pages <= 300 && $mail_format != 'SP') {
               $mail_format = 'LL';
           }
       }
       return $mail_format;
   }

    public function booksInfo() {
        
        require_once("config.php");
        // Create new instance of generator class.
        $generator = new RandomStringGenerator;
        $file_name = "xht";
        $file = fopen("bookdepo_$file_name.csv", "a");
        $header = [
            "Format" => null,
            "Dimensions" => null,
            "Publication date" => null,
            "Publisher" => null,
            "Imprint" => null,
            "Publication City/Country" => null,
            "Language" => null,
            "Edition" => null,
            "Edition statement" => null,
            "Illustrations note" => null,
            "ISBN10" => null,
            "ISBN13" => null,
            "Sales rank" => null,
        ];
        $count = 0;
        
        $query = mysqli_query($con, "select * from BAT where weight=0 and last_updated_at is null");
//        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
//        echo "<pre>";
//        die(print_r($row));
        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            
                
                $isbnVal = $row['isin'];
                if ($count == 1000) {
                    die();
                }
                echo $count . "=> " . $isbnVal . PHP_EOL;
                $book = [
                    "Format" => null,
                    "Dimensions" => null,
                    "Publication date" => null,
                    "Publisher" => null,
                    "Imprint" => null,
                    "Publication City/Country" => null,
                    "Language" => null,
                    "Edition" => null,
                    "Edition statement" => null,
                    "Illustrations note" => null,
                    "ISBN10" => null,
                    "ISBN13" => null,
                    "Sales rank" => null,
                ];
//                echo __LINE__;
                // Set token length.
                $tokenLength = 5;
                // Call method to generate random string.
                $token = $generator->generate($tokenLength);
//                $html = file_get_html('http://www.bookdepository.com/' . $token . '/' . $isbnVal);
                $html = $this->curl('http://www.bookdepository.com/' . $token . '/' . $isbnVal, $proxy);
//                die('http://www.bookdepository.com/' . $token . '/' . $isbnVal);
                echo "<textarea>" . $proxy ."\n" . $html . "</textarea>";
                
                $html = str_get_html($html);
                
                if( $html == "" || empty($html) || !is_object($html) || !isset($html->nodes))continue;

		if(count($html->find('ul[class=biblio-info]')) == 0)continue;
		
                foreach ($html->find('ul[class=biblio-info]') as $ul) {
                    foreach ($ul->find('li') as $li) {
                        $label = trim($li->find('label')[0]->plaintext);
                        $_value = preg_replace(array('~\s+~'), ' ', trim($li->find('span')[0]->plaintext));
                        $value = str_replace(",", "", $_value);
                        $book[$label] = $value;
                    }
                    fputcsv($file, $book, ',', '"');
                }
                foreach ($html->find('div[class=item-block]') as $blk) {
                    foreach ($blk->find('div[class=item-img]') as $div) {
                        $src = $div->find('img')[0]->src;
                        file_put_contents("images/".$isbnVal . '.jpg', file_get_contents($src));
                    }
                }
                
                
                if(preg_match('~([0-9\.]+) x ([0-9\.]+) x ([0-9\.]+)mm \| ([0-9\.]+)g~', $book['Dimensions'], $dec)){
                    $new['length'] = $dec[2];
                    $new['width'] = $dec[1];
                    $new['depth'] = $dec[3];
                    $new['weight'] = $dec[4];
                }elseif(preg_match('~([0-9\.]+) x ([0-9\.]+)mm\s+\|\s+([0-9\.]+)g~', $book['Dimensions'], $dec)){
                    $new['length'] = $dec[2];
                    $new['width'] = $dec[1];
                    $new['depth'] = $row['depth'];
                    $new['weight'] = $dec[3];
                }elseif(preg_match('~([0-9\.]+) x ([0-9\.]+)mm~', $book['Dimensions'], $dec)){
                    $new['length'] = $dec[2];
                    $new['width'] = $dec[1];
                    $new['depth'] = $row['depth'];
                    $new['weight'] = $row['weight'];
                }else{
                    $new['length'] = $row['length'];
                    $new['width'] = $row['width'];
                    $new['depth'] = $row['depth'];
                    $new['weight'] = $row['weight'];
                }
                
                preg_match('~\| ([0-9]+) pages~', $book['Format'], $page);
                $new['pages'] = $page[1];
                $new['is_published'] = 1;
                $new['rmformat'] = $this->rmformat($new['weight'], $new['depth'], $new['length'], $new['width'], $new['pages'], $row['rmformat']);
//                rmformat($p_wegiht, $p_depth, $p_length, $p_width, $p_pages, $p_format)
                
//                if($new['length'] != "" && $new['weight'] != "" && $new['pages'] != ""){
                if($new['pages'] != "" || $new['weight'] != ""){
                    $sql = "UPDATE BAT set"
                            . " length = '" . $new['length'] . "'"
                            . " ,width = '" . $new['width'] . "'"
                            . " ,depth = '" . $new['depth'] . "'"
                            . " ,pages = '" . $new['pages'] . "'"
                            . " ,weight = '" . $new['weight'] . "'"
                            . " ,is_published = '" . $new['is_published'] . "'"
                            . " ,rmformat = '" . $new['rmformat'] . "'"
                            . " ,last_updated_at = now()"
                            . " where isin = " . $isbnVal;
                    
                    echo $sql . "<br>";
                    $update = mysqli_query($con, $sql);
                }
                
                
                $count++;

                $sleepPeroid = rand(1, 20);
                sleep($sleepPeroid);
                
            
            
            
            echo "<pre>";
            print_r($new);
//            die(print_r($book));
        } // End While LOOP
        echo $count;

        fclose($file);
    }
    
    function curl($url, &$proxy){
//        $url = 'http://dynupdate.no-ip.com/ip.php';
        $proxies = array();
        $proxies[] = '61.135.217.20:80';
        $proxies[] = '211.143.155.222:80';
        $proxies[] = '211.143.155.222:81';
        $proxies[] = '180.173.247.122:8118';
        

	$proxies[] = '211.143.146.213:843';
	$proxies[] = '117.135.250.70:80';
	$proxies[] = '201.55.46.6:80';
	$proxies[] = '41.188.49.210:8080';
	$proxies[] = '117.135.250.70:80';
	$proxies[] = '177.220.164.102:80';
	$proxies[] = '64.73.142.129:80';
	$proxies[] = '111.84.229.114:8080';


        // Choose a random proxy
        if (isset($proxies)) {  // If the $proxies array contains items, then
            $proxy = $proxies[array_rand($proxies)];    // Select a random proxy from the array and assign to $proxy variable
        }
        
        //$proxyauth = 'user:password';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        //curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);

        return $curl_scraped_page;
    }
    
    
}

$book = new bookrepositry();
$book->booksInfo();
