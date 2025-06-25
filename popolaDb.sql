USE `hotel_db`;

-- Populating `User` table
INSERT INTO `User` (`firstName`, `lastName`, `birthDate`, `birthPlace`) VALUES
('Alice', 'Smith', '1985-03-15', 'London'),
('Bob', 'Johnson', '1990-07-22', 'New York'),
('Charlie', 'Brown', '1978-11-01', 'Paris'),
('Diana', 'Prince', '1992-01-20', 'Rome'),
('Ethan', 'Hunt', '1980-05-30', 'Berlin'),
('Fiona', 'Gallagher', '1995-09-10', 'Dublin'),
('George', 'Costanza', '1970-02-28', 'Madrid'),
('Hannah', 'Montana', '2000-04-05', 'Tokyo'),
('Ivy', 'Queen', '1983-12-12', 'Mexico City'),
('Jack', 'Sparrow', '1975-06-25', 'Sydney');

-- Populating `RegisteredUser` table
INSERT INTO `RegisteredUser` (`idUser`, `email`, `password`, `firstName`, `lastName`, `birthDate`, `birthPlace`) VALUES
(1, 'alice.smith@example.com', 'hashedpass1', 'Alice', 'Smith', '1985-03-15', 'London'),
(2, 'bob.johnson@example.com', 'hashedpass2', 'Bob', 'Johnson', '1990-07-22', 'New York'),
(3, 'charlie.brown@example.com', 'hashedpass3', 'Charlie', 'Brown', '1978-11-01', 'Paris'),
(4, 'diana.p@example.com', 'hashedpass4', 'Diana', 'Prince', '1992-01-20', 'Rome'),
(5, 'e.hunt@example.com', 'hashedpass5', 'Ethan', 'Hunt', '1980-05-30', 'Berlin'),
(6, 'fiona.g@example.com', 'hashedpass6', 'Fiona', 'Gallagher', '1995-09-10', 'Dublin'),
(7, 'george.c@example.com', 'hashedpass7', 'George', 'Costanza', '1970-02-28', 'Madrid'),
(8, 'hannah.m@example.com', 'hashedpass8', 'Hannah', 'Montana', '2000-04-05', 'Tokyo'),
(9, 'ivy.q@example.com', 'hashedpass9', 'Ivy', 'Queen', '1983-12-12', 'Mexico City'),
(10, 'jack.s@example.com', 'hashedpass10', 'Jack', 'Sparrow', '1975-06-25', 'Sydney');

-- Populating `Room` table
INSERT INTO `Room` (`name`, `beds`, `price`, `type`) VALUES
('Single Economy', 1, 50.00, 'Single'),
('Double Standard', 2, 80.00, 'Double'),
('Suite Deluxe', 3, 150.00, 'Suite'),
('Twin Room', 2, 70.00, 'Twin'),
('Family Room', 4, 120.00, 'Family'),
('Single with Balcony', 1, 65.00, 'Single'),
('Double with Sea View', 2, 100.00, 'Double'),
('Presidential Suite', 4, 300.00, 'Suite'),
('Studio Apartment', 2, 90.00, 'Studio'),
('Accessible Room', 2, 85.00, 'Double');

-- Populating `SpecialOffer` table
INSERT INTO `SpecialOffer` (`title`, `description`, `length`, `specialPrice`) VALUES
('Summer Getaway', '10% off all bookings for 3+ nights in July and August.', 3, 0.10),
('Winter Wonderland', 'Stay 2 nights, get 1 free in December.', 3, 0.00),
('Early Bird Discount', 'Book 60 days in advance and save 15%.', 60, 0.15),
('Last Minute Deal', '20% off for bookings made within 24 hours of check-in.', 1, 0.20),
('Honeymoon Package', 'Romantic package including breakfast and late checkout.', 2, 0.00),
('Business Traveler', 'Complimentary breakfast and high-speed Wi-Fi.', 1, 0.00),
('Weekend Escape', 'Special rates for Friday to Sunday stays.', 2, 0.00),
('Long Stay Discount', '25% off for stays longer than 7 nights.', 7, 0.25),
('Family Fun Package', 'Kids stay free and receive a welcome gift.', 0, 0.00),
('Loyalty Program Offer', 'Exclusive discount for returning guests.', 0, 0.00);


