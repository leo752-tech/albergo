<?php

class CStatistics{

    public static function roomOccupancyRate($id){
        $view = new VStatistics();
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
        $view->roomOccupancyRate($occupied, $total);
        return $occupied/$total;
    }

    public static function nightsPerStay($id){
        $view = new VStatistics();
        $occupied = 0;
        $bookings = FPersistentManager::getInstance()->getBookingsByRoom($id);
        foreach($bookings as $book){
            $checkIn = new DateTime($book["checkInDate"]);
            $checkOut = new DateTime($book["checkOutDate"]);
            $length = $checkIn->diff($checkOut);
            $occupied += $length->days;
        }
        $view->nightsPerStay($occupied, count($bookings));
        return $occupied/count($bookings);
        
    }

    public static function cancellationRate($id){
        $view = new VStatistics();
        $cancellated = 0;
        $bookings = FPersistentManager::getInstance()->getBookingsByRoom($id);
        foreach($bookings as $book){
            if($book["cancellation"]==true){
                $cancellated += 1;
            }
        }
        $view->cancellationRate($cancellation, count($bookings));
        return $cancellated/count($bookings);
       
    }

    public static function roomRevenue($id){
        $view = new VStatistics();
        $totalRevenue = 0;
        $bookings = FPersistentManager::getInstance()->getBookingsByRoom($id);
        foreach($bookings as $book){
            if($book["cancellation"]!=true){
                $revenue = $book["totalPrice"];
                $totalRevenue += $revenue;
            }
        }
        $view->roomRevenue($totalRevenue);
        return $totalRevenue;
    }

    public static function extraServiceRevenue($idExtraService){
        $view = new VStatistics();
        $result = FPersistentManager::getInstance()->getBookingsExtraServices($idExtraService);
        $service = FPersistentManager::getInstance()->getObject("EExtraService", $idExtraService);
        $nServices = count($result);
        $price = $service->getPrice();
        echo "nServece: " . $nServices . " Price: " . $price;
        $totalRevenue = $nServices*$price;
        $view->extraServiceRevenue($totalRevenue);
        return $totalRevenue;

    }

    public static function occupancyByPriceRange($price1, $price2){
        $result = FPersistentManager::getInstance()->getBookingsByPrice($price1, $price2);
    }

    public static function reviewRating(){
        $view = new VStatistics();
        $rating = [0,0,0,0,0];
        $reviews = FPersistentManager::getInstance()->getAll("EReview");
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
        $view->reviewRating($rating);
        return $rating;
    }

    public static function frequentKeyword(){
        $view = new VStatistics();
        $reviews = FPersistentManager::getInstance()->getAll("EReview");
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

        $view->frequentKeyWord($frequentKeywords);
        return $frequentWords;

    }



}