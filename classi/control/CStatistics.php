<?php

class CStatistics{

    public static function roomOccupancyRate($id){
        //oggetto view
        $occupied = 0;
        $bookings = FPersistentManager::getInstance()->getBookingsByRoom($id);
        foreach($bookings as $book){
            $checkIn = new DateTime($book["checkInDate"]);
            $checkOut = new DateTime($book["checkOutDate"]);
            $length = $checkIn->diff($checkOut);
            $occupied += $length->days;
        }
        //decidere come impostare total
        $total = 1;
        return $occupied/$total;
        //visualizzazione
    }

    public static function nightsPerStay($id){
        //oggetto view
        $occupied = 0;
        $bookings = FPersistentManager::getInstance()->getBookingsByRoom($id);
        foreach($bookings as $book){
            $checkIn = new DateTime($book["checkInDate"]);
            $checkOut = new DateTime($book["checkOutDate"]);
            $length = $checkIn->diff($checkOut);
            $occupied += $length->days;
        }
        return $occupied/count($bookings);
        //visualizzazione
    }

    public static function cancellationRate($id){
        $cancellated = 0;
        $bookings = FPersistentManager::getInstance()->getBookingsByRoom($id);
        foreach($bookings as $book){
            if($book["cancellation"]==true){
                $cancellated += 1;
            }
        }
        return $cancellated/count($bookings);
       
    }

    public static function roomRevenue($id){
        $totalRevenue = 0;
        $bookings = FPersistentManager::getInstance()->getBookingsByRoom($id);
        foreach($bookings as $book){
            if($book["cancellation"]!=true){
                $revenue = $book["totalPrice"];
                $totalRevenue += $revenue;
            }
        }
        return $totalRevenue;
    }

    public static function extraServiceRevenue($idExtraService){
        $result = FPersistentManager::getInstance()->getBookingsExtraServices($idExtraService);
        $service = FPersistentManager::getInstance()->getObject("EExtraService", $idExtraService);
        $nServices = count($result);
        $price = $service->getPrice();
        echo "nServece: " . $nServices . " Price: " . $price;
        return $nServices*$price;

    }

    public static function occupancyByPriceRange($price1, $price2){
        $result = FPersistentManager::getInstance()->getBookingsByPrice($price1, $price2);
    }

    public static function reviewRating(){
        $rating = [0,0,0,0,0];
        $reviews = FPersistentManager::getInstance()->getAllReview();
        foreach($reviews as $review){
            switch($review["rating"]){
                case 1:
                    $rating[0] += 1;
                    break;
                case 2:
                    $rating[1] += 1;
                    break;
                case 3:
                    $rating[2] += 1;
                    break;
                case 4:
                    $rating[3] += 1;
                    break;
                case 5:
                    $rating[4] += 1;
                    break;
            }
        }
        return $rating;
    }

    public static function frequentKeyword(){
        $reviews = FPersistentManager::getInstance()->getAllReview();
        $words = array();
        $arrayWords = array();
        //fetching all the description as phrases
        foreach($reviews as $review){
            $arrayWords[] = str_word_count($review["description"], 1);
        }

        //fetching all phrases as words
        foreach($arrayWords as $phrase){
            foreach($phrase as $word){
                $words[] = $word;
            }
        }

        $frequentWords = array();
        foreach($words as $wordX){
            foreach($words as $word){
                if($wordX == $word && !isset($frequentWords[$wordX])){$frequentWords[$wordX] = 1;}
                elseif($wordX == $word && isset($frequentWords[$wordX])){$frequentWords[$wordX] += 1;}
            }
        }/*
        foreach($frequentWords as $value){
            if($value < 10){
                unset($value);
            }
        }*/

        return $frequentWords;

    }



}