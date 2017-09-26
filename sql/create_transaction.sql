CREATE OR REPLACE FUNCTION create_transaction(typeStr text, amountNum numeric, nameStr text)
RETURNS VOID AS 
$$
BEGIN
	INSERT INTO transaction VALUES(typeStr, amountNum, nameStr);
END;
$$
LANGUAGE 'plpgsql'
SECURITY DEFINER
STRICT;