-- Populating `Booking` table (example entries, assume `idSpecialOffer` can be NULL initially or link to an offer)
INSERT INTO `Booking` (`idRegisteredUser`, `idRoom`, `checkInDate`, `checkOutDate`, `totalPrice`, `bookingDate`, `cancellation`, `idSpecialOffer`) VALUES
(1, 2, '2025-07-10', '2025-07-15', 400.00, '2025-06-01 10:00:00', FALSE, 1), -- Alice, Double Standard, Summer Getaway
(2, 4, '2025-08-01', '2025-08-03', 140.00, '2025-06-05 11:30:00', FALSE, NULL), -- Bob, Twin Room
(3, 1, '2025-09-01', '2025-09-02', 50.00, '2025-06-10 14:00:00', FALSE, NULL), -- Charlie, Single Economy
(4, 3, '2025-10-15', '2025-10-18', 450.00, '2025-06-12 16:00:00', FALSE, NULL), -- Diana, Suite Deluxe
(5, 5, '2025-11-20', '2025-11-24', 480.00, '2025-06-15 09:00:00', FALSE, NULL), -- Ethan, Family Room
(6, 6, '2025-12-05', '2025-12-07', 130.00, '2025-06-18 13:00:00', FALSE, 2), -- Fiona, Single with Balcony, Winter Wonderland
(7, 7, '2026-01-01', '2026-01-03', 200.00, '2025-06-20 10:00:00', FALSE, NULL), -- George, Double with Sea View
(8, 8, '2026-02-14', '2026-02-16', 600.00, '2025-06-22 11:00:00', FALSE, NULL), -- Hannah, Presidential Suite
(9, 9, '2026-03-10', '2026-03-12', 180.00, '2025-06-25 15:00:00', FALSE, NULL), -- Ivy, Studio Apartment
(10, 10, '2026-04-01', '2026-04-05', 340.00, '2025-06-28 17:00:00', FALSE, NULL); -- Jack, Accessible Room

-- Populating `ExtraService` table
INSERT INTO `ExtraService` (`name`, `description`, `price`) VALUES
('Breakfast Buffet', 'All-you-can-eat breakfast with hot and cold options.', 15.00),
('Airport Transfer', 'Private car transfer to and from the airport.', 50.00),
('Spa Access', 'Full-day access to the hotel spa facilities.', 30.00),
('Late Check-out', 'Extend your check-out time until 4:00 PM.', 25.00),
('Pet Friendly Fee', 'Fee for bringing a pet to the hotel.', 20.00),
('Valet Parking', 'Convenient valet parking service.', 10.00),
('Room Service', '24-hour in-room dining service.', 0.00), -- Price might vary per order
('Laundry Service', 'Professional laundry and dry cleaning service.', 0.00), -- Price might vary per item
('Babysitting Service', 'On-demand babysitting service for children.', 40.00),
('City Tour', 'Guided tour of local attractions.', 35.00);

-- Populating `Booking_ExtraService` linking table
INSERT INTO `Booking_ExtraService` (`idBooking`, `idExtraService`) VALUES
(1, 1), -- Booking 1 (Alice) with Breakfast Buffet
(1, 2), -- Booking 1 (Alice) with Airport Transfer
(2, 1), -- Booking 2 (Bob) with Breakfast Buffet
(3, 4), -- Booking 3 (Charlie) with Late Check-out
(4, 3), -- Booking 4 (Diana) with Spa Access
(5, 1), -- Booking 5 (Ethan) with Breakfast Buffet
(5, 5), -- Booking 5 (Ethan) with Pet Friendly Fee
(6, 1), -- Booking 6 (Fiona) with Breakfast Buffet
(7, 2), -- Booking 7 (George) with Airport Transfer
(8, 3), -- Booking 8 (Hannah) with Spa Access
(9, 1), -- Booking 9 (Ivy) with Breakfast Buffet
(10, 4); -- Booking 10 (Jack) with Late Check-out

-- Populating `Review` table
INSERT INTO `Review` (`title`, `rating`, `description`, `date`, `idRegisteredUser`) VALUES
('Excellent Stay!', 5, 'Had a wonderful time, staff was very friendly and helpful.', '2025-07-16 10:00:00', 1),
('Good Experience', 4, 'Nice hotel, clean rooms. Breakfast was good.', '2025-08-04 14:30:00', 2),
('Cozy and Comfortable', 5, 'Perfect for a solo traveler, very quiet.', '2025-09-03 09:00:00', 3),
('Luxurious!', 5, 'The suite was amazing, worth every penny.', '2025-10-19 11:00:00', 4),
('Family Friendly', 4, 'Great amenities for families, kids loved it.', '2025-11-25 16:00:00', 5),
('Charming Hotel', 4, 'Enjoyed my stay, good location.', '2025-12-08 13:00:00', 6),
('Pleasant Stay', 3, 'Service was a bit slow but overall satisfactory.', '2026-01-04 10:00:00', 7),
('Top-notch Service', 5, 'Attentive staff, beautiful views.', '2026-02-17 12:00:00', 8),
('Convenient Location', 4, 'Close to public transport and attractions.', '2026-03-13 14:00:00', 9),
('Highly Recommend', 5, 'Everything was perfect, will definitely return.', '2026-04-06 09:30:00', 10);

