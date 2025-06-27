

<?php

class UStatistiche {

    public static function calculateStats($rooms, $bookings, $extraServices, $bookedServices, $reviews) {
        $now = new DateTime();
        $roomStats = [];
        $roomRevenue = [];
        $extraRevenue = [];
        $cancelled = 0;
        $totalNights = 0;

        //-----------------STATISTICHE CAMERE------------------------------------
        foreach ($rooms as $room) {
            $idRoom = $room['idRoom'] ?? null;
            if (!$idRoom) continue;

            $createdDate = new DateTime($room['created_at'] ?? '2024-01-01');
            $daysAvailable = $createdDate->diff($now)->days;

            $nightsBooked = 0;
            $revenue = 0;

            foreach ($bookings as $b) {
                if (($b['idRoom'] ?? null) == $idRoom) {
                    $checkIn = new DateTime($b['checkInDate']);
                    $checkOut = new DateTime($b['checkOutDate']);
                    $diff = $checkIn->diff($checkOut)->days;

                    $nightsBooked += $diff;
                    $revenue += (float) $b['totalPrice'];
                    $totalNights += $diff;

                    if (!empty($b['cancellation'])) {
                        $cancelled++;
                    }
                }
            }

            $roomStats[] = [
                'room' => $room['name'],
                'occupancy_rate' => $daysAvailable > 0 ? round(($nightsBooked / $daysAvailable) * 100, 2) : 0,
                'revenue' => round($revenue, 2)
            ];

            $roomRevenue[$room['name']] = round($revenue, 2);
        }

        // -------------------------PRENOTAZIONI ------------------------------------------
        $totalBookings = count($bookings);
        $avgStay = $totalBookings > 0 ? round($totalNights / $totalBookings, 2) : 0;
        $cancelRate = $totalBookings > 0 ? round(($cancelled / $totalBookings) * 100, 2) : 0;

        //-----------------------SERVIZI EXTRA----------------------------------------------
        foreach ($extraServices as $service) {
            $idService = $service['idExtraService'] ?? null;
            if (!$idService) continue;

            $name = $service['name'];
            $price = (float) $service['price'];
            $count = 0;

            foreach ($bookedServices as $entry) {
                if (($entry['idExtraService'] ?? null) == $idService) {
                    $count++;
                }
            }

            $extraRevenue[$name] = round($count * $price, 2);
        }

        $totalExtraRevenue = array_sum($extraRevenue);

        //----------------------------DISTRIBUZIONE VOTI RECENSIONI----------------------------------------------------
        $reviewRatings = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
        foreach ($reviews as $r) {
            $rating = (int) ($r['rating'] ?? 0);
            if (isset($reviewRatings[$rating])) {
                $reviewRatings[$rating]++;
            }
        }

        //--------------------------------------PAROLE FREQUENTI NELLE DESCRIZIONI------------------------------------------
        $frequentWords = [];
        foreach ($reviews as $r) {
            $words = str_word_count(strtolower($r['description'] ?? ''), 1);
            foreach ($words as $word) {
                if (strlen($word) > 3) {
                    $frequentWords[$word] = ($frequentWords[$word] ?? 0) + 1;
                }
            }
        }

        arsort($frequentWords);
        $topWords = array_slice($frequentWords, 0, 10);

        return [
            'roomStats' => $roomStats,
            'avgStay' => $avgStay,
            'cancelRate' => $cancelRate,
            'roomRevenue' => $roomRevenue,
            'extraServiceRevenue' => $totalExtraRevenue,
            'reviewRatings' => array_values($reviewRatings), 
            'frequentKeywords' => $topWords
        ];
    }
}




