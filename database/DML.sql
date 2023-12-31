USE Car_Rental;

INSERT INTO office (office_id, district, country, city)
VALUES 
    (1, 'Central Business', 'United States', 'New York'),
    (2, 'Financial', 'United States', 'San Francisco'),
    (3, 'Tech Hub', 'United Kingdom', 'London'),
    (4, 'Business Park', 'Canada', 'Toronto'),
    (5, 'Downtown', 'Australia', 'Sydney');

-- Generate 50 rows of fake data for the car table with office_id from {1, 2, 3, 4, 5}
-- Generate 50 rows of fake data for the car table with office_id from {1, 2, 3, 4, 5} and current_status from {busy, available, out_of_service}
INSERT INTO car (plate_number, year, model, color, office_id, price, current_status)
VALUES
    ('CAR001', 2018, 'SUV', 'Red', 1, 25000.00, 'available'),
    ('CAR002', 2020, 'Sedan', 'black', 2, 28000.00, 'available'),
    ('CAR003', 2019, 'Truck', 'white', 3, 32000.00, 'out_of_service'),
    ('CAR004', 2021, 'Hatchback', 'silver', 4, 20000.00, 'busy'),
    ('CAR005', 2017, 'SUV', 'hana_blue', 5, 27000.00, 'available'),
    ('CAR006', 2022, 'Sedan', 'yellow', 1, 30000.00, 'available'),
    ('CAR007', 2018, 'Hatchback', 'hassan_turquoise', 2, 22000.00, 'out_of_service'),
    ('CAR008', 2023, 'Truck', 'white', 3, 35000.00, 'available'),
    ('CAR009', 2020, 'SUV', 'silver', 4, 26000.00, 'busy'),
    ('CAR010', 2019, 'Hatchback', 'yassin_green', 5, 23000.00, 'available'),
    ('CAR011', 2022, 'Sedan', 'hana_blue', 1, 29000.00, 'available'),
    ('CAR012', 2018, 'Truck', 'black', 2, 33000.00, 'out_of_service'),
    ('CAR013', 2017, 'Hatchback', 'Red', 3, 24000.00, 'busy'),
    ('CAR014', 2020, 'SUV', 'hana_blue', 4, 28000.00, 'available'),
    ('CAR015', 2021, 'Sedan', 'white', 5, 27000.00, 'available'),
    ('CAR016', 2019, 'Truck', 'black', 1, 31000.00, 'out_of_service'),
    ('CAR017', 2023, 'Hatchback', 'silver', 2, 19000.00, 'busy'),
    ('CAR018', 2018, 'SUV', 'yassin_green', 3, 26000.00, 'available'),
    ('CAR019', 2017, 'Sedan', 'hana_blue', 4, 29000.00, 'available'),
    ('CAR020', 2020, 'Truck', 'white', 5, 32000.00, 'out_of_service'),
    ('CAR021', 2021, 'Hatchback', 'Red', 1, 23000.00, 'busy'),
    ('CAR022', 2018, 'SUV', 'black', 2, 28000.00, 'out_of_service'),
    ('CAR023', 2022, 'Sedan', 'hana_blue', 3, 30000.00, 'available'),
    ('CAR024', 2019, 'Hatchback', 'white', 4, 25000.00, 'available'),
    ('CAR025', 2018, 'Truck', 'silver', 5, 34000.00, 'busy'),
    ('CAR026', 2023, 'SUV', 'yassin_green', 1, 27000.00, 'available'),
    ('CAR027', 2017, 'Sedan', 'hana_blue', 2, 31000.00, 'available'),
    ('CAR028', 2020, 'Truck', 'black', 3, 33000.00, 'out_of_service'),
    ('CAR029', 2019, 'Hatchback', 'Red', 4, 24000.00, 'busy'),
    ('CAR030', 2018, 'SUV', 'silver', 5, 29000.00, 'available'),
    ('CAR031', 2022, 'Sedan', 'hana_blue', 1, 31000.00, 'available'),
    ('CAR032', 2019, 'Hatchback', 'white', 2, 26000.00, 'available'),
    ('CAR033', 2018, 'Truck', 'black', 3, 30000.00, 'out_of_service'),
    ('CAR034', 2023, 'SUV', 'Red', 4, 22000.00, 'busy'),
    ('CAR035', 2017, 'Sedan', 'hana_blue', 5, 31000.00, 'available'),
    ('CAR036', 2020, 'Truck', 'white', 1, 33000.00, 'available'),
    ('CAR037', 2021, 'Hatchback', 'Red', 2, 24000.00, 'out_of_service'),
    ('CAR038', 2018, 'SUV', 'black', 3, 28000.00, 'busy'),
    ('CAR039', 2022, 'Sedan', 'hana_blue', 4, 30000.00, 'available'),
    ('CAR040', 2019, 'Hatchback', 'white', 5, 25000.00, 'available'),
    ('CAR041', 2018, 'Truck', 'silver', 1, 34000.00, 'busy'),
    ('CAR042', 2023, 'SUV', 'yassin_green', 2, 27000.00, 'available'),
    ('CAR043', 2017, 'Sedan', 'hana_blue', 3, 31000.00, 'available'),
    ('CAR044', 2020, 'Truck', 'black', 4, 33000.00, 'out_of_service'),
    ('CAR045', 2019, 'Hatchback', 'Red', 5, 24000.00, 'busy'),
    ('CAR046', 2018, 'SUV', 'silver', 1, 29000.00, 'available'),
    ('CAR047', 2022, 'Sedan', 'hana_blue', 2, 31000.00, 'available'),
    ('CAR048', 2019, 'Hatchback', 'white', 3, 26000.00, 'available'),
    ('CAR049', 2018, 'Truck', 'black', 4, 30000.00, 'out_of_service'),
    ('CAR050', 2023, 'SUV', 'Red', 5, 22000.00, 'busy');


