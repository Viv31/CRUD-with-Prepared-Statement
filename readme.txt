===   CRUD OPERATIONS WITH PREPARED STATEMENT  ===

This Simple CRUD application covering following points
1) C=> Create data (Insert data)
2) R => Read Data
3) U => Update Data
4) D => Delete Data


What is the difference between Statement and PreparedStatement?
Statement
- The parameter value is fixed
- Compiles and executes every time

PreparedStatement
- The parameter can be supplied at run time
- Precompiled ( compiled once ) and executes once for n number of parameter values

What is the advantage of using PreparedStatement?
PreparedStatement objects are used to execute repetitive SQL statements. Compared to Statement object execution, Prepared Statement object creation is faster. The reason is the object is pre compiled, by eliminating the compilation task by DBMS. The PreparedStatement object can be used by just replacing the parameters


