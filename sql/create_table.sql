--Intentionally left it without a primary key because
-- I want to create a GIN index on the columns rather than 
-- default BTree
CREATE TABLE transaction(
	type text,
	amount numeric(18,3),
	name text
)
