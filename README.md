# Atoum to PHPUnit Shim

Assists with the migration from the Atoum testing framework to PHPUnit.
This library attempts to map the Atoum assertions and other methods to PHPUnit to allow tests written for Atoum to run within the PHPUnit engine with no modifications.

Current Features/Support:

| Feature                                      | Support | Notes |
|----------------------------------------------|---------|-------|
| afterDestructionOf                           | No      |       |
| array                                        | Yes     |       |
| assert                                       | No      |       |
| boolean                                      | Yes     |       |
| castToArray                                  | Yes     |       |
| castToString                                 | Yes     |       |
| class                                        | Yes     |       |
| dateInterval                                 | Yes     |       |
| dateTime                                     | Yes     |       |
| error                                        | No      |       |
| exception                                    | Yes     |       |
| extension                                    | Yes     |       |
| float                                        | Yes     |       |
| function                                     | No      |       |
| generator                                    | No      |       |
| given/if/and/then                            | No      |       |
| hash                                         | Yes     |       |
| integer                                      | Yes     |       |
| mock                                         | No      |       |
| mysqlDateTime                                | Partial |       |
| object                                       | Partial |       |
| output                                       | Yes     |       |
| resource                                     | Yes     |       |
| sizeOf                                       | Yes     |       |
| stream                                       | No      |       |
| string                                       | Yes     |       |
| testedClass/testedInstance/newTestedInstance | No      |       |
| utf8String                                   | Yes     |       |
| variable                                     | Yes     |       |
| when                                         | No      |       |