INSERT INTO admin (fname, lname, SSN, office_id, password, email)
VALUES
    ('John', 'Doe', 'SSN001', 1, 'adminpass', 'hassantamerha@gmail.com'),
    ('Alice', 'Smith', 'SSN002', 2, 'adminpass', 'alicesmith@example.com'),
    ('Mike', 'Johnson', 'SSN003', 3, 'adminpass', 'mikejohnson@example.com'),
    ('Emily', 'Brown', 'SSN004', 4, 'adminpass', 'emilybrown@example.com'),
    ('Robert', 'Davis', 'SSN005', 5, 'adminpass', 'robertdavis@example.com'),
    ('Jennifer', 'Wilson', 'SSN006', 1, 'adminpass', 'jenniferwilson@example.com'),
    ('Daniel', 'Martinez', 'SSN007', 2, 'adminpass', 'danielmartinez@example.com'),
    ('Sophia', 'Garcia', 'SSN008', 3, 'adminpass', 'sophiagarcia@example.com'),
    ('William', 'Lopez', 'SSN009', 4, 'adminpass', 'williamlopez@example.com'),
    ('Olivia', 'Hernandez', 'SSN010', 5, 'adminpass', 'oliviahernandez@example.com');

-- Generate 30 rows of fake data for the customer table with the same password 'customerpass'
INSERT INTO customer (SSN, fname, lname, phone_number, email, password, card_number)
VALUES
    ('SSN001', 'Alice', 'Johnson', '1234567890', 'alice@example.com', 'customerpass', '1234 5678 9012 3456'),
    ('SSN002', 'Bob', 'Smith', '9876543210', 'bob@example.com', 'customerpass', '9876 5432 1098 7654'),
    ('SSN003', 'Charlie', 'Williams', '5551234567', 'charlie@example.com', 'customerpass', '5555 1234 5678 9999'),
    ('SSN004', 'David', 'Brown', '4442223333', 'david@example.com', 'customerpass', '4444 2222 3333 1111'),
    ('SSN005', 'Emma', 'Davis', '3331114444', 'emma@example.com', 'customerpass', '3333 1111 4444 2222'),
    ('SSN006', 'Frank', 'Miller', '2225556666', 'frank@example.com', 'customerpass', '2222 5555 6666 3333'),
    ('SSN007', 'Grace', 'Wilson', '6669991111', 'grace@example.com', 'customerpass', '6666 9999 1111 8888'),
    ('SSN008', 'Henry', 'Moore', '7891234567', 'henry@example.com', 'customerpass', '7890 1234 5678 5555'),
    ('SSN009', 'Isabella', 'Taylor', '9998887777', 'isabella@example.com', 'customerpass', '9999 8888 7777 4444'),
    ('SSN010', 'Jack', 'Anderson', '1112223333', 'jack@example.com', 'customerpass', '1111 2222 3333 0000'),
    ('SSN011', 'Kate', 'Thomas', '4445556666', 'kate@example.com', 'customerpass', '4444 5555 6666 2222'),
    ('SSN012', 'Liam', 'Jackson', '7778889999', 'liam@example.com', 'customerpass', '7777 8888 9999 3333'),
    ('SSN013', 'Mia', 'White', '3332221111', 'mia@example.com', 'customerpass', '3333 2222 1111 7777'),
    ('SSN014', 'Noah', 'Harris', '2223334444', 'noah@example.com', 'customerpass', '2222 3333 4444 6666'),
    ('SSN015', 'Olivia', 'Martin', '6667778888', 'olivia@example.com', 'customerpass', '6666 7777 8888 9999'),
    ('SSN016', 'Peter', 'Thompson', '9990001111', 'peter@example.com', 'customerpass', '9999 0000 1111 2222'),
    ('SSN017', 'Quinn', 'Garcia', '1110009999', 'quinn@example.com', 'customerpass', '1111 0000 9999 5555'),
    ('SSN018', 'Rachel', 'Lee', '8887776666', 'rachel@example.com', 'customerpass', '8888 7777 6666 4444'),
    ('SSN019', 'Samuel', 'Perez', '5556667777', 'samuel@example.com', 'customerpass', '5555 6666 7777 3333'),
    ('SSN020', 'Taylor', 'Roberts', '2229998888', 'taylor@example.com', 'customerpass', '2222 9999 8888 1111'),
    ('SSN021', 'Uma', 'Morales', '7778889999', 'uma@example.com', 'customerpass', '7777 8888 9999 0000'),
    ('SSN022', 'Victor', 'Clark', '4445556666', 'victor@example.com', 'customerpass', '4444 5555 6666 1111'),
    ('SSN023', 'Wendy', 'Hall', '9998887777', 'wendy@example.com', 'customerpass', '9999 8888 7777 2222'),
    ('SSN024', 'Xavier', 'Wood', '6667778888', 'xavier@example.com', 'customerpass', '6666 7777 8888 3333'),
    ('SSN025', 'Yasmine', 'Lopez', '3332221111', 'yasmine@example.com', 'customerpass', '3333 2222 1111 4444');


