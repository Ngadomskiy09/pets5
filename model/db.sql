CREATE TABLE pet
(
    pet_id int NOT NULL AUTO_INCREMENT,
    pet_name VARCHAR(255) NOT NULL,
    pet_color VARCHAR(255) NOT NULL,
    pet_type VARCHAR(255) NOT NULL,

    PRIMARY KEY (pet_id)
)

INSERT INTO pet VALUES (DEFAULT, "Bobby", "black", "bulldog"), (DEFAULT, "Floyd", "black", "bulldog"), (DEFAULT, "Bobby", "black", "bulldog")