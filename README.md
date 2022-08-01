# Atoum to PHPUnit Shim

Assists with the migration from the Atoum testing framework to PHPUnit.
This library attempts to map the Atoum assertions and other methods to PHPUnit to allow tests written for Atoum to run within the PHPUnit engine with minimal modifications.

If you use the lifecycle methods `setUp`, `tearDown`, `beforeTestMethod`, or `afterTestMethod` in your tests, you must change them to the PHPUnit equivalents.
This is because in Atoum, `setUp` and `tearDown` are done before and after all the tests in the class are run.
However, in PHPUnit they are done before and after each test method is run.

Current Features/Support:

| Feature                                      | Support | Notes |
|----------------------------------------------|---------|-------|
| afterDestructionOf                           | Yes     |       |
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
| given/if/and/then                            | Yes     |       |
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
| when                                         | Yes     |       |