INSERT INTO rent (SSN, plate_number, start_date, end_date, amount_paid)
VALUES
    ('SSN001', 'CAR001', '2023-01-01', '2023-01-07', 350.00),
    ('SSN002', 'CAR002', '2023-02-15', '2023-02-22', 420.00),
    ('SSN003', 'CAR003', '2023-03-10', '2023-03-17', 500.00),
    ('SSN004', 'CAR004', '2023-04-05', '2023-04-12', 300.00),
    ('SSN005', 'CAR005', '2023-05-20', '2023-05-27', 450.00),
    ('SSN006', 'CAR006', '2023-06-11', '2023-06-18', 480.00),
    ('SSN007', 'CAR007', '2023-07-03', '2023-07-10', 520.00),
    ('SSN008', 'CAR008', '2023-08-17', '2023-08-24', 600.00),
    ('SSN009', 'CAR009', '2023-09-25', '2023-10-02', 400.00),
    ('SSN010', 'CAR010', '2023-10-30', '2023-11-06', 470.00);


INSERT INTO car_status (plate_number, status, date)
VALUES
('CAR001', 'available', '2015-03-10'),
('CAR001', 'busy', '2016-07-23'),
('CAR001', 'out_of_service', '2017-02-07'),
('CAR002', 'available', '2018-09-15'),
('CAR002', 'busy', '2019-05-02'),
('CAR002', 'out_of_service', '2020-01-19'),
('CAR003', 'available', '2021-06-14'),
('CAR003', 'busy', '2022-02-28'),
('CAR003', 'out_of_service', '2023-09-15'),
('CAR004', 'available', '2023-03-01'),
('CAR004', 'busy', '2023-07-14'),
('CAR004', 'out_of_service', '2023-11-27'),
('CAR005', 'available', '2023-02-11'),
('CAR005', 'busy', '2023-06-25'),
('CAR005', 'out_of_service', '2023-10-08'),
('CAR006', 'available', '2020-10-30'),
('CAR006', 'busy', '2021-06-15'),
('CAR006', 'out_of_service', '2022-03-01'),
('CAR007', 'available', '2022-10-15'),
('CAR007', 'busy', '2023-04-01'),
('CAR007', 'out_of_service', '2023-09-15'),
('CAR011', 'available', '2014-05-10'),
('CAR011', 'busy', '2015-09-23'),
('CAR011', 'out_of_service', '2016-04-07'),
('CAR012', 'available', '2017-11-15'),
('CAR012', 'busy', '2018-08-02'),
('CAR012', 'out_of_service', '2019-01-19'),
('CAR013', 'available', '2020-06-14'),
('CAR013', 'busy', '2021-02-28'),
('CAR013', 'out_of_service', '2022-09-15'),
('CAR014', 'available', '2023-03-01'),
('CAR014', 'busy', '2023-07-14'),
('CAR014', 'out_of_service', '2023-11-27'),
('CAR015', 'available', '2023-02-11'),
('CAR015', 'busy', '2023-06-25'),
('CAR015', 'out_of_service', '2023-10-08'),
('CAR016', 'available', '2020-10-30'),
('CAR016', 'busy', '2021-06-15'),
('CAR016', 'out_of_service', '2022-03-01'),
('CAR017', 'available', '2022-10-15'),
('CAR017', 'busy', '2023-04-01'),
('CAR017', 'out_of_service', '2023-09-15'),
('CAR018', 'available', '2023-02-28'),
('CAR018', 'busy', '2023-07-15'),
('CAR018', 'out_of_service', '2023-12-01'),
('CAR019', 'available', '2023-02-15'),
('CAR019', 'busy', '2023-06-30'),
('CAR019', 'out_of_service', '2023-11-15'),
('CAR020', 'available', '2023-02-28'),
('CAR020', 'busy', '2023-07-15'),
('CAR020', 'out_of_service', '2023-12-01'),
('CAR021', 'available', '2014-05-10'),
('CAR021', 'busy', '2015-09-23'),
('CAR021', 'out_of_service', '2016-04-07'),
('CAR022', 'available', '2017-11-15'),
('CAR022', 'busy', '2018-08-02'),
('CAR022', 'out_of_service', '2019-01-19'),
('CAR023', 'available', '2020-06-14'),
('CAR023', 'busy', '2021-02-28'),
('CAR023', 'out_of_service', '2022-09-15'),
('CAR024', 'available', '2023-03-01'),
('CAR024', 'busy', '2023-07-14'),
('CAR024', 'out_of_service', '2023-11-27'),
('CAR025', 'available', '2023-02-11'),
('CAR025', 'busy', '2023-06-25'),
('CAR025', 'out_of_service', '2023-10-08'),
('CAR026', 'available', '2020-10-30'),
('CAR026', 'busy', '2021-06-15'),
('CAR026', 'out_of_service', '2022-03-01'),
('CAR027', 'available', '2022-10-15'),
('CAR027', 'busy', '2023-04-01'),
('CAR027', 'out_of_service', '2023-09-15'),
('CAR028', 'available', '2023-02-28'),
('CAR028', 'busy', '2023-07-15'),
('CAR028', 'out_of_service', '2023-12-01'),
('CAR029', 'available', '2023-02-15'),
('CAR029', 'busy', '2023-06-30'),
('CAR029', 'out_of_service', '2023-11-15'),
('CAR030', 'available', '2023-02-28'),
('CAR030', 'busy', '2023-07-15'),
('CAR030', 'out_of_service', '2023-12-01'),
('CAR031', 'available', '2014-05-10'),
('CAR031', 'busy', '2015-09-23'),
('CAR031', 'out_of_service', '2016-04-07'),
('CAR032', 'available', '2017-11-15'),
('CAR032', 'busy', '2018-08-02'),
('CAR032', 'out_of_service', '2019-01-19'),
('CAR033', 'available', '2020-06-14'),
('CAR033', 'busy', '2021-02-28'),
('CAR033', 'out_of_service', '2022-09-15'),
('CAR034', 'available', '2023-03-01'),
('CAR034', 'busy', '2023-07-14'),
('CAR034', 'out_of_service', '2023-11-27'),
('CAR035', 'available', '2023-02-11'),
('CAR035', 'busy', '2023-06-25'),
('CAR035', 'out_of_service', '2023-10-08'),
('CAR036', 'available', '2020-10-30'),
('CAR036', 'busy', '2021-06-15'),
('CAR036', 'out_of_service', '2022-03-01'),
('CAR037', 'available', '2022-10-15'),
('CAR037', 'busy', '2023-04-01'),
('CAR037', 'out_of_service', '2023-09-15'),
('CAR038', 'available', '2023-02-28'),
('CAR038', 'busy', '2023-07-15'),
('CAR038', 'out_of_service', '2023-12-01'),
('CAR039', 'available', '2023-02-15'),
('CAR039', 'busy', '2023-06-30'),
('CAR039', 'out_of_service', '2023-11-15'),
('CAR040', 'available', '2023-02-28'),
('CAR040', 'busy', '2023-07-15'),
('CAR040', 'out_of_service', '2023-12-01'),
('CAR041', 'available', '2015-04-20'),
('CAR041', 'busy', '2016-09-03'),
('CAR041', 'out_of_service', '2017-03-19'),
('CAR042', 'available', '2018-11-25'),
('CAR042', 'busy', '2019-07-12'),
('CAR042', 'out_of_service', '2020-02-28'),
('CAR043', 'available', '2021-09-15'),
('CAR043', 'busy', '2022-04-01'),
('CAR043', 'out_of_service', '2023-10-15'),
('CAR044', 'available', '2023-03-01'),
('CAR044', 'busy', '2023-07-15'),
('CAR044', 'out_of_service', '2023-11-27'),
('CAR045', 'available', '2023-02-11'),
('CAR045', 'busy', '2023-06-25'),
('CAR045', 'out_of_service', '2023-10-08'),
('CAR046', 'available', '2023-02-28'),
('CAR046', 'busy', '2023-07-15'),
('CAR046', 'out_of_service', '2023-12-01'),
('CAR047', 'available', '2023-02-15'),
('CAR047', 'busy', '2023-06-30'),
('CAR047', 'out_of_service', '2023-11-15'),
('CAR048', 'available', '2023-02-28'),
('CAR048', 'busy', '2023-07-15'),
('CAR048', 'out_of_service', '2023-12-01'),
('CAR049', 'available', '2023-02-15'),
('CAR049', 'busy', '2023-06-30'),
('CAR049', 'out_of_service', '2023-11-15'),
('CAR050', 'available', '2023-02-28'),
('CAR050', 'busy', '2023-07-15'),
('CAR050', 'out_of_service', '2023-12-01'),
('CAR046', 'available', '2023-03-15'),
('CAR046', 'busy', '2023-08-01'),
('CAR046', 'out_of_service', '2023-12-15'),
('CAR047', 'available', '2023-03-01'),
('CAR047', 'busy', '2023-07-15'),
('CAR047', 'out_of_service', '2023-11-30'),
('CAR048', 'available', '2023-03-15'),
('CAR048', 'busy', '2023-08-01'),
('CAR048', 'out_of_service', '2023-12-15'),
('CAR049', 'available', '2023-03-01'),
('CAR049', 'busy', '2023-07-15'),
('CAR049', 'out_of_service', '2023-11-30'),
('CAR050', 'available', '2023-03-15'),
('CAR050', 'busy', '2023-08-01'),
('CAR050', 'out_of_service', '2023-12-15');

