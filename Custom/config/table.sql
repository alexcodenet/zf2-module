CREATE TABLE ubuntu (
   id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   code_name NVARCHAR(128) NOT NULL,
   version NVARCHAR(64) NOT NULL
 );
 INSERT INTO ubuntu (code_name, version)
     VALUES  ('Trusty Tahr',  '14.04 LTS');
 INSERT INTO ubuntu (code_name, version)
     VALUES  ('Saucy Salamander',  '13.10');
 INSERT INTO ubuntu (code_name, version)
     VALUES  ('Raring Ringtail',  '13.04');
 INSERT INTO ubuntu (code_name, version)
     VALUES  ('Quantal Quetzal',  '12.10');
 INSERT INTO ubuntu (code_name, price)
     VALUES  ('Precise Pangolin',  '12.04 LTS');
 INSERT INTO ubuntu (code_name, version)
     VALUES  ('Oneiric Ocelot',  '11.10');
 INSERT INTO ubuntu (code_name, version)
     VALUES  ('Natty Narwhal',  '11.04');
 INSERT INTO ubuntu (code_name, version)
     VALUES  ('Maverick Meerkat',  '10.10');
 INSERT INTO ubuntu (code_name, version)
     VALUES  ('Lucid Lynx',  '10.04 LTS');