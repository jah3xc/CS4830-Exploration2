COPY transaction(type, amount, name)
FROM './transactions.csv' DELIMITER ',' CSV HEADER;