INSERT INTO `image` (`idImage`, `idRoom`, `name`, `filePath`, `mimeType`) VALUES 
(NULL, '1', 'camera03.jpg', '/albergoPulito/public/assets/img/camera03.jpg', 'image/jpeg'),
(NULL, '1', 'camera04.jpg', '/albergoPulito/public/assets/img/camera04.jpg', 'image/jpeg'),
(NULL, '1', 'camera05.jpg', '/albergoPulito/public/assets/img/camera05.jpg', 'image/jpeg'),
(NULL, '2', 'camera06.jpg', '/albergoPulito/public/assets/img/camera06.jpg', 'image/jpeg'),
(NULL, '2', 'camera07.jpg', '/albergoPulito/public/assets/img/camera07.jpg', 'image/jpeg'),
(NULL, '2', 'camera08.jpg', '/albergoPulito/public/assets/img/camera08.jpg', 'image/jpeg'),
(NULL, '3', 'camera09.jpg', '/albergoPulito/public/assets/img/camera09.jpg', 'image/jpeg'),
(NULL, '3', 'camera10.jpg', '/albergoPulito/public/assets/img/camera10.jpg', 'image/jpeg'),
(NULL, '3', 'camera11.jpg', '/albergoPulito/public/assets/img/camera11.jpg', 'image/jpeg'),
(NULL, '4', 'camera12.jpg', '/albergoPulito/public/assets/img/camera12.jpg', 'image/jpeg'),
(NULL, '4', 'camera13.jpg', '/albergoPulito/public/assets/img/camera13.jpg', 'image/jpeg'),
(NULL, '4', 'camera14.jpg', '/albergoPulito/public/assets/img/camera14.jpg', 'image/jpeg'),
(NULL, '5', 'camera15.jpg', '/albergoPulito/public/assets/img/camera15.jpg', 'image/jpeg'),
(NULL, '5', 'camera16.jpg', '/albergoPulito/public/assets/img/camera16.jpg', 'image/jpeg'),
(NULL, '5', 'camera17.jpg', '/albergoPulito/public/assets/img/camera17.jpg', 'image/jpeg'),
(NULL, '6', 'camera18.jpg', '/albergoPulito/public/assets/img/camera18.jpg', 'image/jpeg'),
(NULL, '6', 'camera19.jpg', '/albergoPulito/public/assets/img/camera19.jpg', 'image/jpeg'),
(NULL, '6', 'camera20.jpg', '/albergoPulito/public/assets/img/camera20.jpg', 'image/jpeg'),
(NULL, '7', 'camera21.jpg', '/albergoPulito/public/assets/img/camera21.jpg', 'image/jpeg'),
(NULL, '7', 'camera22.jpg', '/albergoPulito/public/assets/img/camera22.jpg', 'image/jpeg'),
(NULL, '7', 'camera23.jpg', '/albergoPulito/public/assets/img/camera23.jpg', 'image/jpeg'),
(NULL, '8', 'camera24.jpg', '/albergoPulito/public/assets/img/camera24.jpg', 'image/jpeg'),
(NULL, '8', 'camera25.jpg', '/albergoPulito/public/assets/img/camera25.jpg', 'image/jpeg'),
(NULL, '8', 'camera26.jpg', '/albergoPulito/public/assets/img/camera26.jpg', 'image/jpeg'),
(NULL, '9', 'camera27.jpg', '/albergoPulito/public/assets/img/camera27.jpg', 'image/jpeg'),
(NULL, '9', 'camera28.jpg', '/albergoPulito/public/assets/img/camera28.jpg', 'image/jpeg'),
(NULL, '9', 'camera29.jpg', '/albergoPulito/public/assets/img/camera29.jpg', 'image/jpeg'),
(NULL, '10', 'camera30.jpg', '/albergoPulito/public/assets/img/camera30.jpg', 'image/jpeg'),
(NULL, '10', 'camera31.jpg', '/albergoPulito/public/assets/img/camera31.jpg', 'image/jpeg'),
(NULL, '10', 'camera32.jpg', '/albergoPulito/public/assets/img/camera32.jpg', 'image/jpeg'),