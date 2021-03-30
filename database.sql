create or replace function getRows
return number 
is 
jml number; 
begin
    Select count(ID_ARTIKEL) jumlah into jml from artikelresep;
     return jml ; 
end; 
/

create or replace procedure getRowsResep (
   n OUT number) as
begin
    Select count(ID_ARTIKEL) jumlah into n from artikelresep; 
end; 
/

create or replace function getRowsA
return number 
is 
jml number; 
begin
    Select count(ID_ARTIKEL) jumlah into jml from artikelbahan_alat;
     return jml ; 
end; 
/
DECLARE
 BEGIN 
 DBMS_OUTPUT.PUT_LINE('jumlhnya adalaah '||getRows);
 end;
 /
 
 CREATE OR REPLACE PROCEDURE alert(
       c_dbuser OUT vaarchar2(40))
IS
BEGIN
  OPEN c_dbuser FOR
  SELECT * FROM institution;
END;